<?php echo $this->element('deezer_notification'); ?>
<div class="large-12 columns banner-i antialiased wow fadeIn">
	<?php
		$i=1;
		foreach($banners as $banner):
			if($i == 1){
				echo '<div class="banner-cover">';
				echo $this->html->image('banners'.DS.'thumb'.DS.'large'.DS.$banner['Banner']['banner_image'], array('alt' => 'tigo music', 'class'=>'left'));
				echo '</div>';
			}
			$i++;
		endforeach;
	?>
</div>
<div class="large-12 columns main-content antialiased">
	<?php
		echo $this->element('generic_submenu');
		
		if(!$gallery){ 
	?>
	<div class="content">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top-b wow pulse">
					<ul class="breadcrumbs">
					  <li><?php echo $this->Html->link(__(('events'), true), array('controller'=> 'pages', 'action'=>'events'), array('escape' => false, 'class'=>'d-menu')); ?></li>
					  <li class="current"><a href="#">Events Gallery</a></li>
					</ul>
				</div>
			</div>
			<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-6 gallery">
				<?php
					
					function clean($string) {
					   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
					   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

					   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
					}
					
					if($galleries){
						foreach($galleries as $gallery):
							$clean = clean($gallery['Gallery']['name']);
							$default = AppController::getFirstChildImage('Image', 'gallery_id', $gallery['Gallery']['id']);
							if($default){
								echo '<li><a href="'.$this->Html->url(DS.'pages'.DS.'events-gallery'.DS.$gallery['Gallery']['link_id'].DS.$clean, true).'">';
								echo $this->html->image('photogallery'.DS.'thumb'.DS.'small'.DS.$default['Image']['img_file'], array('alt' => 'tigo music ghana', 'class'=>'left'));
								if($gallery['Gallery']['name']){
									echo '<span class="gallery-title">';
									echo strlen($gallery['Gallery']['name']) >= 23 ? substr($gallery['Gallery']['name'], 0, 23) . '...' : $gallery['Gallery']['name'];
									echo '</span>';
								}	
							}
							echo '</a></li>';
						endforeach;
					}
				?>
			</ul>
			<div class="large-12 columns">
				<div class="pagination right">
				<?php
				 	echo '<span class="unavailable"></span>'.$this->Paginator->prev(__('prev', true), array('class'=>'d-menu'), null, array('class'=>'unavailable'));
					echo $this->Paginator->numbers(array('class'=>'d-menu'));
					echo $this->Paginator->next(__('next', true), array('class'=>'d-menu'), null, array('class'=>'unavailable')).'<span class="unavailable"></span>';
				?>
				</div>
			</div>
		</div>
	</div>
	<?php
		}else{
	?>
		<div class="content">
			<div class="row padded-content">
				<div class="large-12 columns title-bar">
					<div class="callout-i top-b wow pulse">
						<ul class="breadcrumbs">
						  <li><?php echo $this->Html->link(__(('events'), true), array('controller'=> 'pages', 'action'=>'events'), array('escape' => false, 'class'=>'d-menu')); ?></li>
						  <li><?php echo $this->Html->link(__(('events gallery'), true), array('controller'=> 'pages', 'action'=>'events-gallery'), array('escape' => false, 'class'=>'d-menu')); ?></li>
						  <li class="current hide-for-small"><a href="#"><?php echo $gallery['Gallery']['name']; ?></a></li>
						  <li class="current show-for-small"><a href="#"><?php echo strlen($gallery['Gallery']['name']) >= 15 ? substr($gallery['Gallery']['name'], 0, 15) . '...' : $gallery['Gallery']['name']; ?></a></li>
						</ul>
					</div>
				</div>
				<div class="large-12 columns">
					<?php
						function clean($string) {
						   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
						   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

						   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
						}
						
						$clean = clean($event['Event']['title']);
						
						echo $this->Html->link(__(('<span class="fa fa-long-arrow-left"></span> back to event'), true), array('controller'=> 'pages', 'action'=>'events', $event['Event']['id'], $clean), array('escape' => false, 'class'=>'d-menu back left'));
					?>
					<div class="large-12 columns gallery-content text-left">
					<?php
						if($gallery){
							echo '<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-6 gallery">';
							foreach($images as $image):
								$image_clean = clean($gallery['Gallery']['name']);
								echo '<li><a href='.$this->Html->url(DS.'img'.DS.'photogallery'.DS.'thumb'.DS.'large'.DS.$image['Image']['img_file'], true).' class="image-thumbs" rel="'.$image_clean.'">';
								echo $this->html->image('photogallery'.DS.'thumb'.DS.'small'.DS.$image['Image']['img_file'], array('alt' => 'tigo music ghana', 'class'=>'left'));
								if($image['Image']['name']){
									echo '<span class="gallery-title">';
									echo strlen($image['Image']['name']) >= 23 ? substr($image['Image']['name'], 0, 23) . '...' : $image['Image']['name'];
									echo '</span>';
								}
								echo '</a></li>';
							endforeach;
							echo '</ul>';
						}else{
							echo '<p>No images available</p>';
						}
					?>
					</div>
					<div class="large-12 columns">
						<div class="pagination right">
						<?php
						 	echo '<span class="unavailable"></span>'.$this->Paginator->prev(__('prev', true), array('class'=>'d-menu'), null, array('class'=>'unavailable'));
							echo $this->Paginator->numbers(array('class'=>'d-menu'));
							echo $this->Paginator->next(__('next', true), array('class'=>'d-menu'), null, array('class'=>'unavailable')).'<span class="unavailable"></span>';
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
		}
	?>
</div>