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
		
		if(!$event_data){ 
	?>
	<div class="content">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top-b wow pulse">
					<ul class="breadcrumbs">
					  <li><?php echo $this->Html->link(__(('events'), true), array('controller'=> 'pages', 'action'=>'events'), array('escape' => false, 'class'=>'d-menu')); ?></li>
					</ul>
				</div>
			</div>
			<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-6">
				<?php
					
					function clean($string) {
					   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
					   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

					   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
					}
				
					foreach($events as $event):
						$clean = clean($event['Event']['title']);
						echo '<li class="event-i">';
						$current_date = new DateTime(date("Y-m-d"));
						$future_date = new DateTime($event['Event']['event_date']);
						if($current_date < $future_date){
							echo '<span class="upcoming">upcoming event</span>';
						}elseif($current_date == $future_date){
							echo '<span class="upcoming">event today</span>';
						}else{
							echo '<span class="upcoming-p">past event</span>';
						}
						echo '<div class="event-list d-menu white-bg">';
						echo '<div class="event-image">';
						echo '<a class="d-menu" href="'.$this->Html->url(DS.'pages'.DS.'events'.DS.$event['Event']['id'].DS.$clean, true).'">'.$this->html->image('events'.DS.'thumb'.DS.'small'.DS.$event['Event']['event_image'], array('alt' => 'tigo music ghana', 'class'=>'left')).'</a>';
						echo '</div>';
						echo '<div class="event-text text-left">';
						echo '<h4><a class="d-menu" href="'.$this->Html->url(DS.'pages'.DS.'events'.DS.$event['Event']['id'].DS.$clean, true).'">';
						echo strlen($event['Event']['title']) >= 17 ? substr($event['Event']['title'], 0, 17) . '...' : $event['Event']['title'];
						echo '</a></h4>';
						echo '<span class="event-date">'.date('jS F, Y', strtotime($event['Event']['event_date'])).'</span>';
						$stripped_text = strip_tags($event['Event']['content']);
						echo '<p>';
						echo strlen($stripped_text) >= 75 ? substr($stripped_text, 0, 75) . '...' : $stripped_text;
						echo '</p>';
						echo $this->Html->link(__(('read more'), true), array('controller'=> 'pages', 'action'=>'events', $event['Event']['id'], $clean), array('escape' => false, 'class'=>'read-more d-menu'));
						echo '</div>';
						echo '</div></li>';
					endforeach;
				?>
			</ul>
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
						  <li class="current hide-for-small"><a href="#"><?php echo $event_data['Event']['title']; ?></a></li>
						  <li class="current show-for-small"><a href="#"><?php echo strlen($event_data['Event']['title']) >= 15 ? substr($event_data['Event']['title'], 0, 15) . '...' : $event_data['Event']['title']; ?></a></li>
						</ul>
					</div>
				</div>
				<div class="large-8 columns">
					<?php
						if($event_data){
							$current_date = new DateTime(date("Y-m-d"));
							$future_date = new DateTime($event_data['Event']['event_date']);
							if($current_date < $future_date){
								echo '<span class="upcoming-1 left">upcoming event</span>';
							}elseif($current_date == $future_date){
								echo '<span class="upcoming-1 left">event today</span>';
							}else{
								echo '<span class="upcoming-1-p left">past event</span>';
							}
						}
					?>
					<div class="large-12 columns news-content text-left">
					<?php
						if($event_data){
							function clean($string) {
							   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
							   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

							   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
							}
							
							$clean_d = clean($event_data['Event']['title']);
							echo '<div class="large-12 columns">'.$this->Html->link(__(('<span class="fa fa-long-arrow-left"></span> back'), true), array('controller'=> 'pages', 'action'=>'events'), array('escape' => false, 'class'=>'d-menu back left')).'</div>';
							echo '<h4 class="text-left">'.$event_data['Event']['title'].'</h4>';
							echo '<span class="tool-bar"><strong><span class="fa fa-clock-o"></span> <span class="text">'.date('jS F, Y', strtotime($event_data['Event']['event_date'])).'</span></strong></span>';
							if($gallery_check){
								echo '<div class="large-12 columns">'.$this->Html->link(__(('view event gallery'), true), array('controller'=> 'pages', 'action'=>'events-gallery', $event_data['Event']['id'], $clean_d), array('escape' => false, 'class'=>'d-menu link-button')).'</div>';
							}
							
							if($event_data['Event']['event_image']){
								echo $this->html->image('events'.DS.'thumb'.DS.'large'.DS.$event_data['Event']['event_image'], array('title' => 'tiGO music', 'class'=>'left img-rs'));
							}
							echo $event_data['Event']['content'];
						}else{
							echo '<p>No events available</p>';
						}
					?>
					</div>
				</div>
				<div class="large-4 columns feeds">
					<?php echo $this->element('twitter_feed'); ?>
				</div>
			</div>
		</div>
	<?php
		}
	?>
</div>