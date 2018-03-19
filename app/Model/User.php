<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
    public $name = 'User';
	public $belongsTo = array('Role');
	public $actsAs = array('Acl' => array('type' => 'requester'));

	    public function parentNode() {
	        if (!$this->id && empty($this->data)) {
	            return null;
	        }
	        if (isset($this->data['User']['role_id'])) {
	            $roleId = $this->data['User']['role_id'];
	        } else {
	            $roleId = $this->field('role_id');
	        }
	        if (!$roleId) {
	            return null;
	        } else {
	            return array('Role' => array('id' => $roleId));
	        }
	    }

    public function beforeSave() {
		// hash our password
		if(isset($this->data[$this->alias]['password'])) {
	       $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
		
		// if we get a new password, hash it
        if (isset($this->data[$this->alias]['ch_password']) && !empty($this->data[$this->alias]['ch_password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['ch_password']);
        }
		
		return true;
    }

	public function bindNode($user) {
	    return array('model' => 'Role', 'foreign_key' => $user['User']['role_id']);
	}
}

?>