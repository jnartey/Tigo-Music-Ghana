<?php
class EventsController extends AppController {

	public $name = 'Events';
	
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->layout = 'admin';
	}
	
	public function admin_index() {
		$header = "Events";
		$current_page = "All Events";
		
		$this->paginate = array('order'=>array('Event.id'=>'DESC'), 'limit' => 10);
		$this->Event->recursive = 0;
		$events = $this->paginate('Event');
		
		// $records = $this->Event->find('all');
		// 		
		// 		foreach($records as $record):
		// 							
		// 							if($record['Event']['event_date']){
		// 								$this->Event->id = $record['Event']['id'];
		// 								$this->Event->saveField("event_date", date("Y-m-d", strtotime($record['Event']['event_date']))); 
		// 							}
		// 							
		// 						endforeach;
		
		$this->set(compact('header', 'current_page', 'events'));
	}
	
	public function admin_view($id = null) {
		$header = "Events";
		$current_page = "Content | ";
		
		$this->Event->id = $id;
		
		if (!$this->Event->exists()) {
			throw new NotFoundException('Invalid Event');
		}
		
		if (!$id) {
			$this->Session->setFlash('Invalid Event<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->set('event', $this->Event->read());
		
		$this->paginate = array('order'=>'Event.created DESC');
		$this->Event->recursive = 0;
	    $events = $this->paginate('Event');
		
		$event_parent = $this->Event->getEvent($id);
		
		$this->set(compact('header', 'current_page', 'events', 'event_parent'));
	}

	public function admin_add($id = null) {
		$header = "Events";
		$current_page = "Add Event";
		
		$this->loadModel('Gallery');
		
		if ($this->request->is('post')) {
			if ($this->Event->save($this->request->data)) {
				$data = array('link_id' => $this->Event->getInsertID(), 
							  'name' => $this->request->data['Event']['title']
							);
				if($this->Gallery->save($data)){
					$this->Session->setFlash($this->request->data['Event']['title'].' Event has been saved<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
					$this->redirect(array('action' => 'index'));
				}
				
			} else {
				$this->Session->setFlash($this->request->data['Event']['title'].' Page could not be saved. Please, try again.<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			}
		}
		
		if($id){
			$event_parent = $this->Event->getEvent($id);
        	$event = $this->Event->listSelectEvent($id);
		}else {
			$event = null;
		}
					
		$event_parent = false;
		
		$this->set(compact('header', 'current_page', 'event', 'event_parent'));
	}
	

	public function admin_edit($id = null) {
		$header = "Events";
		$current_page = "Edit Page";
		
		$this->loadModel('Gallery');
		
		$this->Event->id = $id;
		$event_parent = $this->Event->getEvent($id);
		
		if (!$this->Event->exists()) {
			throw new NotFoundException('Invalid Event');
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Event->save($this->request->data)) {
				
				$gallery = $this->Gallery->find('all', array('conditions'=>array('Gallery.link_id'=>$this->Event->id)));
				if($gallery){
					$this->Gallery->id = $gallery[0]['Gallery']['id'];
					$this->Gallery->set('name', $this->request->data['Event']['title']);
				}else{
					$this->Gallery->set('link_id', $this->Event->id);
					$this->Gallery->set('name', $this->request->data['Event']['title']);
				}
				
				if($this->Gallery->save()){
					$this->Session->setFlash($this->request->data['Event']['title'].' Event has been updated<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
					//if($event_parent[0]['Event']['category']){
						//$this->redirect(array('controller'=>'events', 'action'=>'view', $event_parent[0]['Event']['category'], 'admin'=>true));
					//}else{
						$this->redirect(array('action' => 'index'));
					//}
				}
				
			} else {
				$this->Session->setFlash($this->request->data['Event']['title'].' Event could not be updated. Please, try again.<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			}
		} else {
			$this->request->data = $this->Event->read();
			$event = $this->Event->read();
		}
				
		$this->set(compact('header', 'current_page', 'event', 'event_parent'));
	}

	public function admin_delete($id = null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if (!$id) {
			$this->Session->setFlash('Invalid id for Page<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Event->delete($id)) {
			$this->Session->setFlash('Event deleted<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box success'));
			$this->redirect(array('action'=>'index'));
		}
		
		$this->Session->setFlash('Event was not deleted<a href="" class="close">&times;</a>', 'default', array('class' => 'alert-box alert'));
		$this->redirect(array('action' => 'index'));
	}
}
?>