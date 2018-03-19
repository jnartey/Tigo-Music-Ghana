<?php if($this->Session->read('Auth.User')){?>
<!-- admin menu -->
<div id="admin-menu-bar">
	<nav class="top-bar">
	  <ul class="title-area">
	    <!-- Title Area -->
	    <li class="name">
	      <h1><?php echo $this->Html->link(__(("Dashboard"), true), array('controller'=> 'dashboard', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'admin-panel fancybox.iframe')); ?></h1>
	    </li>
	    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
	    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	  </ul>

	  <section class="top-bar-section">
	    <!-- Left Nav Section -->
	    <ul class="left">
			<li class="divider hide-for-small"></li>
	      	<li>
	          <?php echo $this->Html->link(__(("Users"), true), array('controller'=> 'users', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'admin-panel fancybox.iframe')); ?>
			</li>
			<li>
	          <?php echo $this->Html->link(__(("Pages"), true), array('controller'=> 'pageContents', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'admin-panel fancybox.iframe')); ?>
			</li>
			<li>
	          <?php echo $this->Html->link(__(("Banners"), true), array('controller'=> 'banners', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'admin-panel fancybox.iframe')); ?>
			</li>
			<li>
	          <?php echo $this->Html->link(__(("Music"), true), array('controller'=> 'music', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'admin-panel fancybox.iframe')); ?>
			</li>
			<li>
	          <?php echo $this->Html->link(__(("Videos"), true), array('controller'=> 'videos', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'admin-panel fancybox.iframe')); ?>
			</li>
			<li>
	          <?php echo $this->Html->link(__(("Artists"), true), array('controller'=> 'artists', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'admin-panel fancybox.iframe')); ?>
			</li>
			<li>
	          <?php echo $this->Html->link(__(("Events"), true), array('controller'=> 'events', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'admin-panel fancybox.iframe')); ?>
			</li>
			<li>
	          <?php echo $this->Html->link(__(("Events Gallery"), true), array('controller'=> 'galleries', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'admin-panel fancybox.iframe')); ?>
			</li>
			<li>
	          <?php echo $this->Html->link(__(("News"), true), array('controller'=> 'news', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'admin-panel fancybox.iframe')); ?>
			</li>
			<li>
	          <?php $user = $this->Session->read('Auth.User'); ?>
	          <?php echo $this->Html->link(__(('Profile'), true), array('controller'=>'users', 'action'=>'view', $user['id'], 'admin'=> true), array('escape' => false, 'class'=>'admin-panel fancybox.iframe')); ?>
			</li>
	    </ul>

	    <!-- Right Nav Section -->
	    <ul class="right">
	      <li class="divider hide-for-small"></li>
		  	<li>
				<a href="#">
					<?php 
		                    $role = AppController::getRole($user['role_id']);
		                  	echo $user['name'].' | '.$role['Role']['name'];
		            ?></a>
			</li>
			<li class="divider hide-for-small"></li>
			<li>
				<?php echo $this->Html->link(__(("logout &rarr;"), true), array('controller'=> 'users', 'action'=>'logout', 'admin' => true), array('escape' => false)); ?>		
			</li>
	    </ul>
	  </section>
	</nav>
</div>
<?php } ?>