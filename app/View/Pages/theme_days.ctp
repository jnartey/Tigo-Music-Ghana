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
		
		if(!$theme_day){
	?>
	
	<div class="content">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top-b wow pulse">
					<ul class="breadcrumbs">
					  <li class="current"><a href="#">theme days</a></li>
					</ul>
				</div>
			</div>
			<div class="large-12 columns">
				<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-5">
					<?php
						if($theme_days){
							$j = 1;

							function clean($string) {
							   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
							   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

							   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
							}

							foreach($theme_days as $theme_day):
								$clean = clean($theme_day['Music']['name']);
								echo '<li class="playlist-wrapper">';
								echo '<div class="playlist-wrapper-bg"><div class="playlist-l-item-d">';
								echo '<a class="d-menu" href="'.$this->Html->url(DS.'pages'.DS.'theme-days'.DS.$theme_day['Music']['id'].DS.$clean, true).'">';
								echo $this->html->image('music'.DS.'thumb'.DS.'small'.DS.$theme_day['Music']['cover'], array('alt' => 'tigo music Ghana', 'class'=>''));
								echo '</a>';
								echo '</div>';
								echo '<div class="more-info">';
								echo '<span class="numbered">';
								echo '<span class="fa fa-lightbulb-o"></span>';
								echo '</span>';
								echo '<a class="title d-menu" href="'.$this->Html->url(DS.'pages'.DS.'theme-days'.DS.$theme_day['Music']['id'].DS.$clean, true).'">';
								echo strlen($theme_day['Music']['name']) >= 12 ? substr($theme_day['Music']['name'], 0, 12) . '...' : $theme_day['Music']['name'];
								echo '</a>';
								echo '</div></div>';
								echo '</li>';
								$j++;
							endforeach;
						}else{
							echo '<p>No theme days</p>';
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
	</div>
	<?php
		}else{
	?>
		<?php if($theme_day){ ?>
			<div class="content">
				<div class="row padded-content">
					<div class="large-12 columns title-bar">
						<div class="callout-i top-b wow pulse">
							<ul class="breadcrumbs">
							  <li><?php echo $this->Html->link(__(('theme days'), true), array('controller'=> 'pages', 'action'=>'theme-days'), array('escape' => false, 'class'=>'d-menu')); ?></li>
							  <li class="current hide-for-small"><a href="#"><?php echo $theme_day['Music']['name']; ?></a></li>
							  <li class="current show-for-small"><a href="#"><?php echo strlen($theme_day['Music']['name']) >= 15 ? substr($theme_day['Artist']['name'], 0, 15) . '...' : $theme_day['Artist']['name']; ?></a></li>
							</ul>
						</div>
					</div>
					<div class="large-8 columns news-content left">
						<div class="large-12 columns">
						<?php
							if($theme_day){
								echo '<h4 class="text-left">'.$theme_day['Music']['name'].'</h4>';
								if($theme_day['Music']['cover']){
									echo $this->html->image('music'.DS.'thumb'.DS.'large'.DS.$theme_day['Music']['cover'], array('alt' => 'tigo music Ghana', 'class'=>'left'));
								}
								echo $theme_day['Music']['text'];
							}else{
								echo '<p>No news available</p>';
							}
						?>
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