<?php echo $this->element('deezer_notification'); ?>
<div class="large-12 columns banner-i antialiased wow fadeIn">
	<?php 
		$i=1;
		foreach($banners as $banner):
		
		if($tgmn_index){ 
	?>
	<div class="large-12 columns text-center video-screen-wrapper" style="background:url(<?php echo $this->Html->url(DS.'img'.DS.'banners'.DS.'thumb'.DS.'large'.DS.$banner['Banner']['banner_image'], true); ?>) left no-repeat; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->Html->url(DS.'img'.DS.'banners'.DS.'thumb'.DS.'large'.DS.$banner['Banner']['banner_image'], true); ?>', sizingMethod='scale');
		    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->Html->url(DS.'img'.DS.'banners'.DS.'thumb'.DS.'large'.DS.$banner['Banner']['banner_image'], true); ?>', sizingMethod='scale')";
		    zoom:1;">
		<div class="large-12 columns video-screen">
		<?php
			echo '<div class="video-emb">';
			echo "<video id='player' src='".$this->Html->url(DS.'files'.DS.'tgmn'.DS.$tgmn_index['PageContent']['video'], true)."' poster='".$this->Html->url(DS.'img'.DS.'tgmn'.DS.'thumb'.DS.'large'.DS.$tgmn_index['PageContent']['video_poster'], true)."' width='800' height='485' style='width:100%; height:100%;' controls='controls' preload='none'></video>";
			echo '</div>';
			//echo '<h4>'.$index['PageContent']['title'].'</h4>';
		?>
		</div>
	</div>
	<?php
		}else{
			if($i == 1){
				echo '<div class="banner-cover">';
				echo $this->html->image('banners'.DS.'thumb'.DS.'large'.DS.$banner['Banner']['banner_image'], array('title' => 'tigo music Ghana', 'class'=>'left'));
				echo '</div>';
			}
			$i++;
		}
		endforeach;
	?>
</div>
<div class="large-12 columns main-content antialiased">
	<?php
		echo $this->element('generic_submenu');
	?>
	
	<div class="content">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top-b wow pulse">
					<ul class="breadcrumbs">
					  <li><a href="#"><?php echo $title_for_layout; ?></a></li>
					</ul>
				</div>
			</div>
			<div class="large-12 columns">
				<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3 misc-img">
					<?php
						function clean($string) {
						   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
						   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

						   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
						}
						
						foreach($tgmns as $tgmn):
							$clean = clean($tgmn['PageContent']['title']);
							echo '<li class="drop-acc" hit="'.$clean.'">';
							echo $this->Html->image('tgmn'.DS.'thumb'.DS.'small'.DS.$tgmn['PageContent']['page_image'], array('alt' => 'Tigo Music Ghana Meets Naija', 'title'=>$tgmn['PageContent']['title']));
							echo '<span class="click">click here</span>';
							echo '<div id="'.$clean.'" class="large-12 columns hit-drop text-left"><div class="tooltipx center">'; 
							echo '<h3>'.$tgmn['PageContent']['title'].'</h3>';
							echo $tgmn['PageContent']['content'];
							echo '</div></div>';
							echo '</li>';
						endforeach;
					?>
				</ul>
			</div>
		</div>
	</div>
</div>
<script> 

$(function() {
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

$(document).ready(function(){
    $(".drop-acc").click(function(){
		var hit_focus = $(this).attr('hit');
		$(".hit-drop").not(hit_focus).slideUp();
        $("#" + hit_focus).slideToggle("slow", "swing");
		return false;
    });
});
</script>