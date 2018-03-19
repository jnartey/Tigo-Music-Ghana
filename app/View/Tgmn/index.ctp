<?php echo $this->element('deezer_notification'); ?>
<div class="large-12 columns banner-i antialiased wow fadeIn">
	<?php 
		$i=1;
		foreach($banners as $banner):
			if($i == 1){
				echo '<div class="banner-cover">';
					if($banner['Banner']['banner_image']){
						echo $this->html->image('banners'.DS.'thumb'.DS.'large'.DS.$banner['Banner']['banner_image'], array('title' => 'tigo music Ghana', 'class'=>'left'));
					}
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
				<div class="large-12 columns">
					<!--<iframe width="100%" height="526" src="https://www.youtube.com/embed/L8PadRQVbrM?rel=0&autoplay=0&loop=0" frameborder="0" allowfullscreen></iframe>-->
					<iframe src="http://livestream.com/accounts/6371438/events/4069600/player?width=640&height=360&autoPlay=true&mute=false" width="100%" height="550" frameborder="0" scrolling="no"></iframe>
				</div>
				<!--<div class="large-3 columns">
					<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-1 misc-img">
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
				</div>-->
			</div>
		</div>
	</div>
</div>
<script> 
$(document).ready(function(){
    $(".drop-acc").on("click", function(){
		$('.collapse-hit').addClass('drop-acc');
		$(".drop-acc").removeClass('collapse-hit');
		var hit_focus = $(this).attr('hit');
		$(".hit-drop").not(hit_focus).slideUp();
        $("#" + hit_focus).slideToggle("slow", "swing");
		$(this).addClass('collapse-hit');
		$(".collapse-hit").removeClass('drop-acc');
		return false;
    });
	
	$(".collapse-hit").on("click", function(){
		$(".hit-drop").slideUp();
		$(".collapse-hit").addClass('drop-acc');
		$(".drop-acc").removeClass('collapse-hit');
		return false;
    });
	
	$(document).on('click', function(){
	    $(".hit-drop").slideUp();
	});
});
</script>