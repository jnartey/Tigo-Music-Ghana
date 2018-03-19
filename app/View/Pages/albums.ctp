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
		
		if(!$fetch_data){
	?>
	
	<div class="content">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top-b wow pulse">
					<ul class="breadcrumbs">
					  <li><?php echo $this->Html->link(__(('music'), true), array('controller'=> 'pages', 'action'=>'music'), array('escape' => false, 'class'=>'d-menu')); ?></li>
					  <li class="current"><a href="#">albums</a></li>
					</ul>
				</div>
			</div>
			<?php
				
				$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
				$isiPhone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPhone');
				
				echo '<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-5">';
						$j = 1;
						foreach($albums as $album):
							$url = $album['Music']['deezer_link'];
							$content = file_get_contents($url);
							$json = json_decode($content, true);
							
							//pr($json);
							
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
			?>
		</div>
	</div>
	<?php
		}else{
			
			$url = $fetch_data['Music']['deezer_link'];
			$content = file_get_contents($url);
			$json = json_decode($content, true);
	?>
		<div class="content">
			<div class="row padded-content">
				<div class="large-12 columns title-bar">
					<div class="callout-i top-b wow pulse">
						<ul class="breadcrumbs">
						  <li><?php echo $this->Html->link(__(('music'), true), array('controller'=> 'pages', 'action'=>'music'), array('escape' => false, 'class'=>'d-menu')); ?></li>
						  <li><?php echo $this->Html->link(__(('albums'), true), array('controller'=> 'pages', 'action'=>'albums'), array('escape' => false, 'class'=>'d-menu')); ?></li>
						  <li class="current"><a href="#"><?php echo $json['title']; ?></a></li>
						</ul>
					</div>
				</div>
				<div class="large-8 columns">
				<div class="large-12 columns playlist-head">
				<?php
					echo '<div class="playlist-photo playlist-l-item">';
					echo '<a href="#">';
					echo '<img src="'.$json['cover'].'?size=big" alt="tigo music Ghana" />';
					echo '</a>';
					echo '<div class="cap-overlay hide">';
					echo '<a href="javascript:void(0);" onclick="DZ.player.playAlbum('.$json['id'].'); return false;" class="fa fa-play play"></a>';
					echo '</div>';
					echo '</div>';
					echo '<div class="playlist-info">';
					echo '<h4>'.$json['title'].'</h4>';
					echo '<a href="#" target="_blank" class="created"><strong>Artist</strong> '.$json['artist']['name'].'</a>';
					echo '<span class="duration"><strong>Genre: </strong>'.$json['genres']['data'][0]['name'].'</span>';
					echo '<span class="duration"><strong>Label: </strong>'.$json['label'].'</span>';
					echo '<span class="duration"><strong>Fans: </strong>'.$json['fans'].'</span>';
					echo '<span class="duration"><strong>Release Date: </strong>'.$json['release_date'].'</span>';
					echo '<span class="duration"><strong>Duration: </strong>'.gmdate('H:i:s', $json['duration']).'</span>';
					echo '<span class="num-tracks"><strong>Tracks: </strong>'.count($json['tracks']['data']).'</span>';
					echo '</div>';
				?>
				</div>
				<div class="large-12 columns playlist-body">
					<table id="dy-table" class="hover" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Track</th>
								<th>Artist</th>
								<th>Album</th>
								<th>Duration</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
								$k = 1;
								$tracklists = array();
								
								foreach($json['tracks']['data'] as $track):
									$tracklists[] = $track['id'];
								endforeach;
								
								$comma_separated_ids = implode(",", $tracklists);
								
								foreach($json['tracks']['data'] as $key => $track):
									echo '<tr>';
									echo '<td><a href="javascript:void(0);" onclick="DZ.player.playTracks(['.$comma_separated_ids.'], '.$key.'); return false;" href="#play-'.$track['id'].'">'.$track['title'].'</a></td>';
									echo '<td><a href="javascript:void(0);" onclick="DZ.player.playTracks(['.$comma_separated_ids.'], '.$key.'); return false;" href="#play-'.$track['id'].'">'.$track['artist']['name'].'</a></td>';
									echo '<td><a href="javascript:void(0);" onclick="DZ.player.playTracks(['.$comma_separated_ids.'], '.$key.'); return false;" href="#play-'.$track['id'].'">'.$json['title'].'</a></td>';
									echo '<td><a href="javascript:void(0);" onclick="DZ.player.playTracks(['.$comma_separated_ids.'], '.$key.'); return false;" href="#play-'.$track['id'].'">'.gmdate('i:s', $track['duration']).'</a></td>';
									echo '</tr>';
									$k++;
								endforeach;
							?>
						</tbody>
					</table>
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
</div>Ghana