<?php echo $this->element('deezer_notification'); ?>
<div class="large-12 columns banner antialiased wow pulse">
		  <div class="large-9 columns banner-left">
			<div id="full-slider-wrapper">
				<div id="layerslider" style="width:100%;">
					<?php
						foreach($banners as $banner):
							echo '<div class="ls-slide" data-ls="transition2d:1,5,104;timeshift:-1000;">';
							echo $this->Html->image('banners'.DS.'thumb'.DS.'large'.DS.$banner['Banner']['banner_image'], array('alt' => 'tiGO music', 'class'=>'ls-bg'));
							echo '<h2 class="ls-l" style="top:100px;left:50px;" data-ls="offsetxin:0;durationin:2000;delayin:1500;easingin: easeInOutQuint; easingout: easeInOutQuint;rotatexin:-90;transformoriginin:50% top 0;offsetxout:-200;durationout:1000;">';
							echo $banner['Banner']['title'];
							echo '</h2>';
							echo '<div class="description ls-l hide-for-small" style="top:210px;left:50px;" data-ls="offsetxin:-50;durationin:2000;delayin:1000;offsetxout:-50;durationout:1000;">';
							echo '<p>'.$banner['Banner']['description'].'</p>';
							echo '</div>';
							echo '<a href="http://www.windowsphone.com/s?appid=abf78126-7301-e011-9264-00237de2db9e" target="_blank" class="ls-l" style="position: absolute;top:300px;left:50px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:600;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('windows.png', array('alt' => 'tiGO music', 'class'=>'app-item')).'</a>
							<a href="http://appworld.blackberry.com/webstore/content/4624?" target="_blank" class="ls-l" style="position: absolute;top:300px;left:210px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:700;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('blackberry.png', array('alt' => 'tiGO music', 'class'=>'app-item')).'</a>
							<a href="https://play.google.com/store/apps/details?id=deezer.android.app" target="_blank" class="ls-l" style="position: absolute;top:300px;left:337px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:800;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('android.png', array('alt' => 'tiGO music', 'class'=>'app-item')).'</a>
							<a href="https://itunes.apple.com/en/app/deezer/id292738169?" target="_blank" class="ls-l" style="position: absolute;top:300px;left:459px;" data-ls="offsetxin:0;offsetyin:top;durationin:1500;delayin:900;easingin:easeOutElastic;fadein:false;offsetxout:0;fadeout:true;">'.$this->Html->image('apple.png', array('alt' => 'tiGO music', 'class'=>'app-item')).'</a>';
							echo '</div>';
						endforeach;
					?>
				</div>
			</div>
		  </div>
		  <div class="large-3 columns banner-right wow bounceInRight" data-wow-delay="0.2s">
			<?php
				if(count($news) > 4){
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
						foreach($news as $article):
							echo '<a href="'.$this->Html->url(DS.'pages'.DS.'news'.DS.$article['News']['id'].DS.str_replace(' ', '-', $article['News']['title']), true).'" class="item gray-bg d-menu">';
							echo '<div class="large-4 columns item-img-wrapper">';
					?>
						<div class="item-img" style="background:url(<?php echo $this->Html->url(DS.'img'.DS.'news'.DS.'thumb'.DS.'small'.DS.$article['News']['image'], true) ?>) top left no-repeat; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->Html->url(DS.'img'.DS.'news'.DS.'thumb'.DS.'small'.DS.$article['News']['image'], true) ?>', sizingMethod='scale');
							    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->Html->url(DS.'img'.DS.'news'.DS.'thumb'.DS.'small'.DS.$article['News']['image'], true) ?>', sizingMethod='scale')"; zoom:1;">
						</div>
					<?php
							echo '</div>';
							echo '<div class="large-8 columns item-text left">';
							echo '<h5>';
							echo strlen($article['News']['title']) >= 70 ? substr($article['News']['title'], 0, 70) . ' ...' : $article['News']['title'];
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
						$j = 1;
						$active_c = null;
						foreach($playlists as $playlist):
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
								$url = $playlist['Music']['deezer_link'];
								$content = file_get_contents($url);
								$json = json_decode($content, true);
								
								$k = 1;
								$tracklists = array();
								
								foreach($json['tracks']['data'] as $track):
									$tracklists[] = $track['id'];
								endforeach;
								
								$comma_separated_ids = implode(",", $tracklists);
								
								foreach($json['tracks']['data'] as $key => $track):
									echo '<li id="'.$json['id'].'" class="playlist-item">';
									echo '<a href="#">';
									echo '<img src="'.$track['album']['cover'].'" alt="tiGo music" />';
									echo '</a>';
									echo '<div class="cap-overlay hide">';
									echo '<a href="#" onclick="DZ.player.playTracks(['.$comma_separated_ids.'], '.$key.'); return false;" href="#" class="fa fa-play play"></a>';
									echo '<a href="#" onclick="DZ.player.pause(); return false;" href="#" class="fa fa-pause pause"></a>';
									echo '<a href="'.$this->Html->url(DS.'pages'.DS.'playlists'.DS.$playlist['Music']['id'].DS.str_replace(' ', '-', $playlist['Music']['name']), true).'" class="fa fa-link info d-menu"></a>';
									echo '</div>';
									echo '</li>';
									
									$k++;
								endforeach;
								
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
					<ul class="small-block-grid-3 medium-block-grid-5 large-block-grid-5 artists-cover">
						<?php
							foreach($pre_releases as $pre_release):
								$track = $pre_release['Music']['deezer_link'];
								$track_content = file_get_contents($track);
								$track_json = json_decode($track_content, true);
							
								echo '<li id="'.$json['id'].'" class="playlist-l-item">';
								echo '<a href="#">';
								echo '<img src="'.$track_json['album']['cover'].'?size=big" alt="tiGo music" />';
								echo '</a>';
								echo '<div class="cap-overlay hide">';
								echo '<a href="#" onclick="DZ.player.playTracks(['.$track_json['id'].']); return false;" href="#" class="fa fa-play play"></a>';
								echo '<a href="#" onclick="DZ.player.pause(); return false;" href="#" class="fa fa-pause pause"></a>';
								//echo '<a href="'.$this->Html->url(DS.'pages'.DS.'pre_releases'.DS.$pre_release['Music']['id'].DS.str_replace(' ', '-', $pre_release['Music']['name']), true).'" class="fa fa-link info d-menu"></a>';
								echo '</div>';
								echo '</li>';
							endforeach;
						?>
					</ul>
				</div>
			</div>
		</div>
		<!-- Spotlight on artist scrapped -->
		<!--<div class="content last" id="spotlight-on-artist">
		    <div class="row padded-content wow pulse">
				<div class="large-12 columns title-bar">
					<div class="callout top">spotlight on artist</div>
				</div>
			</div>
			<div class="large-12 columns wow pulse">
				<div class="row padded-content">
					  <div class="large-12 columns banner-content right" data-equalizer-watch>
					  		<div class="large-8 columns view-port">
					  			<div class="banner-image" style="background:url(img/spotlight/sarkodie-middle.jpg) left no-repeat; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='img/pre-release/sarkodie-middle.jpg', sizingMethod='scale');
									    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='img/pre-release/sarkodie-middle.jpg', sizingMethod='scale')";
									    zoom:1;"></div>
								<div class="view-port-caption">
									<h2>Sarkodie</h2>
									<h4>Hip-hop artist</h4>
									<p>
										Michael Owusu Addo, known by his stage name Sarkodie, is a Ghanaian hip hop and hiplife recording artist from Tema.
									</p>
									<a class="read-more" href="#">read more</a>
								</div>
					  		</div>
							<div class="large-4 columns item-list">
								<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-2">
									<li>
										<a href="#">
										  <img src="img/spotlight/spotlight-1.jpg" alt="tiGo music" />
										  <div class="cap-overlay-2"></div>
										</a>
									</li>
									<li>
										<a href="#">
										  <img src="img/spotlight/spotlight-2.jpg" alt="tiGo music" />
										  <div class="cap-overlay-2"></div>
										</a>
									</li>
									<li>
										<a href="#">
										  <img src="img/spotlight/spotlight-3.jpg" alt="tiGo music" />
										  <div class="cap-overlay-2"></div>
										</a>
									</li>
									<li>
										<a href="#">
										  <img src="img/spotlight/spotlight-4.jpg" alt="tiGo music" />
										  <div class="cap-overlay-2"></div>
										</a>
									</li>
									<li>
										<a href="#">
										  <img src="img/spotlight/spotlight-1.jpg" alt="tiGo music" />
										  <div class="cap-overlay-2"></div>
										</a>
									</li>
									<li>
										<a href="#">
										  <img src="img/spotlight/spotlight-2.jpg" alt="tiGo music" />
										  <div class="cap-overlay-2"></div>
										</a>
									</li>
								</ul>
							</div>
					  </div>
				</div>
			</div>
		</div>-->
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
						<ul class="small-block-grid-3 medium-block-grid-5 large-block-grid-5 artists-cover">
							<?php
								foreach($upcoming_artists as $upcoming_artist):
								echo '<li><a class="d-menu" href="'.$this->Html->url(DS.'pages'.DS.'up_coming_artist'.DS.$upcoming_artist['Artist']['id'].DS.str_replace(' ', '-', $upcoming_artist['Artist']['name']), true).'">'.$this->html->image('artists'.DS.'thumb'.DS.'small'.DS.$upcoming_artist['Artist']['cover_photo'], array('title' => 'tiGO music', 'class'=>'left')).'</a></li>';
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

	  <!--<div class="content" id="news">
	    <div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout top">news</div>
			</div>
	    	<p>Coming soon...</p>
		</div>
	  </div>-->
	  <!--<div class="content wow pulse" id="events">
	    <div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout top">what's hot</div>
			</div>
			<div class="large-6 columns event-box wow fadeIn" data-wow-offset="300">
	    		<img src="img/news-large.jpg" alt="tiGo music" />
				<div class="event-content">
					<h4>2014 MTN 4syte TV Music Video Awards</h4>
					<p>
						The event which honours deserving artists with great music videos has for the past few years become a household name and a date to look for in the entertainment calendar of Ghanaian artists and video directors. Several awards would be handed out this year including: Best Collaboration Video, Best Directed Video, Best Male Video, Best Female Video, Best Group Video, Best Choreography, Best Special Effect, Best Hiphop Video, Best Reggae/Dancehall Video, Best Hiplife Video, Best Discovery Video, Best African Act Video, Best Story Line Video, Best Edited Video, Best Gospel, Best Hi-Life Video, Most Popular Video, Best Photography, Overall Best Video/ Most Influential Artiste
					</p>
					<div class="extra-info">
						<span class="left"><span class="fa fa-clock-o"></span> Nov. 23, 2014 ,  8:30 PM Accra</span>
						<span class="right"><span class="fa fa-location-arrow"></span> International Conference Center</span>
					</div>
					<iframe src="http://new.livestream.com/accounts/6371438/events/3537742/player?width=1024&height=480&autoPlay=true&mute=false" width="100%" height="100%" frameborder="0" scrolling="no"> </iframe>
				</div>
	    	</div>
			<div class="large-6 columns event-box wow fadeIn" data-wow-offset="300">
	    		<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-3">
					<?php
						foreach($events as $event):
							echo '<li><div class="event-list d-menu light-blue-bg">';
							echo '<div class="event-image">';
							echo $this->html->image('events'.DS.'thumb'.DS.'small'.DS.$event['Event']['event_image'], array('title' => 'tiGO music', 'class'=>'left'));
							echo '</div>';
							echo '<div class="event-text">';
							echo '<h4><a href="'.$this->Html->url(DS.'pages'.DS.'events'.DS.$event['Event']['id'].DS.str_replace(' ', '-', $event['Event']['title']), true).'">';
							echo strlen($event['Event']['title']) >= 70 ? substr($event['Event']['title'], 0, 70) . '...' : $event['Event']['title'];
							echo '</a></h4>';
							echo '<span class="event-date">'.date('jS F, Y', strtotime($event['Event']['event_date'])).'</span>';
							$stripped_text = strip_tags($event['Event']['content']);
							echo '<p>';
							echo strlen($stripped_text) >= 85 ? substr($stripped_text, 0, 85) . '...' : $stripped_text;
							echo '</p>';
							echo $this->Html->link(__(('read more'), true), array('controller'=> 'pages', 'action'=>'events', $event['Event']['id'], str_replace(' ', '-', $event['Event']['title'])), array('escape' => false, 'class'=>'read-more d-menu'));
							echo '</div>';
							echo '</div></li>';
						endforeach;
					?>
				</ul>
	    	</div>
			
		</div>
	  </div>-->
	  <!--<div class="content" id="features">
	    <div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout top">features</div>
			</div>
		</div>
		<div class="large-12 columns">
			<div class="slider autoplay">
				<div><a href="#">
					<img src="img/features.jpg" alt="tiGo music" />
					<div class="feature-content">
						<h6>ROAD ON THE ROAD</h6>
						<p>Kojo Antwi on Tour: Exculsive Behind the Scenes Video 
						and Fan Q&A</p>
					</div>
				</a></div>
				<div><a href="#">
					<img src="img/features.jpg" alt="tiGo music" />
					<div class="feature-content">
						<h6>ROAD ON THE ROAD</h6>
						<p>Kojo Antwi on Tour: Exculsive Behind the Scenes Video 
						and Fan Q&A</p>
					</div>
				</a></div>
				<div><a href="#">
					<img src="img/features.jpg" alt="tiGo music" />
					<div class="feature-content">
						<h6>ROAD ON THE ROAD</h6>
						<p>Kojo Antwi on Tour: Exculsive Behind the Scenes Video 
						and Fan Q&A</p>
					</div>
				</a></div>
				<div><a href="#">
					<img src="img/features.jpg" alt="tiGo music" />
					<div class="feature-content">
						<h6>ROAD ON THE ROAD</h6>
						<p>Kojo Antwi on Tour: Exculsive Behind the Scenes Video 
						and Fan Q&A</p>
					</div>
				</a></div>
				<div><a href="#">
					<img src="img/features.jpg" alt="tiGo music" />
					<div class="feature-content">
						<h6>ROAD ON THE ROAD</h6>
						<p>Kojo Antwi on Tour: Exculsive Behind the Scenes Video 
						and Fan Q&A</p>
					</div>
				</a></div>
				<div><a href="#">
					<img src="img/features.jpg" alt="tiGo music" />
					<div class="feature-content">
						<h6>ROAD ON THE ROAD</h6>
						<p>Kojo Antwi on Tour: Exculsive Behind the Scenes Video 
						and Fan Q&A</p>
					</div>
				</a></div>
				<div><a href="#">
					<img src="img/features.jpg" alt="tiGo music" />
					<div class="feature-content">
						<h6>ROAD ON THE ROAD</h6>
						<p>Kojo Antwi on Tour: Exculsive Behind the Scenes Video 
						and Fan Q&A</p>
					</div>
				</a></div>
				<div><a href="#">
					<img src="img/features.jpg" alt="tiGo music" />
					<div class="feature-content">
						<h6>ROAD ON THE ROAD</h6>
						<p>Kojo Antwi on Tour: Exculsive Behind the Scenes Video 
						and Fan Q&A</p>
					</div>
				</a></div>
			</div>
		</div>
	</div>-->
	
	<!-- Charts pending -->
	<!--<div class="content" id="charts">
	    <div class="row padded-content">
			<div class="large-12 columns title-bar wow pulse">
				<div class="callout top">charts</div>
			</div>
	    	<div class="large-12 columns title-box-wrapper wow pulse" data-wow-delay="0.1s">
				<div class="large-12 columns title-box">
					<div class="large-2 columns">
		    			<h5>HIPLIFE TOP 10</h5>
		    		</div>
					<div class="large-2 columns">
						<h5>DANCEHALL TOP 50</h5>
					</div>
					<div class="large-2 columns">
						<h5>HIP HOP TOP 50</h5>
					</div>
					<div class="large-2 columns">
						<h5>R&B TOP 50</h5>
					</div>
					<div class="large-4 columns">
						<h5>FEATURED SONG</h5>
					</div>
				</div>
	    	</div>
			<div class="large-12 columns">
	    		<a href="#" class="large-2 columns chart-box-wrapper wow bounceInRight" data-wow-delay="0.3s">
					<div class="large-12 columns chart-box">
						<span class="chart-position">1</span>
						<span class="chart-date">18/10/2014</span>
						<span class="chart-song">SIEHOR SIEHOR</span>
						<span class="chart-artist">Castro ft D-Black</span>
					</div>
	    		</a>
				<a href="#" class="large-2 columns chart-box-wrapper wow bounceInRight" data-wow-delay="0.5s">
					<div class="large-12 columns chart-box">
						<span class="chart-position">1</span>
						<span class="chart-date">18/10/2014</span>
						<span class="chart-song">DANCEHALL COMMANDO</span>
						<span class="chart-artist">Shatta Wale</span>
					</div>
				</a>
				<a href="#" class="large-2 columns chart-box-wrapper wow bounceInRight" data-wow-delay="0.7s">
					<div class="large-12 columns chart-box">
						<span class="chart-position">1</span>
						<span class="chart-date">18/10/2014</span>
						<span class="chart-song">DANCEHALL COMMANDO</span>
						<span class="chart-artist">Shatta Wale</span>
					</div>
				</a>
				<a href="#" class="large-2 columns chart-box-wrapper wow bounceInRight" data-wow-delay="0.9s">
					<div class="large-12 columns chart-box">
						<span class="chart-position">1</span>
						<span class="chart-date">18/10/2014</span>
						<span class="chart-song">DANCEHALL COMMANDO</span>
						<span class="chart-artist">Shatta Wale</span>
					</div>
				</a>
				<a href="#" class="large-4 columns chart-box-wrapper wow bounceInRight" data-wow-delay="1.1s">
					<div class="large-12 columns chart-box remove-pad">
						<img src="img/featured-song.jpg" alt="tiGo music" />
					</div>
				</a>
	    	</div>
		</div>
	  </div>-->
	  <div class="content last" id="videos">
	    <div class="row padded-content wow fadeIn">
			<div class="large-12 columns title-bar">
				<div class="callout top">latest videos</div>
			</div>
			<div class="large-12 columns wow fadeIn video-wrap-box">
				<iframe src="http://new.livestream.com/accounts/6371438/events/3537742/player?width=1024&height=520&autoPlay=true&mute=false" width="100%" height="100%" frameborder="0" scrolling="no"> </iframe>
			</div>
		</div>
	  </div>
</div>