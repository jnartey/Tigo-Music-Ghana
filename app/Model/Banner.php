<?php
class Banner extends AppModel {
    var $name = 'Banner';
	var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'banner_image' => array(
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
			'banner_image' => array(
	            'dir' => 'img{DS}banners',
	            'create_directory' => false,
	            'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png'),
	            'allowed_ext' => array('.jpg', '.jpeg', '.png'),
	            'zoomCrop' => false,  
	           	'thumbnails' => true ,
				'thumbsizes' => array(
					'small'  => array('width'=>80, 'height'=>80),
					'large'	 => array('width'=>1440, 'height'=>533),
					'home' => array('width'=>948, 'height'=>483, 'thumbnailQuality' => 100, 'zoomCrop' => true)
				),
				'thumbnailQuality' => 100, 
				'thumbnailDir' => 'thumb',
				'removeOriginal' => true,
	            'default' => 'default.jpg'
	        )
	    )
	);
	
	function getBanner($id=false) {
		return $this->find('all', array('conditions'=>array('Banner.id' => $id)));
	}
	
	function getBannerByTitle($title) {
		return $this->find('all', array('conditions'=>array('Banner.title' => $title)));
	}
	
	function getBannerCategory($id=false, $limit=0) {
		return $this->find('all', array('conditions'=>array('Banner.category' => $id), 'limit'=>$limit));
	}
	
	function listSelectBanners(){
		return $this->find('list', array('conditions'=>array('Banner.category' => null), 'fields'=>array('Banner.id', 'Banner.title')));
	}
	
	function listSelectBanner($id){
		return $this->find('list', array('conditions'=>array('Banner.id' => $id), 'fields'=>array('Banner.id', 'Banner.title')));
	}
	
}
?>