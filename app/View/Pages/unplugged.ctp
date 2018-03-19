<?php echo $this->element('deezer_notification'); ?>
<div class="large-12 columns banner-i antialiased wow fadeIn">
	<?php 
		$i=1;
		foreach($banners as $banner):	
			if($i == 1){
				echo '<div class="banner-cover">';
				echo $this->html->image('banners'.DS.'thumb'.DS.'large'.DS.$banner['Banner']['banner_image'], array('title' => 'tigo music Ghana', 'class'=>'left'));
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
	<div id="to-screen"></div>
	<div class="content">
		<div class="row padded-content-u">
			<div class="large-12 columns title-bar">
				<div class="callout-i top-b wow pulse">
					<ul class="breadcrumbs">
					  <li><?php echo $this->Html->link(__(('unplugged'), true), array('controller'=> 'pages', 'action'=>'unplugged'), array('escape' => false, 'class'=>'d-menu')); ?></li>
					</ul>
				</div>
			</div>
			<?php if($featured){ ?>
			<div class="large-12 columns text-center video-screen-wrapper video-screen-unplugged">
			<div class="large-12 columns">
			<?php
				echo '<div class="video-emb">';
				if($featured['Video']['youtube'] == 1){
					echo '<div class="y-desktop">';
					$link = $featured['Video']['youtube_link'];
					$video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
					if(empty($video_id[1]))
					    $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

					$video_id = explode("&", $video_id[1]); // Deleting any other params
					$video_id = $video_id[0];
				
					echo '<iframe width="100%" height="500" src="//www.youtube.com/embed/'.$video_id.'?rel=0&loop=0" frameborder="0" allowfullscreen></iframe>';
					echo '</div>';
					echo '<div class="y-mobile">';
					$link = $featured['Video']['youtube_link'];
					$video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
					if(empty($video_id[1]))
					    $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

					$video_id = explode("&", $video_id[1]); // Deleting any other params
					$video_id = $video_id[0];
				
					echo '<iframe width="100%" height="323" src="//www.youtube.com/embed/'.$video_id.'?rel=0&loop=0" frameborder="0" allowfullscreen></iframe>';
					echo '</div>';
				}else{
					echo "<video id='player' src='".$this->Html->url(DS.'files'.DS.'videos'.DS.$featured['Video']['video_mp4'], true)."' poster='".$this->Html->url(DS.'img'.DS.'videos'.DS.'thumb'.DS.'large'.DS.$featured['Video']['video_poster'], true)."' width='800' height='485' style='width:100%; height:100%;' controls='controls' preload='none'></video>";
				}
				echo '</div>';
				echo '<h4>'.$featured['Video']['name'].'</h4>';
			?>
			</div></div>
			<?php } ?>
			<?php
				if($videos){
					echo '<h4>videos from unplugged 2014</h4>';
					echo '<ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-5">';
							$j = 1;
							foreach($videos as $video):
								echo '<li class="video-wrapper">';
								echo '<div class="video-wrapper-bg"><div class="video-l-item-u">';
								
								if($video['Video']['youtube']){
									$link = $video['Video']['youtube_link'];
									if($link){
										$video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
										if(empty($video_id[1]))
										    $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

										$video_id = explode("&", $video_id[1]); // Deleting any other params
										$video_id = $video_id[0];
									}
									
									echo '<a class="load-video" href="'.$this->Html->url(DS.'pages'.DS.'upluggedvideo'.DS.$video['Video']['id'], true).'" title="'.$video['Video']['name'].'" data-youtube="on">';
								}else{
									echo '<a class="load-video" href="'.$this->Html->url(DS.'pages'.DS.'upluggedvideo'.DS.$video['Video']['id'], true).'" title="'.$video['Video']['name'].'">';
								}
								
								if($video['Video']['youtube']){
									
									echo '<img src="http://i1.ytimg.com/vi/'.$video_id.'/mqdefault.jpg" yt:name="mqdefault" alt="tigo music Ghana" />';
									
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
									echo '<a class="title load-video"  href="'.$this->Html->url(DS.'pages'.DS.'upluggedvideo'.DS.$video['Video']['id'], true).'" title="'.$video['Video']['name'].'" data-youtube="on">';
								}else{
									echo '<a class="title load-video" href="'.$this->Html->url(DS.'pages'.DS.'upluggedvideo'.DS.$video['Video']['id'], true).'" title="'.$video['Video']['name'].'">';
								}
								
								echo strlen($video['Video']['name']) >= 12 ? substr($video['Video']['name'], 0, 12) . '...' : $video['Video']['name'];
								echo '</a>';
								echo '</div></div>';
								echo '</li>';
								$j++;
							endforeach;
					echo '</ul>';
				?>
				
				<div class="large-12 columns">
					<div class="pagination right">
					<?php
					 	echo '<span class="unavailable"></span>'.$this->Paginator->prev(__('prev', true), array('class'=>'d-menu'), null, array('class'=>'unavailable'));
						echo $this->Paginator->numbers(array('class'=>'d-menu'));
						echo $this->Paginator->next(__('next', true), array('class'=>'d-menu'), null, array('class'=>'unavailable')).'<span class="unavailable"></span>';
					?>
					</div>
				</div>
				
				<?php
				}else{
					echo '<p>No videos available</p>';
				}
			?>
			
			<div class="large-12 columns unplugged-updates">
				<div class="large-6 columns unplugged-news">
					<div class="large-12 columns title-bar">
						<div class="callout-i top-b wow pulse">
							<ul class="breadcrumbs">
							  <li><?php echo $this->Html->link(__(('unplugged news'), true), array('controller'=> 'pages', 'action'=>'unplugged'), array('escape' => false, 'class'=>'d-menu')); ?></li>
							</ul>
						</div>
					</div>
					<?php
					
						function clean($string) {
						   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
						   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

						   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
						}
				
						foreach($news as $article):
							$string = $article['News']['title'];
							$regex = "@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?).*$)@";
							$clean = preg_replace($regex, ' ', $string);
						
							$clean = clean($clean);
						
							echo '<a href="'.$this->Html->url(DS.'pages'.DS.'news'.DS.$article['News']['id'].DS.$clean, true).'" class="large-12 columns item-x d-menu">';
							echo '<div class="large-4 columns item-img-wrapper">';
					?>
						<div class="item-img" style="background:url(<?php echo $this->Html->url(DS.'img'.DS.'news'.DS.'thumb'.DS.'small'.DS.$article['News']['image'], true) ?>) top left no-repeat; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->Html->url(DS.'img'.DS.'news'.DS.'thumb'.DS.'small'.DS.$article['News']['image'], true) ?>', sizingMethod='scale');
							    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->Html->url(DS.'img'.DS.'news'.DS.'thumb'.DS.'small'.DS.$article['News']['image'], true) ?>', sizingMethod='scale')"; zoom:1;">
						</div>
					<?php
							echo '</div>';
							echo '<div class="large-8 columns item-text-x left">';
							echo '<h5>';
							echo strlen($article['News']['title']) >= 60 ? substr($article['News']['title'], 0, 60) . ' ...' : $article['News']['title'];
							echo '</h5>';
							$stripped_text = strip_tags($article['News']['story']);
							echo '<p>';
							echo strlen($stripped_text) >= 70 ? substr($stripped_text, 0, 70) . '...' : $stripped_text;
							echo '</p>';
							echo '</div>';
							echo '</a>';
						endforeach;
					?>
				</div>
			
				<div class="large-6 columns">
					<div class="large-12 columns title-bar">
						<div class="callout-i top-b wow pulse">
							<ul class="breadcrumbs">
							  <li><?php echo $this->Html->link(__(('Tweets'), true), array('controller'=> 'pages', 'action'=>'unplugged'), array('escape' => false, 'class'=>'d-menu')); ?></li>
							</ul>
						</div>
					</div>
					<?php echo $this->element('twitter_feed'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>	
	$('body').on('click', "a[class*='load-video']", function(event) {
		event.preventDefault();
		
		var target = "#to-screen";
		    $('html, body').animate({
		        scrollTop: $(target).offset().top
		    }, 800);
	    
		$('.video-screen-wrapper').load($(this).attr('href'), '', function(response, status, xhr) {
			if (status == 'error') {
				if (xhr.status == 0) {
					var msg = "<p id='page-loading'>Connection timed out, please check your internet connection</p>";
					$(target).html(msg);
				} else {
					var msg = "Sorry but there was an error: ";
					$(target).html(msg + xhr.status + " " + xhr.statusText);
				}
			}
			
			var playerx, isPlayingx = false;

			// initialize MEJS player
			var video_playerx = new MediaElementPlayer('video', {
					pluginPath: '/js/vendor/',
			        defaultVideoWidth : 600,
			        defaultVideoHeight : 400,
			        success : function (mediaElement, domObject) {
			            playerx = mediaElement; // override the "mediaElement" instance to be used outside the success setting
			            playerx.load(); // fixes webkit firing any method before player is ready
			            //playerx.play(); // autoplay video (optional)
			            playerx.addEventListener('playing', function () {
			                isPlayingx = true;
			            }, false);
			        } // success
			});
				
		});
	});
</script>