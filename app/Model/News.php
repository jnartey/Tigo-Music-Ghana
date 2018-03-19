<?php
class News extends AppModel {
    var $name = 'News';
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
		'image' => array(
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
	        'image' => array(
	            'dir' => 'img{DS}news',
	            'create_directory' => false,
	            'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png'),
	            'allowed_ext' => array('.jpg', '.jpeg', '.png'),
	            'zoomCrop' => false,  
	           	'thumbnails' => true ,
				'thumbsizes' => array(
					'large'  => array('width'=>980, 'height'=>700),
					'small'  => array('width'=>113, 'height'=>101, 'thumbnailQuality' => 100, 'zoomCrop' => true)
				),
				'thumbnailQuality' => 100, 
				'thumbnailDir' => 'thumb',
				'removeOriginal' => true,
	            'default' => 'default.jpg'
	        ),
			'banner' => array(
	            'dir' => 'img{DS}news',
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
	            'dir' => 'files{DS}news',
	            'create_directory' => false,
	            'allowedMime' => array('application/pdf', 'application/msword', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/excel', 'application/rtf', 'application/zip', 'application/msword', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.wordprocessingml.template', 'application/vnd.ms-excel', 'application/vnd.ms-excel', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.ms-powerpoint', 'application/vnd.ms-powerpoint', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/vnd.openxmlformats-officedocument.presentationml.template', 'application/vnd.openxmlformats-officedocument.presentationml.slideshow', 'application/vnd.ms-powerpoint.addin.macroEnabled.12', 'application/vnd.ms-powerpoint.presentation.macroEnabled.12', 'application/vnd.ms-powerpoint.template.macroEnabled.12', 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12'),
                  'allowedExt' => array('.pdf', '.doc', '.dot', '.docx', '.dotx', 'xls', 'xlt', 'xla', 'ppt', 'pot', 'pps', 'ppa', 'pptx', 'potx', 'ppsx', 'ppam', 'pptm', 'potm', 'ppsm'),
	            'zoomCrop' => false,  
	           	'thumbnails' => false
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
	
	function listNews($limit=0) {
		return $this->find('all', array('conditions'=>array('News.publish' => 1, 'News.archive'=>0), 'order'=>array('News.id DESC'), 'order'=>array('News.id DESC'), 'limit'=>$limit));
	}
	
	function getNews(){
		return $this->find('all', array('conditions'=>array('News.category' => null, 'News.publish' => 1, 'archive'=>0)));
	}
	
	function getNewsCategory($id=false, $limit=0) {
		return $this->find('all', array('conditions'=>array('News.category' => $id), 'limit'=>$limit));
	}
	
	function getLatestNews(){
		return $this->find('first', array('conditions'=>array('News.publish' => 1, 'archive'=>0), 'order'=>array('News.id DESC')));
	}
	
	function listSelectNews($id){
		return $this->find('list', array('conditions'=>array('News.id' => $id), 'fields'=>array('News.id', 'News.title')));
	}
	
}
?>