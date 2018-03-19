<?php echo $this->element('deezer_notification'); ?>
	<div class="large-12 columns banner antialiased">
		  <div class="large-9 columns banner-left">
			<div id="full-slider-wrapper">
				<div id="layerslider" style="width:100%;height:488px;min-width:100%;">
					<?php
						
						if($events_highlights){
							foreach($events_highlights as $event):
								if($event['Event']['publish_home'] && $event['Event']['banner']){
									echo '<div class="ls-slide" data-ls="transition2d:1,5,104;timeshift:-1000;">';
									echo $this->Html->image('events'.DS.'thumb'.DS.'banner'.DS.$event['Event']['banner'], array('alt' => 'tigo music Ghana', 'class'=>'ls-bg'));
									echo '<h2 class="ls-l" style="top:100px;left:50px;text-shadow: 0.5px 0.5px 0.5px #333;" data-ls="offsetxin:0;durationin:2000;delayin:1500;easingin: easeInOutQuint; easingout: easeInOutQuint;rotatexin:-90;transformoriginin:50% top 0;offsetxout:-200;durationout:1000;">';
									echo $event['Event']['title'];
									echo '</h2>';
									echo '<div class="description ls-l hide-for-small" style="top:210px;left:50px;" data-ls="offsetxin:-50;durationin:2000;delayin:1000;offsetxout:-50;durationout:1000;">';
									echo '<p>';
									echo strlen($event['Event']['content']) >= 240 ? substr($event['Event']['content'], 0, 240) . ' ...' : $event['Event']['content'];
									echo '</p>';
									echo '</div>';
									echo '<a class="d-menu ls-link" href="'.$this->Html->url(DS.'pages'.DS.'events'.DS.$event['Event']['id'].DS.$clean, true).'"></a>';
									echo '<a href="http://www.windowsphone.com/s?appid=abf78126-7301-e011-9264-00237de2db9e" target="_blank" class="ls-l" style="position: absolute;top:320px;left:50px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:600;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('windows.png', array('alt' => 'tigo music Ghana', 'class'=>'app-item')).'</a>
									<a href="http://appworld.blackberry.com/webstore/content/4624?" target="_blank" class="ls-l" style="position: absolute;top:320px;left:210px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:700;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('blackberry.png', array('alt' => 'tigo music Ghana', 'class'=>'app-item')).'</a>
									<a href="https://play.google.com/store/apps/details?id=deezer.android.app" target="_blank" class="ls-l" style="position: absolute;top:320px;left:337px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:800;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('android.png', array('alt' => 'tigo music Ghana', 'class'=>'app-item')).'</a>
									<a href="https://itunes.apple.com/en/app/deezer/id292738169?" target="_blank" class="ls-l" style="position: absolute;top:320px;left:459px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:900;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('apple.png', array('alt' => 'tigo music Ghana', 'class'=>'app-item')).'</a>';
									echo '</div>';
								}
							endforeach;
						}
						
						foreach($banners as $banner):
							echo '<div class="ls-slide" data-ls="transition2d:1,5,104;timeshift:-1000;">';
							echo $this->Html->image('banners'.DS.'thumb'.DS.'home'.DS.$banner['Banner']['banner_image'], array('alt' => 'tigo music Ghana', 'class'=>'ls-bg', 'style'=>"max-width:100% !important;"));
							echo '<h2 class="ls-l" style="top:100px;left:50px;text-shadow: 0.5px 0.5px 0.5px #333;" data-ls="offsetxin:0;durationin:2000;delayin:1500;easingin: easeInOutQuint; easingout: easeInOutQuint;rotatexin:-90;transformoriginin:50% top 0;offsetxout:-200;durationout:1000;">';
							echo $banner['Banner']['title'];
							echo '</h2>';
							echo '<div class="description ls-l hide-for-small" style="top:210px;left:50px;" data-ls="offsetxin:-50;durationin:2000;delayin:1000;offsetxout:-50;durationout:1000;">';
							echo '<p>'.$banner['Banner']['description'].'</p>';
							echo '</div>';
							if($banner['Banner']['url']){
								if($banner['Banner']['external']){
									echo '<a class="ls-link" href="'.$banner['Banner']['url'].'" target="_blank"></a>';
								}else{
									echo '<a class="d-menu ls-link" href="'.$this->Html->url($banner['Banner']['url'], true).'"></a>';
								}
							}
							echo '<a href="http://www.windowsphone.com/s?appid=abf78126-7301-e011-9264-00237de2db9e" target="_blank" class="ls-l" style="position: absolute;top:320px;left:50px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:600;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('windows.png', array('alt' => 'tigo music Ghana', 'class'=>'app-item')).'</a>
							<a href="http://appworld.blackberry.com/webstore/content/4624?" target="_blank" class="ls-l" style="position: absolute;top:320px;left:210px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:700;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('blackberry.png', array('alt' => 'tigo music Ghana', 'class'=>'app-item')).'</a>
							<a href="https://play.google.com/store/apps/details?id=deezer.android.app" target="_blank" class="ls-l" style="position: absolute;top:320px;left:337px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:800;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('android.png', array('alt' => 'tigo music Ghana', 'class'=>'app-item')).'</a>
							<a href="https://itunes.apple.com/en/app/deezer/id292738169?" target="_blank" class="ls-l" style="position: absolute;top:320px;left:459px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:900;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('apple.png', array('alt' => 'tigo music Ghana', 'class'=>'app-item')).'</a>';
							echo '</div>';
						endforeach;
						
						if($news_highlights){
							foreach($news_highlights as $news):
								if($news['News']['publish'] && $news['News']['banner']){
									echo '<div class="ls-slide" data-ls="transition2d:1,5,104;timeshift:-1000;">';
									echo $this->Html->image('events'.DS.'thumb'.DS.'banner'.DS.$news['News']['banner'], array('alt' => 'tigo music Ghana', 'class'=>'ls-bg'));
									echo '<h2 class="ls-l" style="top:100px;left:50px;text-shadow: 0.5px 0.5px 0.5px #333;" data-ls="offsetxin:0;durationin:2000;delayin:1500;easingin: easeInOutQuint; easingout: easeInOutQuint;rotatexin:-90;transformoriginin:50% top 0;offsetxout:-200;durationout:1000;">';
									echo $news['News']['title'];
									echo '</h2>';
									echo '<div class="description ls-l hide-for-small" style="top:210px;left:50px;" data-ls="offsetxin:-50;durationin:2000;delayin:1000;offsetxout:-50;durationout:1000;">';
									echo '<p>';
									echo strlen($news['News']['story']) >= 240 ? substr($news['News']['story'], 0, 240) . ' ...' : $news['News']['story'];
									echo '</p>';
									echo '</div>';
									echo '<a class="d-menu ls-link" href="'.$this->Html->url(DS.'pages'.DS.'news'.DS.$news['News']['id'].DS.$clean, true).'"></a>';
									echo '<a href="http://www.windowsphone.com/s?appid=abf78126-7301-e011-9264-00237de2db9e" target="_blank" class="ls-l" style="position: absolute;top:320px;left:50px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:600;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('windows.png', array('alt' => 'tigo music Ghana', 'class'=>'app-item')).'</a>
									<a href="http://appworld.blackberry.com/webstore/content/4624?" target="_blank" class="ls-l" style="position: absolute;top:320px;left:210px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:700;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('blackberry.png', array('alt' => 'tigo music Ghana', 'class'=>'app-item')).'</a>
									<a href="https://play.google.com/store/apps/details?id=deezer.android.app" target="_blank" class="ls-l" style="position: absolute;top:320px;left:337px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:800;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('android.png', array('alt' => 'tigo music Ghana', 'class'=>'app-item')).'</a>
									<a href="https://itunes.apple.com/en/app/deezer/id292738169?" target="_blank" class="ls-l" style="position: absolute;top:320px;left:459px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:900;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('apple.png', array('alt' => 'tigo music Ghana', 'class'=>'app-item')).'</a>';
									echo '</div>';
								}
							endforeach;

						 	echo $this->Html->link(__(('<span>how to access&nbsp;&nbsp;&nbsp;'.$this->Html->image('deezer-logo.png', array('alt' => 'tigo music')).'</span>'), true), array('controller'=> 'pages', 'action'=>'how_to_access_deezer'), array('escape' => false, 'id'=>'access-deezer-sticker', 'class'=>'d-menu'));
						}
						
					 	echo $this->Html->link(__(('<span>how to access&nbsp;&nbsp;&nbsp;'.$this->Html->image('deezer-logo.png', array('alt' => 'tigo music')).'</span>'), true), array('controller'=> 'pages', 'action'=>'how_to_access_deezer'), array('escape' => false, 'id'=>'access-deezer-sticker', 'class'=>'d-menu')); 
					?>
				</div>
			</div>
		  </div>
		  <div class="large-3 columns banner-right">
			<?php
				if(count($news_tick) > 4){
			?>
				<div class="large-12 columns news-ticker ws">
			<?php
				}else{
			?>
				<div class="large-12 columns news-items ws">
			<?php
				}
			?>
				<div class="large-12 columns innerWrap">
					<?php
						
						function clean($string) {
						   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
						   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

						   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
						}
					
						foreach($news_tick as $article):
							$string = $article['News']['title'];
							$regex = "@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?).*$)@";
							$clean = preg_replace($regex, ' ', $string);
							
							$clean = clean($clean);
							
							echo '<a href="'.$this->Html->url(DS.'pages'.DS.'news'.DS.$article['News']['id'].DS.$clean, true).'" class="item gray-bg d-menu">';
							echo '<div class="large-4 columns item-img-wrapper">';
					?>
						<div class="item-img" style="background:url(<?php echo $this->Html->url(DS.'img'.DS.'news'.DS.'thumb'.DS.'small'.DS.$article['News']['image'], true) ?>) top left no-repeat; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->Html->url(DS.'img'.DS.'news'.DS.'thumb'.DS.'small'.DS.$article['News']['image'], true) ?>', sizingMethod='scale');
							    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->Html->url(DS.'img'.DS.'news'.DS.'thumb'.DS.'small'.DS.$article['News']['image'], true) ?>', sizingMethod='scale')"; zoom:1;">
						</div>
					<?php
							echo '</div>';
							echo '<div class="large-8 columns item-text left">';
							echo '<h5>';
							echo strlen($article['News']['title']) >= 60 ? substr($article['News']['title'], 0, 60) . ' ...' : $article['News']['title'];
							echo '</h5>';
							$stripped_text = strip_tags($article['News']['story']);
							echo '<p>';
							echo strlen($stripped_text) >= 70 ? substr($stripped_text, 0, 70) . '...' : $stripped_text;
							echo '</p>';
							echo '<span class="tool-bar"><strong><span class="fa fa-clock-o"></span> <span class="text">'.date('jS F, Y', $article['News']['timestamp']).'</span></strong></span>';
							echo '</div>';
							echo '</a>';
						endforeach;
					?>
				</div>
		  </div>
		</div>
	</div>
	<div class="large-12 columns main-content antialiased">
		<div class="content" id="music">
			<div class="row padded-content">
				<div class="large-12 columns title-bar">
					<div class="callout top  wow fadeIn">playlists</div>
					<dl class="tabs right wow fadeIn" data-tab>
						<?php
							$i = 1;
							$active = null;
							foreach($playlists as $playlist):
								$string = str_replace(' ', '-', $playlist['Music']['name']); // Replaces all spaces with hyphens.
								$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

								$cleaned = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
								
								if($i == 1){
									$active = 'class="active"';
								}else{
									$active = null;
								}
								
								echo '<dd '.$active.'><a href="#'.$cleaned.'">'.$playlist['Music']['name'].'</a></dd>';
								
								$i++;
							endforeach;
						?>
					</dl>
				</div>
				<div class="tabs-content wow fadeIn" data-wow-offset="300">
					<?php
						
						$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
						$isiPhone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPhone');
						
						$j = 1;
						$active_c = null;
						foreach($playlists as $playlist):
							
							$url = $playlist['Music']['deezer_link'];
							$content = file_get_contents($url);
							$json = json_decode($content, true);
							
							$string = str_replace(' ', '-', $playlist['Music']['name']); // Replaces all spaces with hyphens.
							$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

							$cleaned = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
							
							if($j == 1){
								$active_c = 'active';
							}else{
								$active_c = null;
							}
							
							echo '<div class="content '.$active_c.'" id="'.$cleaned.'">';
								echo '<ul class="small-block-grid-5 medium-block-grid-10 large-block-grid-10">';

									$k = 1;
									$tracklists = array();
									
									if($json['tracks']['data']){
										foreach($json['tracks']['data'] as $track):
											$tracklists[] = $track['id'];
										endforeach;
									}

									$comma_separated_ids = implode(",", $tracklists);

									$s_link = str_replace('api.', 'www.', $url);
									
									if($json['tracks']['data']){
										foreach($json['tracks']['data'] as $key => $track):
											$image_cover = $track['album']['cover']."?size='small'";
											echo '<li class="playlist-item">';
											if($isiPad || $isiPhone){
												echo '<a href="'.$s_link.'">';
												echo '<img class="lazy" src="'.$image_cover.'" alt="tigo music Ghana" />';
												echo '</a>';
											}else{
												echo '<a href="javascript:void(0);">';
												echo '<img class="lazy" src="'.$image_cover.'" alt="tigo music Ghana" />';
												echo '</a>';
												echo '<div class="cap-overlay hide">';
												echo '<div class="flash-support">';
												if($mobile_detect){
													echo '<a play-type-t="alert" play-link="'.$s_link.'" href="javascript:void(0);" onclick="DZ.player.playTracks(['.$comma_separated_ids.'], '.$key.'); return false;" class="fa fa-play play flash-support"></a>';
												}else{
													echo '<a href="javascript:void(0);" onclick="DZ.player.playTracks(['.$comma_separated_ids.'], '.$key.'); return false;" class="fa fa-play play flash-support"></a>';
												}

												echo '<a href="javascript:void(0);" onclick="DZ.player.pause(); return false;" class="fa fa-pause pause"></a>';
												echo '</div>';
												echo '<div class="no-flash">';
												//echo '<a play-type="playlist" play-ids="'.$comma_separated_ids.'" play-key="'.$key.'" play-link="'.$s_link.'" class="fa fa-play play"></a>';
												echo '<a play-type-t="alert" play-link="'.$s_link.'" href="javascript:void(0);" onclick="DZ.player.playTracks(['.$comma_separated_ids.'], '.$key.'); return false;" class="fa fa-play play"></a>';
												echo '<a href="javascript:void(0);" onclick="DZ.player.pause(); return false;" class="fa fa-pause pause"></a>';
												echo '</div>';
												echo '</div>';
											}
											echo '</li>';

											$k++;
										endforeach;
									}else{
										echo '<p>Playlist was not loaded please try again</p>';
									}

								echo '</ul>';
							echo '</div>';

							$j++;
						endforeach;
					?>
				</div>
				<div class="large-12 columns text-right">
					<?php echo $this->Html->link(__(('more playlists'), true), array('controller'=> 'pages', 'action'=>'playlists'), array('escape' => false, 'class'=>'read-more d-menu')); ?>
				</div>
			</div>
		</div>
		
		<div class="content last" id="pre-releases">
		    <div class="row padded-content wow fadeIn">
				<div class="large-12 columns title-bar">
					<div class="callout top">pre-releases</div>
				</div>
			</div>
			<div class="large-12 columns wow fadeIn" data-wow-duration="0.1s">
				<div class="row padded-content">
					<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-5 artists-cover">
						<?php
							$j = 1;
							foreach($pre_releases as $pre_release):
								$url = $pre_release['Music']['deezer_link'];
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
									echo strlen($json['title']) >= 16 ? substr($json['title'], 0, 16) . '...' : $json['title'];
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
		</div>
		
		<!-- Up and coming artist -->
		<div class="content last" id="up-coming-artist">
		    <div class="row padded-content wow fadeIn">
				<div class="large-12 columns title-bar">
					<div class="callout top">up &amp; coming artists</div>
				</div>
			</div>
			<div class="large-12 columns wow fadeIn">
				<div class="row padded-content">
					<div class="large-12 columns upcoming-artist-home">
						<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-5 artists-cover">
							<?php
								$j = 1;
								foreach($upcoming_artists as $upcoming_artist):
									echo '<li class="playlist-wrapper">';
									echo '<div class="playlist-wrapper-bg"><div class="playlist-l-item-d">';
									$clean = clean($upcoming_artist['Artist']['name']);
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
							?>
						</ul>
					</div>
					<div class="large-12 columns text-right">
						<?php //echo $this->Html->link(__(('read more'), true), array('controller'=> 'pages', 'action'=>'artists'), array('escape' => false, 'class'=>'read-more d-menu')); ?>
					</div>
				</div>
			</div>
		</div>	

	  	<div class="content" id="videos">
	    	<div class="row padded-content wow fadeIn">
				<div class="large-12 columns title-bar">
					<div class="callout top">latest videos</div>
				</div>
				<?php
					if($videos){
						echo '<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-5">';
								$j = 1;
								foreach($videos as $video):
									echo '<li class="video-wrapper">';
									echo '<div class="video-wrapper-bg"><div class="video-l-item-e">';
									
									$link = $video['Video']['youtube_link'];
									if($link){
										$video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
										if(empty($video_id[1]))
										    $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

										$video_id = explode("&", $video_id[1]); // Deleting any other params
										$video_id = $video_id[0];
									}
									
									if($mobile_detect){
										echo '<a class="d-menu" href="'.$this->Html->url(DS.'pages'.DS.'latest-videos'.DS.$video['Video']['id'], true).'">';
									}else{
										if($video['Video']['youtube']){
											echo '<a class="fancy_video" rel="videos" data-fancybox-group="videos" href="'.$video['Video']['youtube_link'].'" data-width="600" data-height="370" data-poster="http://i1.ytimg.com/vi/'.$video_id.'/hqdefault.jpg" data-caption="'.$video['Video']['name'].'" title="'.$video['Video']['name'].'" data-youtube="on">';
										}else{
											echo '<a class="fancy_video" rel="videos" data-fancybox-group="videos" href="'.$this->Html->url(DS.'files'.DS.'videos'.DS.$video['Video']['video_mp4'], true).'" data-width="600" data-height="370" data-poster="'.$this->Html->url(DS.'img'.DS.'videos'.DS.'thumb'.DS.'large'.DS.$video['Video']['video_poster'], true).'" data-caption="'.$video['Video']['name'].'" title="'.$video['Video']['name'].'">';
										}
									}
									
									if($video['Video']['youtube']){
										echo '<img src="http://i1.ytimg.com/vi/'.$video_id.'/mqdefault.jpg" yt:name="mqdefault" alt="tigo music Ghana" />';
									}else{
										echo $this->html->image('videos'.DS.'thumb'.DS.'small'.DS.$video['Video']['video_poster'], array('alt' => 'tigo music Ghana', 'class'=>''));
									}
									
									echo '<span class="playbutton"></span>';
									echo '</a>';
									echo '</div>';
									echo '<div class="more-info">';
									echo '<span class="numbered">';
									echo sprintf("%02s", $j);
									echo '</span>';
									if($mobile_detect){
										echo '<a class="d-menu" href="'.$this->Html->url(DS.'pages'.DS.'latest-videos'.DS.$video['Video']['id'], true).'">';
									}else{
										if($video['Video']['youtube']){
											echo '<a class="title fancy_video" rel="videos" data-fancybox-group="videosl" href="'.$video['Video']['youtube_link'].'" data-width="600" data-height="370" data-poster="http://i1.ytimg.com/vi/'.$video_id.'/hqdefault.jpg" data-caption="'.$video['Video']['name'].'" title="'.$video['Video']['name'].'" data-youtube="on">';
										}else{
											echo '<a class="title fancy_video" rel="videos" data-fancybox-group="videosl" href="'.$this->Html->url(DS.'files'.DS.'videos'.DS.$video['Video']['video_mp4'], true).'" data-width="600" data-height="370" data-poster="'.$this->Html->url(DS.'img'.DS.'videos'.DS.'thumb'.DS.'large'.DS.$video['Video']['video_poster'], true).'" data-caption="'.$video['Video']['name'].'" title="'.$video['Video']['name'].'">';
										}
									}
									
									echo strlen($video['Video']['name']) >= 12 ? substr($video['Video']['name'], 0, 12) . '...' : $video['Video']['name'];
									echo '</a>';
									echo '</div></div>';
									echo '</li>';
									$j++;
								endforeach;
						echo '</ul>';
						echo '<div class="large-12 columns text-right">'.$this->Html->link(__(('more videos'), true), array('controller'=> 'pages', 'action'=>'latest-videos'), array('escape' => false, 'class'=>'read-more d-menu tbmp')).'</div>';
					}else{
						echo '<p>No videos available</p>';
					}
				?>
				<!--<img src='http://i1.ytimg.com/vi/4fmj3UzrlEQ/mqdefault.jpg' yt:name='mqdefault'/>
				<img src='http://i1.ytimg.com/vi/4fmj3UzrlEQ/hqdefault.jpg' yt:name='hqdefault'/>-->
			</div>
	  	</div>
	</div>
	<script>
		$(function() {
			var preload = new Array();
			    $("img.lazy").each(function() {
			        s = $(this).attr("src");
			        preload.push(s)
			    });
				
				jQuery.imgpreload(preload,
				{
					each: function()
					{
						
					},
					all: function()
					{
						//alert('all images loaded');
					}
				});							
			    
		    //$("img.lazy").lazyload();
			
		});
	</script>