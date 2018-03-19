<!-- Head section -->
<div class="large-12 columns head-wrapper fixed">
<div class="large-12 columns head antialiased wow fadeIn animated" data-wow-duration="2s">
	<div class="row">
		<div class="show-unbreak"><div class="large-3 columns logo">
			<h1><?php echo $this->Html->image('logo.png', array('alt' => 'tigo music ghana', 'url' => array('controller'=>'pages', 'action'=>'index'))); ?></h1>
		</div></div>
		<div class="show-break"><div class="large-8 columns logo">
			<h1 class="m-l m-logo" data-wow-delay="2s"><?php echo $this->Html->image('logo.png', array('alt' => 'tigo music ghana', 'url' => array('controller'=>'pages', 'action'=>'index'))); ?></h1>
			<h1 class="d-logo"><div id="deezer-logo"></div></h1>
		</div></div>
		<div class="large-4 columns social text-center show-break">
			<ul class="icon-links">
				<ul class="icon-links">
	    			<li><a class="fa fa-search" href="#"></a></li>
					<li><a class="circle fa fa-facebook" href="https://www.facebook.com/tigogh" target="_blank"></a></li>
					<li><a class="circle fa fa-twitter" target="_blank" href="https://twitter.com/TigoGhana"></a></li>
					<li><a class="circle fa fa-youtube" target="_blank" href="https://www.youtube.com/channel/UCrlPmoT-coNFefT_Z-fAYyQ"></a></li>
	    		</ul>
    		</ul>
		</div>
		<div class="large-6 columns player">
			<div id="controls">
				<div id="controls_inner">
					<button class="ctn_btn btn_prev" id="previous" onclick="DZ.player.prev(); return false;"></button>
					<button class="ctn_btn btn_play" id="play" onclick="DZ.player.play(); return false;"></button>
					<button class="ctn_btn btn_pause" id="pause" onclick="DZ.player.pause(); return false;"></button>
					<button class="ctn_btn btn_next" id="next" onclick="DZ.player.next(); return false;"></button>
				</div>
			</div>

			<div id="playing">
				<div class="marquee">
					<div id="playing_meta">
						tiGO - Deezer Music Player
					</div>
				</div>
				
				<div id="times">
					<span id="time_current">0.00</span>&nbsp;/&nbsp;
					<span id="time_total">0.00</span>
				</div>
				<div id="deezer-volume">
					<button class="btn_repeat_i" id="repeat-i"></button>
					<button class="btn_repeat" id="repeat"></button>
					<button class="btn_repeat_one" id="repeat-one"></button>
					<input id="d-volume" type="text" data-slider="true" data-slider-theme="volume" value="50" data-slider-highlight="true" data-slider-range="0,100" data-slider-step="5">
					<button class="ctn_btn btn_sound" id="sound"></button>
					<button class="ctn_btn btn_sound_mute" id="mute"></button>
				</div>
				<div id="slider_seek" class="progressbarplay" style="">
				  <div class="bar" style="width: 0%;"></div>
				</div>
			</div>
			
			<div id="deezer-logo" class="show-unbreak"></div>
			
		</div>
		<div id="dz-root"></div>
		<div class="large-3 columns social-links show-unbreak">
			<ul class="icon-links">
    			<li>&nbsp;&nbsp;</li>
				<li><a class="circle fa fa-facebook" href="https://www.facebook.com/tigogh" target="_blank"></a></li>
				<li><a class="circle fa fa-twitter" target="_blank" href="https://twitter.com/TigoGhana"></a></li>
				<li><a class="circle fa fa-youtube" target="_blank" href="https://www.youtube.com/channel/UCrlPmoT-coNFefT_Z-fAYyQ"></a></li>
    		</ul>
		</div>
	</div>
</div>

<div class="large-12 columns main-menu antialiased">
	<nav class="top-bar" data-topbar role="navigation">
	  <ul class="title-area">
	    <li class="name">
	      <h1><a href="#"></a></h1>
	    </li>
	     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
	    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	  </ul>

	  <section class="top-bar-section text-center">
	    <!-- Right Nav Section -->
	    <ul>
		 	<li <?php if($title_for_layout === "home"){ echo "class='active home-target'"; }else{ echo "class='home-target'"; } ?>>
				<?php echo $this->Html->link(__(('<span class="fa fa-home"></span>'), true), array('controller'=> 'pages', 'action'=>'index'), array('escape' => false)); ?>
			</li>
			<li <?php if($title_for_layout === "music"){ echo "class='active'"; } ?>>
				<?php echo $this->Html->link(__(('music'), true), array('controller'=> 'pages', 'action'=>'music'), array('escape' => false, 'data-dropdown'=>'music-l', 'data-options'=>'is_hover:true')); ?>
				<ul id="music-l" class="f-dropdown large-12 columns text-left right" data-dropdown-content>
				  <li><?php echo $this->Html->link(__(('playlists'), true), array('controller'=> 'pages', 'action'=>'playlists'), array('escape' => false)); ?></li>
		          <li><?php echo $this->Html->link(__(('albums'), true), array('controller'=> 'pages', 'action'=>'albums'), array('escape' => false)); ?></li>
				  <li><?php echo $this->Html->link(__(('pre-releases'), true), array('controller'=> 'pages', 'action'=>'pre-releases'), array('escape' => false)); ?></li>
				  <li><?php echo $this->Html->link(__(('theme days'), true), array('controller'=> 'pages', 'action'=>'theme-days'), array('escape' => false)); ?></li>
		        </ul>
			</li>
		    <li <?php if($title_for_layout === "videos"){ echo "class='active'"; } ?>>
				<?php echo $this->Html->link(__(('videos'), true), array('controller'=> 'pages', 'action'=>'latest-videos'), array('escape' => false, 'data-dropdown'=>'videos-l', 'data-options'=>'is_hover:true')); ?>
				<ul id="videos-l" class="f-dropdown text-left" data-dropdown-content>
		          <li><?php echo $this->Html->link(__(('latest videos'), true), array('controller'=> 'pages', 'action'=>'latest-videos'), array('escape' => false)); ?></li>
				  <!--<li><?php echo $this->Html->link(__(('video reviews'), true), array('controller'=> 'pages', 'action'=>'video-reviews'), array('escape' => false)); ?></li>-->
		        </ul>
			</li>
			<li <?php if($title_for_layout === "artists"){ echo "class='active'"; } ?>>
				<?php echo $this->Html->link(__(('artists'), true), array('controller'=> 'pages', 'action'=>'artists'), array('escape' => false, 'data-dropdown'=>'artists-l', 'data-options'=>'is_hover:true')); ?>
				<ul id="artists-l" class="f-dropdown text-left" data-dropdown-content>
				  <li><?php echo $this->Html->link(__(('up & coming artist'), true), array('controller'=> 'pages', 'action'=>'up-coming-artist'), array('escape' => false)); ?></li>
		          <li><?php echo $this->Html->link(__(('spotlight on artists'), true), array('controller'=> 'pages', 'action'=>'spotlight-on-artist'), array('escape' => false)); ?></li>
		        </ul>
			</li>
			<li <?php if($title_for_layout === "events"){ echo "class='active'"; } ?>>
				<?php echo $this->Html->link(__(('events'), true), array('controller'=> 'pages', 'action'=>'events'), array('escape' => false)); ?>
			</li>
			<li <?php if($title_for_layout === "news"){ echo "class='active'"; } ?>>
				<?php echo $this->Html->link(__(('news'), true), array('controller'=> 'pages', 'action'=>'news'), array('escape' => false)); ?>
			</li>
			<!-- <li <?php if($title_for_layout === "unplugged"){ echo "class='active'"; } ?>>
				<?php echo $this->Html->link(__(('unplugged'), true), array('controller'=> 'pages', 'action'=>'unplugged'), array('escape' => false)); ?>

			</li> -->
			<li class="<?php if($title_for_layout === 'how to access deezer'){ echo 'active'; } ?>">
				<?php echo $this->Html->link(__(('how to access deezer'), true), array('controller'=> 'pages', 'action'=>'how-to-access-deezer'), array('escape' => false)); ?>
			</li>
	    </ul>
	  </section>
	</nav>
</div>
</div>