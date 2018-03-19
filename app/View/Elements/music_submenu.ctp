<!--<div class="large-12 columns tab-menu-wrapper" data-magellan-expedition="fixed">
	<div class="row">
		<ul class="links">
		  <li><a href="#home"><span class="fa fa-angle-up"></span></a></li>
		  <li>
			<?php 
				$sub_active = null;
				if($current_page === "playlists"){ 
					$sub_active ='active'; 
				}
				echo $this->Html->link(__(('playlists'), true), array('controller'=> 'pages', 'action'=>'playlists'), array('escape' => false, 'class'=>'d-menu '.$sub_active)); 
				?>
		  </li>
		  <li>
			<?php 
				$sub_active = null;
				if($current_page === "albums"){ 
					$sub_active ='active'; 
				}
				echo $this->Html->link(__(('albums'), true), array('controller'=> 'pages', 'action'=>'albums'), array('escape' => false, 'class'=>'d-menu '.$sub_active)); ?>
			</li>
		  <li>
			<?php 
				$sub_active = null;
				if($current_page === "pre-releases"){ 
					$sub_active ='active'; 
				}
				echo $this->Html->link(__(('pre-releases'), true), array('controller'=> 'pages', 'action'=>'pre_releases'), array('escape' => false, 'class'=>'d-menu '.$sub_active)); ?>
		  </li>
		  <li>
			<?php 
				$sub_active = null;
				if($current_page === "theme days"){ 
					$sub_active ='active'; 
				}
				echo $this->Html->link(__(('theme days'), true), array('controller'=> 'pages', 'action'=>'theme_days'), array('escape' => false, 'class'=>'d-menu '.$sub_active)); ?></li>
		</ul>
	</div>
</div>-->