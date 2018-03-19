<?php
class BannersController extends AppController {

	public $name = 'Banners';
	
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->layout = 'admin';
	}
	
	public function admin_index() {
		$header = "Banners";
		$current_page = "All Banners";
		
		$this->paginate = array('conditions'=>array('Banner.category'=>null),'order'=>array('Banner.id DESC'), 'limit' => 10);
		$this->Banner->recursive = 0;
		$banners = $this->paginate('Banner');
		
		$this->set(compact('header', 'current_page', 'banners'));
	}
	
	public function admin_view($id = null) {
		$header = "Banners";
		$current_page = "Banners | ";
		
		$this->Banner->id = $id;
		
		if (!$this->Banner->exists()) {
			throw new NotFoundException('Invalid Banner');
		}
		
		if (!$id) {
			$this->Session->setFlash('Invalid Banner<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->set('banner', $this->Banner->read());
		
		$this->paginate = array('conditions' => array('Banner.category' => $id));
		$this->Banner->recursive = 0;
	    $banners = $this->paginate('Banner');
		
		$banner_parent = $this->Banner->getBanner($id);
		
		$this->set(compact('header', 'current_page', 'banners', 'banner_parent'));
	}

	public function admin_add($id = null) {
		$header = "Banners";
		$current_page = "Add Banners";
		$banner_parent = false;
		
		if ($this->request->is('post')) {
			if ($this->Banner->save($this->request->data)) {
				$this->Session->setFlash($this->request->data['Banner']['title'].' Banner has been saved<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
					if($this->request->data['Banner']['id']){
						$this->redirect(array('controller'=>'banners', 'action'=>'view', $this->request->data['Banner']['id'], 'admin'=>true));
					}else{
						$this->redirect(array('action' => 'index'));
					}
				
			} else {
				$this->Session->setFlash($this->request->data['Banner']['title'].' Banner could not be saved. Please, try again.<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			}
		}
		
		if($id){
			$banner_parent = $this->Banner->getBanner($id);
        	$banner = $this->Banner->listSelectBanner($id);
		}
		
		$this->set(compact('header', 'current_page', 'banner', 'banner_parent'));
	}
	

	public function admin_edit($id = null) {
		$header = "Banners";
		$current_page = "Edit Banner";
		
		$this->Banner->id = $id;
		$banner_parent = $this->Banner->getBanner($id);
		
		if (!$this->Banner->exists()) {
			throw new NotFoundException('Invalid Wallpaper');
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Banner->save($this->request->data)) {
				$this->Session->setFlash($this->request->data['Banner']['title'].' Banner has been updated<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
				if($banner_parent[0]['Banner']['category']){
					$this->redirect(array('controller'=>'banners', 'action'=>'view', $banner_parent[0]['Banner']['category'], 'admin'=>true));
				}else{
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash($this->request->data['Banner']['title'].' Banner could not be updated. Please, try again.<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			}
		} else {
			$this->request->data = $this->Banner->read();
			$banner = $this->Banner->read();
		}
		
		$this->set(compact('header', 'current_page', 'banner', 'banner_parent'));
	}

	public function admin_delete($id = null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if (!$id) {
			$this->Session->setFlash('Invalid id for Banner<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Banner->delete($id)) {
			$this->Session->setFlash('Banner deleted<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Banner was not deleted<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
		$this->redirect(array('action' => 'index'));
	}
}
?>