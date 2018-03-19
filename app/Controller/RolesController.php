<?php
class RolesController extends AppController {

	public $name = 'Roles';
	
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->layout = 'admin';
	}
	
    public function admin_index() {
		$header = "User Roles";
		$current_page = "All Roles";
		$this->Role->recursive = 0;
		$this->set('roles', $this->paginate());
		$this->set(compact('header', 'current_page'));
	}

	public function admin_view($id = null) {
		$this->Role->id = $id;
		
		if (!$this->Role->exists()) {
			throw new NotFoundException('Invalid role');
		}
		
		if (!$id) {
			$this->Session->setFlash('Invalid role');
			$this->redirect(array('action' => 'index'));
		}
		
		$header = "User Roles";
		$current_page = "Role :: ";
		$this->set('role', $this->Role->read());
		$this->set(compact('header', 'current_page'));
	}

	public function admin_add() {
		$header = "User Roles";
		$current_page = "Add Role";
		
		if ($this->request->is('post')) {
			if ($this->Role->save($this->request->data)) {
				$this->Session->setFlash('The role has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The role could not be saved. Please, try again.');
			}
		}
		
		$this->set(compact('header', 'current_page'));
	}

	public function admin_edit($id = null) {
		$header = "User Roles";
		$current_page = "Edit Role";
		
		$this->Role->id = $id;
		
		if (!$this->Role->exists()) {
			throw new NotFoundException('Invalid role');
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Role->save($this->request->data)) {
				$this->Session->setFlash('The role has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The role could not be saved. Please, try again.');
			}
		} else {
			$this->request->data = $this->Role->read();
		}
		
		$this->set(compact('header', 'current_page'));
	}

	public function admin_delete($id = null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if (!$id) {
			$this->Session->setFlash('Invalid id for role');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Role->delete($id)) {
			$this->Session->setFlash('Role deleted');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Role was not deleted');
		$this->redirect(array('action' => 'index'));
	}
}
?>
