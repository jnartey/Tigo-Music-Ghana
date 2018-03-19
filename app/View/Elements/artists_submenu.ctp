<!--<div class="large-12 columns tab-menu-wrapper" data-magellan-expedition="fixed">
	<div class="row">
		<ul class="links">
		  <li><a href="#home"><span class="fa fa-angle-up"></span></a></li>
		  <li>
			<?php 
				$sub_active = null;
				if($current_page === "up & coming artist"){ 
					$sub_active ='active'; 
				}
				echo $this->Html->link(__(('up & coming artist'), true), array('controller'=> 'pages', 'action'=>'up_coming_artist'), array('escape' => false, 'class'=>'d-menu '.$sub_active)); 
				?>
		  </li>
		  <li>
			<?php 
				$sub_active = null;
				if($current_page === "spotlight on artist"){ 
					$sub_active ='active'; 
				}
				echo $this->Html->link(__(('spotlight on artist'), true), array('controller'=> 'pages', 'action'=>'spotlight_on_artist'), array('escape' => false, 'class'=>'d-menu '.$sub_active)); ?>
			</li>
		</ul>
	</div>
</div>-->