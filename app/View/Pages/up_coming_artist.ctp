<?php echo $this->element('deezer_notification'); ?>
<div class="large-12 columns banner-i antialiased wow fadeIn">
	<?php
		$i=1;
		foreach($banners as $banner):
			if($i == 1){
				echo '<div class="banner-cover">';
				echo $this->html->image('banners'.DS.'thumb'.DS.'large'.DS.$banner['Banner']['banner_image'], array('alt' => 'tigo music Ghana', 'class'=>'left'));
				echo '</div>';
			}
			$i++;
		endforeach;
	?>
</div>
<div class="large-12 columns main-content antialiased">
	<?php
		echo $this->element('artists_submenu');
		
		if(!$upcoming_artist){
	?>
	
	<div class="content">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top-b wow pulse">
					<ul class="breadcrumbs">
					  <li class="current"><a href="#">Up & coming artists</a></li>
					</ul>
				</div>
			</div>
			<div class="large-12 columns">
				<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-5">
					<?php
						$j = 1;
						
						function clean($string) {
						   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
						   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

						   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
						}
						
						foreach($upcoming_artists as $upcoming_artist):
							$clean = clean($upcoming_artist['Artist']['name']);
							echo '<li class="playlist-wrapper">';
							echo '<div class="playlist-wrapper-bg"><div class="playlist-l-item-d">';
							echo '<a class="d-menu" href="'.$this->Html->url(DS.'pages'.DS.'up-coming-artist'.DS.$upcoming_artist['Artist']['id'].DS.$clean, true).'">';
							echo $this->html->image('artists'.DS.'thumb'.DS.'small'.DS.$upcoming_artist['Artist']['cover_photo'], array('alt' => 'tigo music Ghana', 'class'=>''));
							echo '</a>';
							echo '</div>';
							echo '<div class="more-info">';
							echo '<span class="numbered">';
							echo '<span class="fa fa-music"></span>';
							echo '</span>';
							echo '<a class="title d-menu" href="'.$this->Html->url(DS.'pages'.DS.'up-coming-artist'.DS.$upcoming_artist['Artist']['id'].DS.$clean, true).'">';
							echo strlen($upcoming_artist['Artist']['name']) >= 12 ? substr($upcoming_artist['Artist']['name'], 0, 12) . '...' : $upcoming_artist['Artist']['name'];
							echo '</a>';
							echo '</div></div>';
							echo '</li>';
							$j++;
						endforeach;
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
	</div>
	<?php
		}else{
	?>
		<div class="content">
			<div class="row padded-content">
				<div class="large-12 columns title-bar">
					<div class="callout-i top-b wow pulse">
						<ul class="breadcrumbs">
						  <li><?php echo $this->Html->link(__(('Artists'), true), array('controller'=> 'pages', 'action'=>'artists'), array('escape' => false, 'class'=>'d-menu')); ?></li>
						  <li><?php echo $this->Html->link(__(('up & coming artist'), true), array('controller'=> 'pages', 'action'=>'up-coming-artist'), array('escape' => false, 'class'=>'d-menu')); ?></li>
						  <li class="current hide-for-small"><a href="#"><?php echo $upcoming_artist['Artist']['name']; ?></a></li>
						  <li class="current show-for-small"><a href="#"><?php echo strlen($upcoming_artist['Artist']['name']) >= 15 ? substr($upcoming_artist['Artist']['name'], 0, 15) . '...' : $upcoming_artist['Artist']['name']; ?></a></li>
						</ul>
					</div>
				</div>
				<div class="large-8 columns">
					<div class="large-12 columns upcoming-artist-home">
						<div class="artist-cover">
							<div class="artist-img" style="background:url(<?php echo $this->Html->url(DS.'img'.DS.'artists'.DS.'thumb'.DS.'small'.DS.$upcoming_artist['Artist']['cover_photo'], true) ?>) top left no-repeat; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->Html->url(DS.'img'.DS.'artists'.DS.'thumb'.DS.'small'.DS.$upcoming_artist['Artist']['cover_photo'], true) ?>', sizingMethod='scale');
								    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->Html->url(DS.'img'.DS.'artists'.DS.'thumb'.DS.'small'.DS.$upcoming_artist['Artist']['cover_photo'], true) ?>', sizingMethod='scale')"; zoom:1;">
							</div>
						</div>
						<div class="artist-info">
							<?php
								echo '<h2>'.$upcoming_artist['Artist']['name'].'</h2>';
								echo $upcoming_artist['Artist']['content'];
							?>
						</div>
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