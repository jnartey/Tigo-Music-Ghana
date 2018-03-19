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
				<?php echo $current_page.' | '. $page['PageContent']['title']; ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-2 columns">
		<?php echo $this->element('admin'.DS.'page_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="large-12 columns">
			<div class="row">
				<?php
								if($page_parent[0]['PageContent']['category']):
									echo $this->Html->link(__(("cancel"), true), array('controller'=> 'pageContents', 'action'=>'view', $page_parent[0]['PageContent']['category'], 'admin' => true), array('escape' => false, 'class'=>'button small primary right')); 
								else:
									echo $this->Html->link(__(("cancel"), true), array('controller'=> 'pageContents', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small primary right'));
								endif;
							?>
			</div><?php
							echo $this->Form->create('PageContent', array('type' => 'file'));
							echo "<p><label>Enable Add Content</label>";
							echo $this->Form->checkbox('add_content', array('value' => 1));
							echo "</p>";
							echo $this->Form->input('title', array('label'=>false, 'placeholder'=>'Title'));
							echo $this->Form->textarea('content', array('id'=>'editor', 'label'=>false, 'placeholder'=>'Add content'));
							echo '<br />';
							echo $this->Form->input('page_image', array('type'=>'file', 'label'=>'Image'));
							if($page['PageContent']['content_type'] == 1){
								echo $this->Form->input('video_poster', array('type'=>'file', 'label'=>'Video Poster'));
								echo $this->Form->input('video', array('type'=>'file', 'label'=>'mp4'));
							}
							echo $this->Form->end('Update'); 
						?>
		</div>
	</div>
</div>
