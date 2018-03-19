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
	?>
	
	<div class="content vid-wrap">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top-b wow pulse">
					<ul class="breadcrumbs">
					  <li><?php echo $this->Html->link(__(('videos'), true), array('controller'=> 'pages', 'action'=>'videos'), array('escape' => false, 'class'=>'d-menu')); ?></li>
					</ul>
				</div>
			</div>
			<?php
				if($videos){
					echo '<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-5">';
							$j = 1;
							foreach($videos as $video):
								echo '<li class="video-wrapper">';
								echo '<div class="video-wrapper-bg"><div class="video-l-item-e">';
								
								if($video['Video']['youtube']){
									$link = $video['Video']['youtube_link'];
									$video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
									if(empty($video_id[1]))
									    $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

									$video_id = explode("&", $video_id[1]); // Deleting any other params
									$video_id = $video_id[0];
									
									echo '<a class="fancy_video" rel="videos" data-fancybox-group="videos" href="'.$video['Video']['youtube_link'].'" data-width="600" data-height="370" data-poster="http://i1.ytimg.com/vi/'.$video_id.'/hqdefault.jpg" data-caption="'.$video['Video']['name'].'" title="'.$video['Video']['name'].'" data-youtube="on">';
								}else{
									echo '<a class="fancy_video" rel="videos" data-fancybox-group="videos" href="'.$this->Html->url(DS.'files'.DS.'videos'.DS.$video['Video']['video_mp4'], true).'" data-width="600" data-height="370" data-poster="'.$this->Html->url(DS.'img'.DS.'videos'.DS.'thumb'.DS.'large'.DS.$video['Video']['video_poster'], true).'" data-caption="'.$video['Video']['name'].'" title="'.$video['Video']['name'].'">';
								}
								
								if($video['Video']['youtube']){
									
									echo '<img src="http://i1.ytimg.com/vi/'.$video_id.'/mqdefault.jpg" yt:name="mqdefault" alt="tigo music" />';
									
								}else{
									echo $this->html->image('videos'.DS.'thumb'.DS.'small'.DS.$video['Video']['video_poster'], array('alt' => 'tigo music', 'class'=>''));
								}
								
								echo '<span class="playbutton"></span>';
								echo '</a>';
								echo '</div>';
								echo '<div class="more-info">';
								echo '<span class="numbered">';
								echo sprintf("%02s", $j);
								echo '</span>';
								if($video['Video']['youtube']){
									echo '<a class="title fancy_video" rel="videos" data-fancybox-group="videosl" href="'.$video['Video']['youtube_link'].'" data-width="600" data-height="370" data-poster="http://i1.ytimg.com/vi/'.$video_id.'/hqdefault.jpg" data-caption="'.$video['Video']['name'].'" title="'.$video['Video']['name'].'" data-youtube="on">';
								}else{
									echo '<a class="title fancy_video" rel="videos" data-fancybox-group="videosl" href="'.$this->Html->url(DS.'files'.DS.'videos'.DS.$video['Video']['video_mp4'], true).'" data-width="600" data-height="370" data-poster="'.$this->Html->url(DS.'img'.DS.'videos'.DS.'thumb'.DS.'large'.DS.$video['Video']['video_poster'], true).'" data-caption="'.$video['Video']['name'].'" title="'.$video['Video']['name'].'">';
								}
								
								echo strlen($video['Video']['name']) >= 16 ? substr($video['Video']['name'], 0, 16) . '...' : $video['Video']['name'];
								echo '</a>';
								echo '</div></div>';
								echo '</li>';
								$j++;
							endforeach;
					echo '</ul>';
					echo '<div class="large-12 columns text-right">'.$this->Html->link(__(('more videos'), true), array('controller'=> 'pages', 'action'=>'latest_videos'), array('escape' => false, 'class'=>'read-more d-menu')).'</div>';
				}else{
					echo '<p>No videos available</p>';
				}
			?>
		</div>
	</div>
</div>