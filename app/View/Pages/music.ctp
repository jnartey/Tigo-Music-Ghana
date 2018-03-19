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
		echo $this->element('music_submenu');
	?>
	
	<div class="content">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top  wow pulse">playlists</div>
			</div>
			<?php
				
				$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
				$isiPhone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPhone');
				
				echo '<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-5">';
						$j = 1;
						foreach($playlists as $playlist):
							$url = str_replace('www.', 'api.', $playlist['Music']['deezer_link']);
							$url = $playlist['Music']['deezer_link'];
							$content = file_get_contents($url);
							$json = json_decode($content, true);
							
							$s_link = str_replace('api.', 'www.', $url);
							
							echo '<li class="playlist-wrapper">';
							if($isiPad || $isiPhone){
								echo '<div class="playlist-wrapper-bg"><div class="playlist-l-item">';
								echo '<a href="'.$s_link.'">';
								echo '<img src="'.$json['picture'].'?size=big" alt="tigo music Ghana" />';
								echo '</a>';
								echo '</div>';
								echo '<div class="more-info">';
								echo '<span class="numbered">';
								echo sprintf("%02s", $j);
								echo '</span>';
								echo '<a class="title" href="'.$s_link.'">';
								echo strlen($json['title']) >= 12 ? substr($json['title'], 0, 12) . '...' : $json['title'];
								echo '</a>';
								echo '</div></div>';
							}else{
								echo '<div class="playlist-wrapper-bg"><div class="playlist-l-item">';
								echo '<a href="javascript:void(0);">';
								echo '<img src="'.$json['picture'].'?size=big" alt="tigo music Ghana" />';
								echo '</a>';
								echo '<div class="cap-overlay hide">';
								echo '<div class="flash-support">';
								if($mobile_detect){
									echo '<a play-type-t="alert" play-link="'.$s_link.'" href="javascript:void(0);" onclick="DZ.player.playPlaylist('.$json['id'].'); return false;" class="fa fa-play play"></a>';
								}else{
									echo '<a href="javascript:void(0);" onclick="DZ.player.playPlaylist('.$json['id'].'); return false;" class="fa fa-play play"></a>';
								}

								echo '<a href="javascript:void(0);" onclick="DZ.player.pause(); return false;" href="#" class="fa fa-pause pause"></a>';
								echo '</div>';
								echo '<div class="no-flash">';
								echo '<a play-type-t="alert" play-link="'.$s_link.'" href="javascript:void(0);" onclick="DZ.player.playPlaylist('.$json['id'].'); return false;" class="fa fa-play play"></a>';
								echo '<a href="javascript:void(0);" onclick="DZ.player.pause(); return false;" href="#" class="fa fa-pause pause"></a>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
								echo '<div class="more-info">';
								echo '<span class="numbered">';
								echo sprintf("%02s", $j);
								echo '</span>';
								echo '<a class="title d-menu" href="'.$this->Html->url(DS.'pages'.DS.'playlists'.DS.$playlist['Music']['id'].DS.str_replace(' ', '-', $playlist['Music']['name']), true).'">';
								echo strlen($json['title']) >= 12 ? substr($json['title'], 0, 12) . '...' : $json['title'];
								echo '</a>';
								echo '</div></div>';
							}
							echo '</li>';
							$j++;
						endforeach;
				echo '</ul>';
				echo $this->Html->link(__(('more playlists'), true), array('controller'=> 'pages', 'action'=>'playlists'), array('escape' => false, 'class'=>'read-more d-menu left'));
			?>
		</div>
	</div>
	
	<div class="content">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top  wow pulse">albums</div>
			</div>
			<?php
				echo '<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-5">';
						$j = 1;
						foreach($albums as $album):
							$url = str_replace('www.', 'api.', $playlist['Music']['deezer_link']);
							$url = $album['Music']['deezer_link'];
							$content = file_get_contents($url);
							$json = json_decode($content, true);
							
							$s_link = str_replace('api.', 'www.', $url);
							
							echo '<li class="playlist-wrapper">';
							if($isiPad || $isiPhone){
								echo '<div class="playlist-wrapper-bg"><div class="playlist-l-item">';
								echo '<a href="'.$s_link.'">';
								echo '<img src="'.$json['cover'].'?size=big" alt="tigo music Ghana" />';
								echo '</a>';
								echo '</div>';
								echo '<div class="more-info">';
								echo '<span class="numbered">';
								echo sprintf("%02s", $j);
								echo '</span>';
								echo '<a class="title" href="'.$s_link.'">';
								echo strlen($json['title']) >= 12 ? substr($json['title'], 0, 12) . '...' : $json['title'];
								echo '</a>';
								echo '</div></div>';
							}else{
								echo '<div class="playlist-wrapper-bg"><div class="playlist-l-item">';
								echo '<a href="javascript:void(0);">';
								echo '<img src="'.$json['cover'].'?size=big" alt="tigo music Ghana" />';
								echo '</a>';
								echo '<div class="cap-overlay hide">';
								echo '<div class="flash-support">';
								if($mobile_detect){
									echo '<a play-type-t="alert" play-link="'.$s_link.'" href="javascript:void(0);" onclick="DZ.player.playAlbum('.$json['id'].'); return false;" class="fa fa-play play"></a>';
								}else{
									echo '<a href="javascript:void(0);" onclick="DZ.player.playAlbum('.$json['id'].'); return false;" class="fa fa-play play"></a>';
								}

								echo '<a href="javascript:void(0);" onclick="DZ.player.pause(); return false;" class="fa fa-pause pause"></a>';
								echo '</div>';
								echo '<div class="no-flash">';
								echo '<a play-type-t="alert" play-link="'.$s_link.'" href="javascript:void(0);" onclick="DZ.player.playAlbum('.$json['id'].'); return false;" class="fa fa-play play"></a>';
								echo '<a href="javascript:void(0);" onclick="DZ.player.pause(); return false;" class="fa fa-pause pause"></a>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
								echo '<div class="more-info">';
								echo '<span class="numbered">';
								echo sprintf("%02s", $j);
								echo '</span>';
								echo '<a class="title d-menu" href="'.$this->Html->url(DS.'pages'.DS.'albums'.DS.$album['Music']['id'].DS.str_replace(' ', '-', $album['Music']['name']), true).'">';
								echo strlen($json['title']) >= 12 ? substr($json['title'], 0, 12) . '...' : $json['title'];
								echo '</a>';
								echo '</div></div>';
							}
							echo '</li>';
							$j++;
						endforeach;
				echo '</ul>';
		 		
				echo $this->Html->link(__(('more albums'), true), array('controller'=> 'pages', 'action'=>'albums'), array('escape' => false, 'class'=>'read-more d-menu left')); ?>
		</div>
	</div>
	
	<div class="content">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top  wow pulse">pre-releases</div>
			</div>
			<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-5 artists-cover">
				<?php
					$j = 1;
					foreach($pre_releases as $pre_release):
						$url = str_replace('www.', 'api.', $pre_release['Music']['deezer_link']);
						$content = file_get_contents($url);
						$json = json_decode($content, true);

						//pr($json);
						
						$s_link = str_replace('api.', 'www.', $url);

						echo '<li class="playlist-wrapper">';
						if($isiPad || $isiPhone){
							echo '<div class="playlist-wrapper-bg"><div class="playlist-l-item">';
							echo '<a href="'.$s_link.'">';
							if($pre_release['Music']['item_type'] == 1){
								echo '<img src="'.$json['album']['cover'].'?size=big" alt="tigo music Ghana" />';
							}elseif($pre_release['Music']['item_type'] == 2){
								echo '<img src="'.$json['cover'].'?size=big" alt="tigo music Ghana" />';
							}
							echo '</a>';
							echo '</div>';
							echo '<div class="more-info">';
							echo '<span class="numbered">';
							echo sprintf("%02s", $j);
							echo '</span>';
							echo '<a class="title" href="'.$s_link.'">';
							echo strlen($json['title']) >= 12 ? substr($json['title'], 0, 12) . '...' : $json['title'];
							echo '</a>';
							echo '</div></div>';
						}else{
							echo '<div class="playlist-wrapper-bg"><div class="playlist-l-item">';
							echo '<a href="javascript:void(0);">';
							if($pre_release['Music']['item_type'] == 1){
								echo '<img src="'.$json['album']['cover'].'?size=big" alt="tigo music Ghana" />';
							}elseif($pre_release['Music']['item_type'] == 2){
								echo '<img src="'.$json['cover'].'?size=big" alt="tigo music Ghana" />';
							}
							echo '</a>';
							echo '<div class="cap-overlay hide">';
							echo '<div class="flash-support">';
							if($mobile_detect){
								if($pre_release['Music']['item_type'] == 1){
									echo '<a play-type-t="alert" play-link="'.$s_link.'" href="javascript:void(0);" onclick="DZ.player.playTracks(['.$json['id'].']); return false;" class="fa fa-play play"></a>';
								}elseif($pre_release['Music']['item_type'] == 2){
									echo '<a play-type-t="alert" play-link="'.$s_link.'" href="javascript:void(0);" onclick="DZ.player.playAlbum('.$json['id'].'); return false;" class="fa fa-play play"></a>';
								}
								echo '<a href="javascript:void(0);" onclick="DZ.player.pause(); return false;" href="#" class="fa fa-pause pause"></a>';
							}else{
								if($pre_release['Music']['item_type'] == 1){
									echo '<a href="javascript:void(0);" onclick="DZ.player.playTracks(['.$json['id'].']); return false;" class="fa fa-play play"></a>';
								}elseif($pre_release['Music']['item_type'] == 2){
									echo '<a href="javascript:void(0);" onclick="DZ.player.playAlbum('.$json['id'].'); return false;" class="fa fa-play play"></a>';
								}
								echo '<a href="javascript:void(0);" onclick="DZ.player.pause(); return false;" href="#" class="fa fa-pause pause"></a>';
								if($pre_release['Music']['item_type'] == 1){
									echo '<a href="#" class="fa fa-link info d-menu"></a>';
								}elseif($pre_release['Music']['item_type'] == 2){
									echo '<a href="'.$this->Html->url(DS.'pages'.DS.'pre-releases'.DS.$pre_release['Music']['id'].DS.str_replace(' ', '-', $pre_release['Music']['name']), true).'" class="fa fa-link info d-menu"></a>';
								}
							}
							echo '</div>';
							echo '<div class="no-flash">';
							if($pre_release['Music']['item_type'] == 1){
								echo '<a play-type-t="alert" play-link="'.$s_link.'" href="javascript:void(0);" onclick="DZ.player.playTracks(['.$json['id'].']); return false;" class="fa fa-play play"></a>';
							}elseif($pre_release['Music']['item_type'] == 2){
								echo '<a play-type-t="alert" play-link="'.$s_link.'" href="javascript:void(0);" onclick="DZ.player.playAlbum('.$json['id'].'); return false;" class="fa fa-play play"></a>';
							}
							echo '<a  href="#" onclick="DZ.player.pause(); return false;" href="#" class="fa fa-pause pause"></a>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
							echo '<div class="more-info">';
							echo '<span class="numbered">';
							echo sprintf("%02s", $j);
							echo '</span>';
							if($pre_release['Music']['item_type'] == 1){
								echo '<a class="title" href="javascript:void(0);" onclick="DZ.player.playTracks(['.$json['id'].']); return false;">';
							}elseif($pre_release['Music']['item_type'] == 2){
								echo '<a class="title d-menu" href="'.$this->Html->url(DS.'pages'.DS.'pre-releases'.DS.$pre_release['Music']['id'].DS.str_replace(' ', '-', $pre_release['Music']['name']), true).'">';
							}

							echo strlen($json['title']) >= 12 ? substr($json['title'], 0, 12) . '...' : $json['title'];
							echo '</a>';
							echo '</div></div>';
						}
						echo '</li>';
						$j++;
					endforeach;
				?>
			</ul>
		</div>
	</div>
	
	<!--<div class="content">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top  wow pulse">theme days</div>
			</div>
			<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-5 artists-cover">
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
		</div>
	</div>-->
</div>