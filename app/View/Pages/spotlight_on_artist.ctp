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
		
		if(!$artist){
	?>
	
	<div class="content">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top-b wow pulse">
					<ul class="breadcrumbs">
					  <li class="current"><a href="#">spotlight on artist</a></li>
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
						
						foreach($artists as $s_artist):
							$clean = clean($s_artist['Artist']['name']);
							echo '<li class="playlist-wrapper">';
							echo '<div class="playlist-wrapper-bg"><div class="playlist-l-item-d">';
							echo '<a class="d-menu" href="'.$this->Html->url(DS.'pages'.DS.'spotlight-on-artist'.DS.$s_artist['Artist']['id'].DS.$clean, true).'">';
							echo $this->html->image('artists'.DS.'thumb'.DS.'small'.DS.$s_artist['Artist']['cover_photo'], array('alt' => 'tigo music', 'class'=>''));
							echo '</a>';
							echo '</div>';
							echo '<div class="more-info">';
							echo '<span class="numbered">';
							echo '<span class="fa fa-lightbulb-o"></span>';
							echo '</span>';
							echo '<a class="title d-menu" href="'.$this->Html->url(DS.'pages'.DS.'spotlight-on-artist'.DS.$s_artist['Artist']['id'].DS.$clean, true).'">';
							echo strlen($s_artist['Artist']['name']) >= 12 ? substr($s_artist['Artist']['name'], 0, 12) . '...' : $s_artist['Artist']['name'];
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
		<?php if($artist){ ?>
		<div class="content">
			<div class="row padded-content">
				<div class="large-12 columns title-bar">
					<div class="callout-i top-b wow pulse">
						<ul class="breadcrumbs">
						  <li><?php echo $this->Html->link(__(('Artists'), true), array('controller'=> 'pages', 'action'=>'artists'), array('escape' => false, 'class'=>'d-menu')); ?></li>
						  <li><?php echo $this->Html->link(__(('spotlight on artist'), true), array('controller'=> 'pages', 'action'=>'spotlight-on-artist'), array('escape' => false, 'class'=>'d-menu')); ?></li>
						  <li class="current hide-for-small"><a href="#"><?php echo $artist['Artist']['name']; ?></a></li>
						  <li class="current show-for-small"><a href="#"><?php echo strlen($artist['Artist']['name']) >= 15 ? substr($artist['Artist']['name'], 0, 15) . '...' : $artist['Artist']['name']; ?></a></li>
						</ul>
					</div>
				</div>
				<div class="large-8 columns">
					<div class="large-12 columns upcoming-artist-home">
						<div class="artist-cover">
							<div class="artist-img" style="background:url(<?php echo $this->Html->url(DS.'img'.DS.'artists'.DS.'thumb'.DS.'small'.DS.$artist['Artist']['cover_photo'], true) ?>) top left no-repeat; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->Html->url(DS.'img'.DS.'artists'.DS.'thumb'.DS.'small'.DS.$artist['Artist']['cover_photo'], true) ?>', sizingMethod='scale');
								    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->Html->url(DS.'img'.DS.'artists'.DS.'thumb'.DS.'small'.DS.$artist['Artist']['cover_photo'], true) ?>', sizingMethod='scale')"; zoom:1;">
							</div>
						</div>
						<div class="artist-info">
							<?php
								echo '<h2>'.$artist['Artist']['name'].'</h2>';
								echo $artist['Artist']['content'];
							?>
						</div>
					</div>
					
				</div>
				<div class="large-4 columns feeds">
					<?php echo $this->element('twitter_feed'); ?>
				</div>
			</div>
		</div>
		<?php }else{ ?>
		<div class="content">
			<div class="row padded-content">
				<p>No content available</p>
			</div>
		</div>
		<?php
			}
		?>
		
	<?php
		}
	?>
</div>