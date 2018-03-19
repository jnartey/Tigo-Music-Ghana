<?php
class VideosController extends AppController {

	public $name = 'Videos';
	
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->layout = 'admin';
	}
	
	public function admin_index() {
		$header = "Videos";
		$current_page = "All Video Content";
		
		$this->paginate = array('conditions'=>array('Video.category'=>null), 'order'=>array('Video.id'=>'DESC'), 'limit' => 10);
		$this->Video->recursive = 0;
		$items = $this->paginate('Video');
		
		$this->set(compact('header', 'current_page', 'items'));
	}
	
	public function admin_view($id = null) {
		$header = "Videos";
		$current_page = "Content | ";
		
		$this->Video->id = $id;
		
		if (!$this->Video->exists()) {
			throw new NotFoundException('Invalid content');
		}
		
		if (!$id) {
			$this->Session->setFlash('Invalid content<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->set('item', $this->Video->read());
		
		$this->paginate = array('conditions' => array('Video.category' => $id), 'order'=>array('Video.id'=>'DESC'), 'limit' => 20);
		$this->Video->recursive = 0;
	    $items = $this->paginate('Video');
		
		$item_parent = $this->Video->getContent($id);
		
		$this->set(compact('header', 'current_page', 'items', 'item_parent'));
	}

	public function admin_add($id = null) {
		$this->loadModel('Gallery');
		
		$header = "Videos";
		$current_page = "Add";
		$rev = null;
		$parent = null;
		$item_parent = false;
				
		if ($this->request->is('post')) {
			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash($this->request->data['Video']['name'].' has been saved<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
					if($this->request->data['Video']['cid']){
						$this->redirect(array('controller'=>'videos', 'action'=>'view', $this->request->data['Video']['cid'], 'admin'=>true));
					}else{
						$this->redirect(array('action' => 'index'));
					}
				
			} else {
				$this->Session->setFlash($this->request->data['Video']['name'].' could not be saved. Please, try again.<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			}
		}
		
		if($id){
			$item_parent = $this->Video->getContent($id);
        	$item = $this->Video->listSelectContent($id);
			$rev = $id;
			
			$item_parent = $this->Video->getContent($id);
			
			$parent = $this->Video->find('first', array('conditions'=>array('Video.id'=>$id)));
		
		}
					
		$this->set(compact('header', 'current_page', 'item', 'item_parent', 'rev', 'parent'));
	}
	

	public function admin_edit($id = null) {
		$header = "Videos";
		$current_page = "Edit";
		$parent = null;			
		$this->Video->id = $id;
		$item_parent = $this->Video->getContent($id);
		
		if (!$this->Video->exists()) {
			throw new NotFoundException('Invalid content');
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if(isset($this->request->data['Video']['remove_image']) && !empty($this->request->data['Video']['remove_image'])){
				$this->request->data['Video']['cover']['remove'] = true;
			}
			
			if($this->Video->save($this->request->data)) {
				$this->Session->setFlash($this->request->data['Video']['name'].' has been updated<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
				if($item_parent[0]['Video']['category']){
					$this->redirect(array('controller'=>'videos', 'action'=>'view', $item_parent[0]['Video']['category'], 'admin'=>true));
				}else{
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash($this->request->data['Video']['name'].' could not be updated. Please, try again.<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			}
		} else {
			$this->request->data = $this->Video->read();
			$item = $this->Video->read();
			if($item['Video']['category']){
				$parent = $this->Video->find('first', array('conditions'=>array('Video.id'=>$item['Video']['category'])));
			}
		}
		
		$this->set(compact('header', 'current_page', 'item', 'item_parent', 'gallery', 'parent'));
	}

	public function admin_delete($id = null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if (!$id) {
			$this->Session->setFlash('Invalid id for record<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Video->delete($id)) {
			$this->Session->setFlash('Record deleted<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Record was not deleted<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_featured($id, $parent_id) {
		if($this->Video->updateAll(array("Video.featured" => 0))){
			$this->Video->id = $id;
			$this->Video->saveField("featured", 1); 
		}
		 
		$this->redirect(array('action'=>'view', $parent_id));
        
	}
}
?>