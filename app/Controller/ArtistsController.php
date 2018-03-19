<?php
class ArtistsController extends AppController {

	public $name = 'Artists';
	
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->layout = 'admin';
	}
	
	public function admin_index() {
		$header = "Artists";
		$current_page = "All Artist Content";
		
		$this->paginate = array('conditions'=>array('Artist.category'=>null), 'order'=>array('Artist.id DESC'), 'limit' => 10);
		$this->Artist->recursive = 0;
		$items = $this->paginate('Artist');
		
		$this->set(compact('header', 'current_page', 'items'));
	}
	
	public function admin_view($id = null) {
		$header = "Artists";
		$current_page = "Content | ";
		
		$this->Artist->id = $id;
		
		if (!$this->Artist->exists()) {
			throw new NotFoundException('Invalid content');
		}
		
		if (!$id) {
			$this->Session->setFlash('Invalid content<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->set('item', $this->Artist->read());
		
		$this->paginate = array('conditions' => array('Artist.category' => $id), 'order'=>array('Artist.id DESC'), 'limit' => 20);
		$this->Artist->recursive = 0;
	    $items = $this->paginate('Artist');
		
		$item_parent = $this->Artist->getContent($id);
		
		$this->set(compact('header', 'current_page', 'items', 'item_parent'));
	}

	public function admin_add($id = null) {
		$this->loadModel('Gallery');
		
		$header = "Artists";
		$current_page = "Add";
		$rev = null;
		$parent = null;
		$item_parent = false;
		
		if ($this->request->is('post')) {
			if ($this->Artist->save($this->request->data)) {
				$this->Session->setFlash($this->request->data['Artist']['name'].' has been saved<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
					if($this->request->data['Artist']['cid']){
						$this->redirect(array('controller'=>'artists', 'action'=>'view', $this->request->data['Artist']['cid'], 'admin'=>true));
					}else{
						$this->redirect(array('action' => 'index'));
					}
				
			} else {
				$this->Session->setFlash($this->request->data['Artist']['name'].' could not be saved. Please, try again.<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			}
		}
		
		if($id){
			$item_parent = $this->Artist->getContent($id);
        	$item = $this->Artist->listSelectContent($id);
			$rev = $id;
			
			$item_parent = $this->Artist->getContent($id);
			
			$parent = $this->Artist->find('first', array('conditions'=>array('Artist.id'=>$id)));
		
		}
					
		$this->set(compact('header', 'current_page', 'item', 'item_parent', 'rev', 'parent'));
	}
	

	public function admin_edit($id = null) {
		$header = "Artists";
		$current_page = "Edit";
		$parent = null;			
		$this->Artist->id = $id;
		$item_parent = $this->Artist->getContent($id);
		
		if (!$this->Artist->exists()) {
			throw new NotFoundException('Invalid content');
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if(isset($this->request->data['Artist']['remove_image']) && !empty($this->request->data['Artist']['remove_image'])){
				$this->request->data['Artist']['cover']['remove'] = true;
			}
			
			if($this->Artist->save($this->request->data)) {
				$this->Session->setFlash($this->request->data['Artist']['name'].' has been updated<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
				if($item_parent[0]['Artist']['category']){
					$this->redirect(array('controller'=>'artists', 'action'=>'view', $item_parent[0]['Artist']['category'], 'admin'=>true));
				}else{
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash($this->request->data['Artist']['name'].' could not be updated. Please, try again.<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			}
		} else {
			$this->request->data = $this->Artist->read();
			$item = $this->Artist->read();
			if($item['Artist']['category']){
				$parent = $this->Artist->find('first', array('conditions'=>array('Artist.id'=>$item['Artist']['category'])));
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
		if ($this->Artist->delete($id)) {
			$this->Session->setFlash('Record deleted<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Record was not deleted<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
		$this->redirect(array('action' => 'index'));
	}
}
?>