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
class GmnController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Gmn';
	
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
	
	
	public function index($id=null){
		$title_for_layout = "ghana meets naija";
		$main_page_title = "Ghana Meets Naija";
		$this->loadModel('Banner');
		$this->loadModel('PageContent');
		$banners = $this->Banner->getBannerCategory(5, 1);
		
		$this->set(compact('title_for_layout', 'main_page_title', 'banners', 'page_meta_description', 'page_meta_keywords'));
	}

}
