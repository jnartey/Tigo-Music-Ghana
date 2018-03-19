<?php
class Event extends AppModel {
    var $name = 'Event';
	var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Event title is required',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'event_date' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Event date is required',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'event_image' => array(
	        'Empty' => array(
	            'check' => false
	        ),
	        'InvalidExt' => array(
	            'message' => "This file extension isn't allowed."
	        )
	    ),
		'banner' => array(
	        'Empty' => array(
	            'check' => false
	        ),
	        'InvalidExt' => array(
	            'message' => "This file extension isn't allowed."
	        )
	    ),
		'file' => array(
	        'Empty' => array(
	            'check' => false
	        ),
	        'InvalidExt' => array(
	            'message' => "This file extension isn't allowed."
	        )
	    )
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $actsAs = array(
	    'MeioUpload.MeioUpload' => array(
	        'event_image' => array(
	            'dir' => 'img{DS}events',
	            'create_directory' => false,
	            'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png'),
	            'allowed_ext' => array('.jpg', '.jpeg', '.png'),
	            'zoomCrop' => false,  
	           	'thumbnails' => true ,
				'thumbsizes' => array(
					'large'  => array('width'=>800, 'height'=>600),
					'small'  => array('width'=>200, 'height'=>200, 'thumbnailQuality' => 100, 'zoomCrop' => true)
				),
				'thumbnailQuality' => 100, 
				'thumbnailDir' => 'thumb',
				'removeOriginal' => true,
	            'default' => 'default.jpg'
	        ),
			'banner' => array(
	            'dir' => 'img{DS}events',
	            'create_directory' => false,
	            'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png'),
	            'allowed_ext' => array('.jpg', '.jpeg', '.png'),
	            'zoomCrop' => false,  
	           	'thumbnails' => true ,
				'thumbsizes' => array(
					'banner' => array('width'=>948, 'height'=>483, 'thumbnailQuality' => 100, 'zoomCrop' => true)
				),
				'thumbnailQuality' => 100, 
				'thumbnailDir' => 'thumb',
				'removeOriginal' => true,
	            'default' => 'default.jpg'
	        ),
			'file' => array(
	            'dir' => 'img{DS}events',
	            'create_directory' => false,
	            'allowedMime' => array('application/pdf', 'application/msword', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/excel', 'application/rtf', 'application/zip', 'audio/x-ms-wma', 'audio/x-ms-wax', 'audio/vnd.wave', 'audio/mpeg'),
                  'allowedExt' => array('.pdf'),
	            'zoomCrop' => false,  
	           	'thumbnails' => false,
	            'default' => 'default.jpg'
	        )
	    )	/*,
			'Sitemap.Sitemap' => array(
		        'primaryKey' => 'id', //Default primary key field
		        'loc' => 'buildUrl', //Default function called that builds a url, passes parameters (Model $Model, $primaryKey)
		        'lastmod' => 'modified', //Default last modified field, can be set to FALSE if no field for this
		        'changefreq' => 'daily', //Default change frequency applied to all model items of this type, can be set to FALSE to pass no value
		        'priority' => '0.9', //Default priority applied to all model items of this type, can be set to FALSE to pass no value
		        'conditions' => array(), //Conditions to limit or control the returned results for the sitemap
		    )*/
	);
	
	function getEvent($id=false) {
		return $this->find('all', array('conditions'=>array('id' => $id)));
	}
	
	function getEvents($id=false) {
		return $this->find('all', array('conditions'=>array('event_date' => null)));
	}
	
	function getAllEvents() {
		return $this->find('all');
	}
	
	function getEventByTitle($title) {
		return $this->find('all', array('conditions'=>array('title' => $title)));
	}
	
	function getEventCategory($id=false, $limit=0) {
		return $this->find('all', array('conditions'=>array('category' => $id), 'limit'=>$limit));
	}
	
	function listSelectEvents(){
		return $this->find('list', array('conditions'=>array('category' => null), 'fields'=>array('id', 'title')));
	}
	
	function listSelectEvent($id){
		return $this->find('list', array('conditions'=>array('id' => $id), 'fields'=>array('id', 'title')));
	}
	
	function getLatestEvent(){
		return $this->find('first', array('order'=>array('Event.id DESC')));
	}
	
}
?>