<script>
	$(function() {
		//datepicker
		$('.event-date').datepick({ 
		    yearRange: '2000:2050', 
			showTrigger: '#calImg'});
	});
</script>
<div class="row">
	<div class="large-12 columns">
		<div class="module yellow">
			<h2>
				<?php echo $current_page; ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-2 columns">
		<?php echo $this->element('admin'.DS.'news_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="large-12 columns">
			<?php
								if($news_parent[0]['News']['category']):
									echo $this->Html->link(__(("cancel"), true), array('controller'=> 'news', 'action'=>'view', $news_parent[0]['News']['category'], 'admin' => true), array('escape' => false, 'class'=>'button small primary right')); 
								else:
									echo $this->Html->link(__(("cancel"), true), array('controller'=> 'news', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small primary right'));
								endif;
							?><br /><br />
			<?php
							echo $this->Form->create('News', array('type' => 'file'));
							echo "<p><label>".$this->Form->checkbox('publish_home', array('value' => 1))." Publish on home page</label></p>";
							echo "<p><label>Publish</label>";
							echo $this->Form->checkbox('publish', array('value' => 1));
							echo "</p><p>";
							if(isset($news) && !empty($news)){
									echo $this->Form->input('category', array(
										'type'    => 'select',
										'options' => $news,
										'empty'   => false
									));
							}
							echo "</p><p>";
							echo $this->Form->input('timestamp', array('class'=>'event-date', 'label'=>false, 'placeholder'=>'Date'));
							echo $this->Form->input('title', array('label'=>false, 'placeholder'=>'Title'));
							echo $this->Form->textarea('story', array('class'=>'ckeditor'));
							//echo $this->Form->input('file', array('type'=>'file'));
							echo '<br />';
							echo $this->Form->input('image', array('type'=>'file', 'label'=>'Image'));
							echo "</p>";
							echo $this->Form->input('banner', array('type'=>'file'));
							echo $this->Form->hidden('cid', array('value'=>$rev));
					 		echo $this->Form->end('Add'); ?>
		</div>
	</div>
</div>
