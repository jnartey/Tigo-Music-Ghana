<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';
	
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow();
		
		$mobile_detect = false;
		
		if($this->RequestHandler->isMobile()) {
			$mobile_detect = true;
		}
		
		$this->set(compact('mobile_detect'));
	}

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
	
	public function index(){
		$title_for_layout = "home";
		$main_page_title = "Tigo Music Ghana | Unlimited Music";
		$this->loadModel('Banner');
		$this->loadModel('Event');
		$this->loadModel('Music');
		$this->loadModel('Artist');
		$this->loadModel('News');
		$this->loadModel('Video');
		
		$news_highlights = null;
		$events_highlights = null;
		
		//$banners = $this->Banner->getBannerCategory(1);
		$banners = $this->Banner->find('all', array('conditions' => array('Banner.category'=>1, 'Banner.publish'=>1)));
		$playlists = $this->Music->getContentCategory(1, 5);
		$upcoming_artists = $this->Artist->getContentCategory(1, 5);
		$pre_releases = $this->Music->getContentCategory(3, 5);
		
		$events = $this->Event->find('all', array('order' => 'Event.id DESC', 'limit' => 4));
		$events_highlights = $this->Event->find('all', array('conditions' => array('Event.publish_home'=>1), 'order' => array('Event.event_date'=>'DESC'), 'limit' => 3));
		$videos = $this->Video->find('all', array('conditions' => array('Video.category'=>1), 'order' => array('Video.id'=>'DESC'), 'limit' => 10));
		
		$upcoming_artist = $this->Artist->find('first', array('order' => 'Artist.created DESC'));
		$news_tick = $this->News->find('all', array('conditions'=>array('News.publish'=>1), 'order' => array('News.id' => 'DESC'), 'limit' => 20));
		$news_highlights = $this->News->find('all', array('conditions' => array('News.publish_home'=>1), 'order' => array('News.timestamp'=>'DESC'), 'limit' => 3));
		
		$this->set(compact('title_for_layout', 'main_page_title', 'banners', 'playlists', 'news_tick', 'upcoming_artists', 'events', 'pre_releases', 'videos', 'page_meta_description', 'page_meta_keywords', 'news_highlights', 'events_highlights'));
	}
	
	public function music($id=null){
		$title_for_layout = "music";
		$main_page_title = "Music | Tigo Music Ghana";
		$current_page = 'music';
		$this->loadModel('Banner');
		$this->loadModel('Music');
		
		$banners = $this->Banner->getBannerCategory(2, 1);
		$playlists = $this->Music->getContentCategory(1, 5);
		$albums = $this->Music->getContentCategory(2, 5);
		$pre_releases = $this->Music->getContentCategory(3, 5);
		$theme_days = $this->Music->getContentCategory(4, 5);
		$this->set(compact('title_for_layout', 'main_page_title', 'current_page', 'banners', 'playlists', 'albums', 'pre_releases', 'theme_days', 'page_meta_description', 'page_meta_keywords'));
	}
	
	public function how_to_access_deezer(){
		$title_for_layout = "how to access deezer";
		$main_page_title = "How to Access Deezer | Tigo Music Ghana";
		$this->loadModel('PageContent');
		$this->loadModel('Banner');
		
		$banners = $this->Banner->getBannerCategory(15, 1);
		$how_to_access = $this->PageContent->find('first', array('conditions'=>array('PageContent.id'=>1)));
		$faqs = $this->PageContent->getContentCategory(1);
		
		$this->set(compact('title_for_layout', 'main_page_title', 'how_to_access', 'faqs', 'banners', 'page_meta_description', 'page_meta_keywords'));
	}
	
	public function playlists($id=null){
		$title_for_layout = "music";
		$main_page_title = "Music | Tigo Music Ghana";
		$current_page = 'playlists';
		$this->loadModel('Banner');
		$this->loadModel('Music');
		
		$fetch_data = null;
		
		$banners = $this->Banner->getBannerCategory(2, 1);
		$playlists = $this->Music->getContentCategory(1);
		
		if($id){
			$fetch_data = $this->Music->find('first', array('conditions'=>array('Music.id'=>$id)));
		}
		
		$this->set(compact('title_for_layout', 'main_page_title', 'banners', 'playlists', 'current_page', 'fetch_data', 'page_meta_description', 'page_meta_keywords'));
	}
	
	public function albums($id=null){
		$title_for_layout = "music";
		$main_page_title = "Music | Tigo Music Ghana";
		$current_page = 'albums';
		$this->loadModel('Banner');
		$this->loadModel('Music');
		
		$fetch_data = null;
		
		$banners = $this->Banner->getBannerCategory(2, 1);
		$albums = $this->Music->getContentCategory(2);
		
		if($id){
			$fetch_data = $this->Music->find('first', array('conditions'=>array('Music.id'=>$id)));
		}
		
		$this->set(compact('title_for_layout', 'main_page_title', 'banners', 'albums', 'current_page', 'fetch_data', 'page_meta_description', 'page_meta_keywords'));
	}
	
	public function pre_releases($id=null){
		$title_for_layout = "music";
		$main_page_title = "Music | Tigo Music Ghana";
		$current_page = 'pre-releases';
		$this->loadModel('Banner');
		$this->loadModel('Music');
		$fetch_data = null;
		
		$banners = $this->Banner->getBannerCategory(2, 1);
		$pre_releases = $this->Music->getContentCategory(3);
				
		if($id){
			$fetch_data = $this->Music->find('first', array('conditions'=>array('Music.id'=>$id)));
		}
		
		$this->set(compact('title_for_layout', 'main_page_title', 'banners', 'pre_releases', 'current_page', 'fetch_data', 'page_meta_description', 'page_meta_keywords'));
	}
	
	public function theme_days($id=null){
		$title_for_layout = "music";
		$main_page_title = "Music | Tigo Music Ghana";
		$current_page = 'theme days';
		$this->loadModel('Banner');
		$this->loadModel('Music');
		
		$theme_day = null;
		
		$banners = $this->Banner->getBannerCategory(2, 1);
		$this->paginate = array('conditions'=>array('Music.category'=>4), 'order'=>array('Music.id'=>'DESC'), 'limit' => 20);
		$this->Music->recursive = 0;
		$theme_days = $this->paginate('Music');
		
		if($id){
			$theme_day = $this->Music->find('first', array('conditions'=>array('Music.id'=>$id), 'order' => 'Music.created DESC'));
		}
		$this->set(compact('title_for_layout', 'main_page_title', 'banners', 'theme_days', 'current_page', 'theme_day', 'page_meta_description', 'page_meta_keywords'));
	}
	
	public function videos(){
		$title_for_layout = "videos";
		$main_page_title = "Videos | Tigo Music  Ghana";
		$this->loadModel('Banner');
		$this->loadModel('Video');
		
		$banners = $this->Banner->getBannerCategory(3, 1);
		$videos = $this->Video->find('all', array('conditions' => array('Video.category'=>1), 'order' => 'Video.id DESC', 'limit' => 10));
		
		$this->set(compact('title_for_layout', 'main_page_title', 'banners', 'videos', 'page_meta_description', 'page_meta_keywords'));
		
	}
	
	public function latest_videos(){
		$title_for_layout = "videos";
		$main_page_title = "Videos | Tigo Music  Ghana";
		$this->loadModel('Banner');
		$this->loadModel('Video');
		
		$banners = $this->Banner->getBannerCategory(3, 1);
		$this->paginate = array('conditions'=>array('Video.category'=>1), 'order'=>array('Video.id'=>'DESC'), 'limit' => 25);
		$this->Video->recursive = 0;
		$videos = $this->paginate('Video');
		
		$featured = $this->Video->find('first', array('conditions' => array('Video.featured'=>1)));
		
		$this->set(compact('title_for_layout', 'main_page_title', 'banners', 'videos', 'featured', 'page_meta_description', 'page_meta_keywords'));
		
	}
	
	public function unplugged(){
		$title_for_layout = "unplugged";
		$main_page_title = "Unplugged | Tigo Music  Ghana";
		$this->loadModel('Banner');
		$this->loadModel('Video');
		$this->loadModel('News');
		
		$banners = $this->Banner->getBannerCategory(31, 1);
		$this->paginate = array('conditions'=>array('Video.category'=>217), 'order'=>array('Video.id'=>'DESC'), 'limit' => 5);
		$this->Video->recursive = 0;
		$videos = $this->paginate('Video');
		
		$featured = $this->Video->find('first', array('conditions' => array('Video.featured'=>1, 'Video.category'=>217)));
		$news = $this->News->find('all', array('conditions'=>array('News.publish'=>1), 'order' => array('News.id' => 'DESC'), 'limit' => 5));
		
		$this->set(compact('title_for_layout', 'main_page_title', 'banners', 'videos', 'featured', 'page_meta_description', 'page_meta_keywords', 'news'));
		
	}
	
	public function load_video($id=null){
		$this->layout = 'ajax';
		$this->loadModel('Video');
		
		$video = $this->Video->find('first', array('conditions' => array('Video.id'=>$id)));
		$this->set(compact('title_for_layout', 'video'));
	}
	
	public function upluggedvideo($id=null){
		$this->layout = 'ajax';
		$this->loadModel('Video');
		
		$video = $this->Video->find('first', array('conditions' => array('Video.id'=>$id)));
		$this->set(compact('title_for_layout', 'video'));
	}
	
	public function artists($id=null){
		$title_for_layout = "artists";
		$main_page_title = "Artists | Tigo Music  Ghana";
		$current_page = 'artists';
		
		$this->loadModel('Banner');
		$this->loadModel('Artist');
		
		$upcoming_artist = null;
		
		$banners = $this->Banner->getBannerCategory(4, 1);
		$upcoming_artists = $this->Artist->getContentCategory(1, 5);
		$artists = $this->Artist->getContentCategory(2, 5);
		
		$this->set(compact('title_for_layout', 'main_page_title', 'upcoming_artists', 'artists', 'banners', 'current_page', 'page_meta_description', 'page_meta_keywords'));
	}
	
	public function up_coming_artist($id=null){
		$title_for_layout = "artists";
		$main_page_title = "Artists | Tigo Music  Ghana";
		$current_page = 'up & coming artist';
		
		$this->loadModel('Banner');
		$this->loadModel('Artist');
		
		$upcoming_artist = null;

		$banners = $this->Banner->getBannerCategory(4, 1);
		
		$this->paginate = array('conditions'=>array('Artist.category'=>1), 'order'=>array('Artist.id'=>'DESC'), 'limit' => 20);
		$this->Artist->recursive = 0;
		$upcoming_artists = $this->paginate('Artist');
		
		if($id){
			$upcoming_artist = $this->Artist->find('first', array('conditions'=>array('Artist.id'=>$id), 'order' => 'Artist.created DESC'));
		}
		
		$this->set(compact('title_for_layout', 'main_page_title', 'upcoming_artists', 'upcoming_artist', 'banners', 'current_page', 'page_meta_description', 'page_meta_keywords'));
	}
	
	public function spotlight_on_artist($id=null){
		$title_for_layout = "artists";
		$main_page_title = "Artists | Tigo Music  Ghana";
		$current_page = 'spotlight on artist';
		
		$this->loadModel('Banner');
		$this->loadModel('Artist');
		
		$artists = null;
		$artist = null;
		
		$banners = $this->Banner->getBannerCategory(4, 1);

		$this->paginate = array('conditions'=>array('Artist.category'=>2), 'order'=>array('Artist.id' => 'DESC'), 'limit' => 20);
		$this->Artist->recursive = 0;
		$artists = $this->paginate('Artist');
		
		if($id){
			$artist = $this->Artist->find('first', array('conditions'=>array('Artist.id'=>$id), 'order' => 'Artist.created DESC'));
		}
				
		$this->set(compact('title_for_layout', 'main_page_title', 'artists', 'artist', 'banners', 'current_page', 'page_meta_description', 'page_meta_keywords'));
	}
	
	public function news($id=null){
		$title_for_layout = "news";
		$main_page_title = "News | Tigo Music Ghana";
		$this->loadModel('Banner');
		$this->loadModel('News');
		
		$article = null;

		$banners = $this->Banner->getBannerCategory(6, 1);
		$this->paginate = array('conditions'=>array('News.publish'=>1), 'order'=>array('News.id' => 'DESC'), 'limit' => 20);
		$this->News->recursive = 0;
		$news = $this->paginate('News');
		
		if($id){
			$article = $this->News->find('first', array('conditions'=>array('News.id'=>$id)));
		}
		
		$this->set(compact('title_for_layout', 'main_page_title', 'banners', 'news', 'article', 'page_meta_description', 'page_meta_keywords'));
	}
	
	public function events($id=null){
		$title_for_layout = "events";
		$main_page_title = "Events | Tigo Music Ghana";
		$this->loadModel('Banner');
		$this->loadModel('Event');
		$this->loadModel('Gallery');
		$this->loadModel('Image');
		$banners = $this->Banner->getBannerCategory(5, 1);
		$event_data = null;
		$gallery_check_tmp = null;
		$gallery_check = null;
		
		$events = $this->Event->find('all', array('order' => array('Event.event_date'=>'DESC')));
		
		if($id){
			$event_data = $this->Event->find('first', array('conditions'=>array('Event.id'=>$id)));
			$gallery_check_tmp = $this->Gallery->find('first', array('conditions'=>array('Gallery.link_id'=>$id)));
			if($gallery_check_tmp){
				$gallery_check = $this->Image->find('all', array('conditions'=>array('Image.gallery_id'=>$gallery_check_tmp['Gallery']['id'])));
			}
		}
				
		$this->set(compact('title_for_layout', 'main_page_title', 'banners', 'events', 'event_data', 'page_meta_description', 'page_meta_keywords', 'gallery_check'));
	}
	
	public function gmn($id=null){
		$title_for_layout = "ghana meets naija";
		$main_page_title = "Ghana Meets Naija";
		$this->loadModel('Banner');
		$this->loadModel('PageContent');
		$banners = $this->Banner->getBannerCategory(5, 1);
		
		$this->set(compact('title_for_layout', 'main_page_title', 'banners', 'page_meta_description', 'page_meta_keywords'));
	}
	
	public function events_gallery($id=null){
		$title_for_layout = "event gallery";
		$this->loadModel('Gallery');
		$this->loadModel('Image');
		$this->loadModel('Banner');
		$this->loadModel('Event');
		$banners = $this->Banner->getBannerCategory(5, 1);
		$galleries = null;
		$gallery = null;
		
		if($id){
			$gallery = $this->Gallery->find('first', array('conditions'=>array('Gallery.link_id'=>$id)));
			$this->paginate = array('conditions'=>array('Image.gallery_id'=>$gallery['Gallery']['id']), 'order'=>array('Image.id' => 'DESC'), 'limit' => 24);
			$this->Image->recursive = 0;
			$images = $this->paginate('Image');
			$event = $this->Event->find('first', array('conditions'=>array('Event.id'=>$id)));
			$main_page_title = $gallery['Gallery']['name'];
			
		}else{
			$main_page_title = "Events Gallery";
			$galleries = $this->Gallery->find('all');
			$this->paginate = array('order'=>array('Gallery.id' => 'DESC'), 'limit' => 24);
			$this->Gallery->recursive = 0;
			$galleries = $this->paginate('Gallery');
		}
		
		$this->set(compact('title_for_layout', 'main_page_title', 'banners', 'page_meta_description', 'page_meta_keywords', 'galleries', 'gallery', 'event', 'images'));
	}
	
	public function live_streaming(){
		$title_for_layout = "live streaming";
		
		$this->set(compact('title_for_layout'));
	}
	
}
