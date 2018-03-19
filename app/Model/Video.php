<?php
class Video extends AppModel {
    var $name = 'Video';
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
		'video_poster' => array(
	        'Empty' => array(
	            'check' => false
	        ),
	        'InvalidExt' => array(
	            'message' => "This file extension isn't allowed."
	        )
	    ),
		'video_mp4' => array(
	        'Empty' => array(
	            'check' => false
	        ),
	        'InvalidExt' => array(
	            'message' => "This file extension isn't allowed."
	        )
	    ),
		'video_webm' => array(
	        'Empty' => array(
	            'check' => false
	        ),
	        'InvalidExt' => array(
	            'message' => "This file extension isn't allowed."
	        )
	    ),
		'video_ogv' => array(
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
	        'video_poster' => array(
	            'dir' => 'img{DS}videos',
	            'create_directory' => false,
	            'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png'),
	            'allowed_ext' => array('.jpg', '.jpeg', '.png'),
	            'zoomCrop' => false,  
	           	'thumbnails' => true ,
				'thumbsizes' => array(
					'large'  => array('width'=>1440, 'height'=>600),
					'small'  => array('width'=>223, 'height'=>125, 'thumbnailQuality' => 100, 'zoomCrop' => true),
				),
				'thumbnailQuality' => 100, 
				'thumbnailDir' => 'thumb',
				'removeOriginal' => true,
	            'default' => 'default.jpg'
	        ),
			'video_mp4' => array(
	            'dir' => 'files{DS}videos',
	            'create_directory' => false,
	            'allowedMime' => array('video/mp4'),
				'allowedExt' => array('.mp4'),
	            'zoomCrop' => false,  
	           	'thumbnails' => false,
	            'default' => 'default.jpg'
	        ),
			'video_webm' => array(
	            'dir' => 'files{DS}videos',
	            'create_directory' => false,
	            'allowedMime' => array('video/webm'),
				'allowedExt' => array('.webm'),
	            'zoomCrop' => false,  
	           	'thumbnails' => false,
	            'default' => 'default.jpg'
	        ),
			'video_ogv' => array(
	            'dir' => 'files{DS}videos',
	            'create_directory' => false,
	            'allowedMime' => array('video/ogg'),
				'allowedExt' => array('.ogv'),
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
		return $this->find('all', array('conditions'=>array('Video.id' => $id)));
	}
	
	function getContentByTitle($title) {
		return $this->find('all', array('conditions'=>array('Video.name' => $title)));
	}
	
	function getContentCategory($id=false, $limit=0) {
		return $this->find('all', array('conditions'=>array('Video.category' => $id), 'order'=>array('Video.id'=>'DESC'), 'limit'=>$limit));
	}
	
	function listSelectContents(){
		return $this->find('list', array('conditions'=>array('Video.category' => null), 'fields'=>array('Video.id', 'Video.name')));
	}
	
	function listSelectContent($id){
		return $this->find('list', array('conditions'=>array('Video.id' => $id), 'fields'=>array('Video.id', 'Video.name')));
	}
	
}
?>