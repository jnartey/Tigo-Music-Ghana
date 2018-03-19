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
	?>
	
	<div class="content">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top-b wow pulse">
					<ul class="breadcrumbs">
					  <li class="current"><?php echo $this->Html->link(__(('up & coming artist'), true), array('controller'=> 'pages', 'action'=>'up_coming_artist'), array('escape' => false, 'class'=>'d-menu')); ?></li>
					</ul>
				</div>
			</div>
			<div class="large-12 columns">
				<?php
					echo '<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-5">';
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
								echo sprintf("%02s", $j);
								echo '</span>';
								echo '<a class="title d-menu" href="'.$this->Html->url(DS.'pages'.DS.'up-coming-artist'.DS.$upcoming_artist['Artist']['id'].DS.$clean, true).'">';
								echo strlen($upcoming_artist['Artist']['name']) >= 12 ? substr($upcoming_artist['Artist']['name'], 0, 12) . '...' : $upcoming_artist['Artist']['name'];
								echo '</a>';
								echo '</div></div>';
								echo '</li>';
								$j++;
							endforeach;
					echo '</ul>';
				?>
			</div>
		</div>
	</div>
	
	<div class="content">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top-b wow pulse">
					<ul class="breadcrumbs">
					  <li class="current"><?php echo $this->Html->link(__(('spotlight on artists'), true), array('controller'=> 'pages', 'action'=>'spotlight-on-artist'), array('escape' => false, 'class'=>'d-menu')); ?></li>
					</ul>
				</div>
			</div>
			<div class="large-12 columns">
				<?php
					echo '<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-5">';
							$j = 1;
							foreach($artists as $artist):
								$clean = clean($artist['Artist']['name']);
								echo '<li class="playlist-wrapper">';
								echo '<div class="playlist-wrapper-bg"><div class="playlist-l-item-d">';
								echo '<a class="d-menu" href="'.$this->Html->url(DS.'pages'.DS.'spotlight-on-artist'.DS.$artist['Artist']['id'].DS.$clean, true).'">';
								echo $this->html->image('artists'.DS.'thumb'.DS.'small'.DS.$artist['Artist']['cover_photo'], array('alt' => 'tigo music Ghana', 'class'=>''));
								echo '</a>';
								echo '</div>';
								echo '<div class="more-info">';
								echo '<span class="numbered">';
								echo sprintf("%02s", $j);
								echo '</span>';
								echo '<a class="title d-menu" href="'.$this->Html->url(DS.'pages'.DS.'spotlight-on-artist'.DS.$artist['Artist']['id'].DS.$clean, true).'">';
								echo strlen($artist['Artist']['name']) >= 12 ? substr($artist['Artist']['name'], 0, 12) . '...' : $artist['Artist']['name'];
								echo '</a>';
								echo '</div></div>';
								echo '</li>';
								$j++;
							endforeach;
					echo '</ul>';
				?>
			</div>
		</div>
	</div>
</div>