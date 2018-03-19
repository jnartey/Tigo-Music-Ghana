<?php
class MusicController extends AppController {

	public $name = 'Music';
	
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->layout = 'admin';
	}
	
	public function admin_index() {
		$header = "Music";
		$current_page = "All Music Content";
		
		$this->paginate = array('conditions'=>array('Music.category'=>null), 'order'=>array('Music.id DESC'), 'limit' => 10);
		$this->Music->recursive = 0;
		$items = $this->paginate('Music');
		
		$this->set(compact('header', 'current_page', 'items'));
	}
	
	public function admin_view($id = null) {
		$header = "Music";
		$current_page = "Content | ";
		
		$this->Music->id = $id;
		
		if (!$this->Music->exists()) {
			throw new NotFoundException('Invalid content');
		}
		
		if (!$id) {
			$this->Session->setFlash('Invalid music content<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->set('item', $this->Music->read());
		
		$this->paginate = array('conditions' => array('Music.category' => $id), 'order'=>array('Music.id DESC'), 'limit' => 20);
		$this->Music->recursive = 0;
	    $items = $this->paginate('Music');
		
		$item_parent = $this->Music->getContent($id);
		
		$this->set(compact('header', 'current_page', 'items', 'item_parent'));
	}

	public function admin_add($id = null) {
		
		$this->loadModel('Gallery');
		
		$header = "Music";
		$current_page = "Add";
		$rev = null;
		$parent = null;
		$item_parent = false;
		
		if ($this->request->is('post')) {
			if ($this->Music->save($this->request->data)) {
				$this->Session->setFlash($this->request->data['Music']['name'].' has been saved<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
					if($this->request->data['Music']['cid']){
						$this->redirect(array('controller'=>'music', 'action'=>'view', $this->request->data['Music']['cid'], 'admin'=>true));
					}else{
						$this->redirect(array('action' => 'index'));
					}
				
			} else {
				$this->Session->setFlash($this->request->data['Music']['name'].' could not be saved. Please, try again.<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			}
		}
		
		if($id){
			$item_parent = $this->Music->getContent($id);
        	$item = $this->Music->listSelectContent($id);
			$rev = $id;
			
			$item_parent = $this->Music->getContent($id);
			
			$parent = $this->Music->find('first', array('conditions'=>array('Music.id'=>$id)));
		
		}
					
		$this->set(compact('header', 'current_page', 'item', 'item_parent', 'rev', 'parent'));
	}
	

	public function admin_edit($id = null) {
		$header = "Music";
		$current_page = "Edit";
		$parent = null;			
		$this->Music->id = $id;
		$item_parent = $this->Music->getContent($id);
		
		if (!$this->Music->exists()) {
			throw new NotFoundException('Invalid content');
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if(isset($this->request->data['Music']['remove_image']) && !empty($this->request->data['Music']['remove_image'])){
				$this->request->data['Music']['cover']['remove'] = true;
			}
			
			if ($this->Music->save($this->request->data)) {
				$this->Session->setFlash($this->request->data['Music']['name'].' has been updated<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
				if($item_parent[0]['Music']['category']){
					$this->redirect(array('controller'=>'music', 'action'=>'view', $item_parent[0]['Music']['category'], 'admin'=>true));
				}else{
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash($this->request->data['Music']['name'].' could not be updated. Please, try again.<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			}
		} else {
			$this->request->data = $this->Music->read();
			$item = $this->Music->read();
			if($item['Music']['category']){
				$parent = $this->Music->find('first', array('conditions'=>array('Music.id'=>$item['Music']['category'])));
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
		if ($this->Music->delete($id)) {
			$this->Session->setFlash('Record deleted<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Record was not deleted<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
		$this->redirect(array('action' => 'index'));
	}
}
?>