<?php
class Artist extends AppModel {
    var $name = 'Artist';
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
		'artist_photo' => array(
	        'Empty' => array(
	            'check' => false
	        ),
	        'InvalidExt' => array(
	            'message' => "This file extension isn't allowed."
	        )
	    ),
	);
	
	var $actsAs = array(
	    'MeioUpload.MeioUpload' => array(
	        'cover_photo' => array(
	            'dir' => 'img{DS}artists',
	            'create_directory' => false,
	            'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png'),
	            'allowed_ext' => array('.jpg', '.jpeg', '.png'),
	            'zoomCrop' => false,  
	           	'thumbnails' => true ,
				'thumbsizes' => array(
					'large'  => array('width'=>800, 'height'=>600),
					'small'  => array('width'=>230, 'height'=>228, 'thumbnailQuality' => 100, 'zoomCrop' => true)
				),
				'thumbnailQuality' => 100, 
				'thumbnailDir' => 'thumb',
				'removeOriginal' => true,
	            'default' => 'default.jpg'
	        ),
			'thumbnail_photo' => array(
	            'dir' => 'img{DS}artists',
	            'create_directory' => false,
	            'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png'),
	            'allowed_ext' => array('.jpg', '.jpeg', '.png'),
	            'zoomCrop' => false,  
	           	'thumbnails' => true ,
				'thumbsizes' => array(
					'small'  => array('width'=>192, 'height'=>151)
				),
				'thumbnailQuality' => 100, 
				'thumbnailDir' => 'thumb',
				'removeOriginal' => true,
	            'default' => 'default.jpg'
	        )
	    )/*,
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
		return $this->find('all', array('conditions'=>array('Artist.id' => $id)));
	}
	
	function getContentByTitle($title) {
		return $this->find('all', array('conditions'=>array('Artist.name' => $title)));
	}
	
	function getContentCategory($id=false, $limit=0) {
		return $this->find('all', array('conditions'=>array('Artist.category' => $id), 'order'=>array('Artist.id'=>'DESC'), 'limit'=>$limit));
	}
	
	function listSelectContents(){
		return $this->find('list', array('conditions'=>array('Artist.category' => null), 'fields'=>array('Artist.id', 'Artist.name')));
	}
	
	function listSelectContent($id){
		return $this->find('list', array('conditions'=>array('Artist.id' => $id), 'fields'=>array('Artist.id', 'Artist.name')));
	}
	
}
?>