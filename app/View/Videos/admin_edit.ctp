<script>
	$(function() {
		//datepicker
		$('.report-date').datepick({ 
		    yearRange: '2000:2050', 
			showTrigger: '#calImg'});
	});
</script>
<div class="row">
	<div class="large-12 columns">
		<div class="module yellow">
			<h2>
				<?php echo $current_page.' | '. $item['Video']['name']; ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-2 columns">
		<?php echo $this->element('admin'.DS.'video_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="large-7 columns">
			<div class="row">
			<?php
				if($item_parent[0]['Video']['category']):
						echo $this->Html->link(__(("cancel"), true), array('controller'=> 'videos', 'action'=>'view', $item_parent[0]['Video']['category'], 'admin' => true), array('escape' => false, 'class'=>'button small primary right')); 
					else:
						echo $this->Html->link(__(("cancel"), true), array('controller'=> 'videos', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small primary right'));
					endif;
			?>
			</div>
			<?php
				echo $this->Form->create('Video', array('type' => 'file'));
				if($parent['Video']['content_type'] == 0){
					echo '<div class="large-12 columns">';
					//echo "<p><label>Add Items</label>";
					//echo $this->Form->checkbox('add_content', array('value' => 1)).'</p>';
					echo $this->Form->input('name', array('label'=>false, 'placeholder'=>'Name'));
					echo $this->Form->hidden('parent', array('value'=>1));
					echo '</div>';
					
					$options = array(
			        	'1' => 'Videos',
			        	'2' => 'Reviews'
			        );
					
			        echo '<div class="large-4 columns left">'.$this->Form->input('content_type', array(
			        	'type'    => 'select',
			        	'options' => $options,
			        	'empty'   => false
			        )).'</div>';
				}else{
					if($parent['Video']['content_type'] == 1){
						echo '<div class="large-12 columns">';
						echo "<p><label>YouTube</label>";
						echo $this->Form->checkbox('youtube', array('value' => 1)).'</p>';
						echo $this->Form->input('name', array('label'=>false, 'placeholder'=>'Name'));
						echo $this->Form->input('youtube_link', array('label'=>false, 'placeholder'=>'YouTube Link'));
						echo $this->Form->input('video_poster', array('type'=>'file', 'label'=>'Video Poster'));
						echo $this->Form->input('video_mp4', array('type'=>'file', 'label'=>'mp4'));
						//echo $this->Form->input('video_webm', array('type'=>'file', 'label'=>'webm'));
						//echo $this->Form->input('video_ogv', array('type'=>'file', 'label'=>'ogv'));
						echo $this->Form->hidden('category', array('value'=>$parent['Video']['id']));
						echo '</div>';
					}
					
				}
				
				echo '<div class="large-12 columns">';
				echo '<br />';
			 	echo $this->Form->end('Update'); 
				echo '</div>';
			?>
		</div>
	</div>
</div>
