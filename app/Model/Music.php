<?php
class Music extends AppModel {
    var $name = 'Music';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cover' => array(
	        'Empty' => array(
	            'check' => false
	        ),
	        'InvalidExt' => array(
	            'message' => "This file extension isn't allowed."
	        )
	    ),
		'track' => array(
	        'Empty' => array(
	            'check' => false
	        ),
	        'InvalidExt' => array(
	            'message' => "This file extension isn't allowed."
	        )
	    )
	);
	
	var $actsAs = array(
	    'MeioUpload.MeioUpload' => array(
	        'cover' => array(
	            'dir' => 'img{DS}music',
	            'create_directory' => false,
	            'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png'),
	            'allowed_ext' => array('.jpg', '.jpeg', '.png'),
	            'zoomCrop' => false,  
	           	'thumbnails' => true ,
				'thumbsizes' => array(
					'large'  => array('width'=>800, 'height'=>600),
					'small'  => array('width'=>230, 'height'=>228, 'thumbnailQuality' => 100, 'zoomCrop' => true),
				),
				'thumbnailQuality' => 100, 
				'thumbnailDir' => 'thumb',
				'removeOriginal' => true,
	            'default' => 'default.jpg'
	        ),
			'track' => array(
	            'dir' => 'files{DS}music',
	            'create_directory' => false,
	            'allowedMime' => array('application/pdf', 'application/msword', 'application/mspowerpoint', 'application/excel', 'application/rtf', 'application/zip'),
				'allowedExt' => array('.pdf', '.doc', '.ppt', '.xls', '.rtf', '.zip'),
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
	
	function getContent($id=false) {
		return $this->find('all', array('conditions'=>array('Music.id' => $id)));
	}
	
	function getContentByTitle($title) {
		return $this->find('all', array('conditions'=>array('Music.name' => $title)));
	}
	
	function getContentCategory($id=false, $limit=0) {
		return $this->find('all', array('conditions'=>array('Music.category' => $id), 'order'=>array('Music.id'=>'DESC'), 'limit'=>$limit));
	}
	
	function listSelectContents(){
		return $this->find('list', array('conditions'=>array('Music.category' => null), 'fields'=>array('Music.id', 'Music.name')));
	}
	
	function listSelectContent($id){
		return $this->find('list', array('conditions'=>array('Music.id' => $id), 'fields'=>array('Music.id', 'Music.name')));
	}
	
}
?>