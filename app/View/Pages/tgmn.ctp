<?php echo $this->element('deezer_notification'); ?>
<div class="large-12 columns banner-i antialiased wow fadeIn">
	<?php
		echo '<div class="banner-cover">';
		echo $this->html->image('GMN-Tigo_web-1080x488.png', array('alt' => 'tigo music', 'class'=>'left'));
		echo '</div>';
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
				<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-3 misc-img">
					<li class="drop-acc" hit="free-ticket">
						<?php
							echo $this->Html->image('GMN-Tigo_web-480x480-Free-ticket.png', array('alt' => 'Tigo Music Ghana Meets Naija', 'title'=>'Win a free ticket'));
						?>
						<div id="free-ticket" class="large-12 columns hit-drop text-left">
							<div class="tooltipx rightx">
								<h3>Win a free ticket</h3>
								<ol>
									<li>Customer with the highest data usage on deezer will get 1 VVIP ticket every week (5 VVIP tickets available)</li>
									<li>First and Second runner up will be given 1 Upper Deck ticket each every week (10 tickets available)</li>
								</ol>
							</div>
						</div>
					</li>
					<li class="drop-acc" hit="discount-ticket">
						<?php
							echo $this->Html->image('GMN-Tigo_web-480x480-discount.png', array('alt' => 'Tigo Music Ghana Meets Naija', 'title'=>'20% Discount'));
						?>
						<div id="discount-ticket" class="large-12 columns hit-drop text-left">
							<div class="tooltipx center">
								<h3>Get up to 20% discount</h3>
								<ol>
									<li>Dial <strong>*500*</strong>4# to buy the weekly deezer package and get a discount of 20%</li>
								</ol>
							</div>
						</div>
					</li>
					<li class="drop-acc" hit="buy-ticket">
						<?php
							echo $this->Html->image('GMN-Tigo_web-480x480-Buy-ticket.png', array('alt' => 'Tigo Music Ghana Meets Naija', 'title'=>'Buy Ticket'));
						?>
						<div id="buy-ticket" class="large-12 columns hit-drop text-left">
							<div class="tooltipx leftx">
								<h3>Buy a ticket directly from a store</h3>
								<ul>
									<li>Accra Mall Tigo store</li>
									<li>Osu Tigo store</li>
									<li>Tigo Head Office</li>
									<li>Starr fm</li>
									<li>Koala</li>
									<li>Empire</li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<script> 
$(document).ready(function(){
    $(".drop-acc").click(function(){
		var hit_focus = $(this).attr('hit');
		$(".hit-drop").not(hit_focus).slideUp();
        $("#" + hit_focus).slideToggle("slow", "swing");
		return false;
    });
});
</script>