<?php
class UsersController extends AppController {

	public $name = 'Users';
	
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->layout = 'admin';
	}
	
	public function isAuthorized($user) {
	    if ($user['role'] == 'admin') {
	        return true;
	    }
	    if (in_array($this->action, array('edit', 'delete'))) {
	        if ($user['id'] != $this->request->params['pass'][0]) {
	            return false;
	        }
	    }
	    return true;
	}
	
	public function admin_index() {
		$header = "User Management";
		$current_page = "Users";
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
		$this->set(compact('header', 'current_page'));
	}
	
	public function admin_login() {
		$title_for_layout = "Adrenalin CMS (Version 2.1.1) | Administrator Control Panel";
		$this->set(compact('title_for_layout'));
		
		$this->layout = 'login';
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());   
	        } else {
	            $this->Session->setFlash('Your username/password combination was incorrect<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
	        }
	    }
	}
	
	public function admin_logout() {
		$this->Session->setFlash('You have successfully logged out!<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
	    $this->redirect($this->Auth->logout());
	}
	
	public function admin_view($id = null) {
		$this->User->id = $id;
		
		if (!$this->User->exists()) {
			throw new NotFoundException('Invalid user');
		}
		
		if (!$id) {
			$this->Session->setFlash('Invalid user<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			$this->redirect(array('action' => 'index'));
		}
		
		$header = "User Management";
		$current_page = "User :: ";
		
		$this->set('user', $this->User->read());
		$this->set(compact('header', 'current_page'));
	}

	public function admin_add() {
		$header = "User Management";
		$current_page = "Add User";
		if ($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The user '.$this->request->data['User']['username'].' has been saved<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The user '.$this->request->data['User']['username'].' could not be saved. Please, try again.<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			}
		}
		
		$roles = $this->User->Role->find('list');
        $this->set(compact('roles', 'header', 'current_page'));
	}

	public function admin_edit($id = null) {
			$header = "User Management";
			$current_page = "Edit User";
	        $this->User->id = $id;
			
	        if (!$this->User->exists()) {
	            throw new NotFoundException(__('Invalid user'));
	        }
	        if ($this->request->is('post') || $this->request->is('put')) {
	            if ($this->User->save($this->request->data)) {
	                $this->Session->setFlash(__('The user '.$this->request->data['User']['username'].' has been updated<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success')));
	                $this->redirect(array('action' => 'index'));
	            } else {
	                $this->Session->setFlash(__('The user '.$this->request->data['User']['username'].' could not be updated. Please, try again.<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert')));
	            }
	        } else {
	            $this->request->data = $this->User->read(null, $id);
	            //unset($this->request->data['User']['password']);
	        }
			
			$roles = $this->User->Role->find('list');
	        $this->set(compact('roles', 'header', 'current_page'));
	    }

	public function admin_delete($id = null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if (!$id) {
			$this->Session->setFlash('Invalid id for user<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash('User deleted<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('User was not deleted<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
		$this->redirect(array('action' => 'index'));
	}
	
}
?>
