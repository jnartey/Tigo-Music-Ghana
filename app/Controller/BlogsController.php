<?php
class BlogsController extends AppController {

	public $name = 'Blogs';
	
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->layout = 'admin';
	}
	
	public function admin_index() {
		$header = "Blogs";
		$current_page = "All Blogs";
		
		$this->paginate = array('order' => 'Blog.blog_date DESC', 'limit' => 10);
		$this->Blog->recursive = 0;
		$blogs = $this->paginate('Blog');
		
		$this->set(compact('header', 'current_page', 'blogs'));
	}
	
	public function admin_view($id = null) {
		$header = "Blogs";
		$current_page = "Blog | ";
		
		$this->Blog->id = $id;
		
		if (!$this->Blog->exists()) {
			throw new NotFoundException('Invalid Blog');
		}
		
		if (!$id) {
			$this->Session->setFlash('Invalid Blog<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->set('blog', $this->Blog->read());
		
		$blog_parent = $this->Blog->getBlog($id);
		
		$this->set(compact('header', 'current_page', 'blogs', 'blog_parent'));
	}

	public function admin_add($id = null) {
		$header = "Blogs";
		$current_page = "Add Blog";
				
		if ($this->request->is('post')) {
			
			$this->request->data['Blog']['blog_date'] = strtotime($this->request->data['Blog']['blog_date']);
			
			if ($this->Blog->save($this->request->data)) {
				
					$this->Session->setFlash($this->request->data['Blog']['title'].' has been saved<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
					//AppController::monitorActivity('added', $this->request->data['Blog']['title'], 'Blog');
					$this->redirect(array('action' => 'index'));
				
			} else {
				$this->Session->setFlash($this->request->data['Blog']['title'].' could not be saved. Please, try again.<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			}
		}
		
		if($id){
			$blog_parent = $this->Blog->getBlog($id);
        	//$blogs = $this->Blog->listSelectBlog($id);
		}
					
		$blog_parent = false;
		
		$this->set(compact('header', 'current_page', 'blog_parent'));
	}
	

	public function admin_edit($id = null) {
		$header = "Blogs";
		$current_page = "Edit Blog";
				
		$this->Blog->id = $id;
		$blog_parent = $this->Blog->getBlog($id);
		
		if (!$this->Blog->exists()) {
			throw new NotFoundException('Invalid Blog');
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$this->request->data['Blog']['blog_date'] = strtotime($this->request->data['Blog']['blog_date']);
			
			if ($this->Blog->save($this->request->data)) {
 					
					$this->Session->setFlash($this->request->data['Blog']['title'].' has been updated<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
					//AppController::monitorActivity('edited', $this->request->data['Blog']['title'], 'Blog');
					$this->redirect(array('action' => 'index'));
				//}
				
			} else {
				$this->Session->setFlash($this->request->data['Blog']['title'].' could not be updated. Please, try again.<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			}
		} else {
			$this->request->data = $this->Blog->read();
			$blog = $this->Blog->read();
			$blog_date = date('m/d/Y', $blog['Blog']['blog_date']);
		}
				
		$this->set(compact('header', 'current_page', 'blog', 'blog_parent', 'blog_date'));
	}

	public function admin_delete($id = null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		$data = $this->Blog->find('first', array('conditions'=>array('Blog.id' => $id)));
		
		if (!$id) {
			$this->Session->setFlash('Invalid id for Blog<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Blog->delete($id)) {
			$this->Session->setFlash('Blog deleted<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
			//AppController::monitorActivity('deleted', $data['Blog']['title'], 'Blog');
			$this->redirect(array('action'=>'index'));
		}
		
		$this->Session->setFlash('Blog was not deleted<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
		$this->redirect(array('action' => 'index'));
	}
	
	
	function admin_publish($id) {
		$this->loadModel('Blog');
		$this->Blog->id = $id;
		
		$this->Blog->saveField("publish", 1); 
		 
		$this->redirect(array('action'=>'index'));
        
	}
	
	function admin_unpublish($id) {
		$this->loadModel('Blog');
		$this->Blog->id = $id;
		$this->Blog->saveField("publish", 0);    
		           
		$this->redirect(array('action'=>'index'));
	}
	
	function admin_enable_comments($id) {
		$this->loadModel('Blog');
		$this->Blog->id = $id;
		
		$this->Blog->saveField("show_comment", 1); 
		 
		$this->redirect(array('action'=>'index'));
        
	}
	
	function admin_disable_comments($id) {
		$this->loadModel('Blog');
		$this->Blog->id = $id;
		$this->Blog->saveField("show_comment", 0);    
		           
		$this->redirect(array('action'=>'index'));
	}
}
?>