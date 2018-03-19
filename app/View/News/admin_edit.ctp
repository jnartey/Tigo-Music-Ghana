<!-- File: /app/View/Roles/admin_add.ctp -->
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
				<h2><?php echo $current_page.' | '. substr($news['News']['title'], 0, strrpos(substr($news['News']['title'], 0, 30), ' '))."..."; ?> <a href="#"><?php echo $header; ?></a></h2>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-2 columns">
			<?php echo $this->element('admin'.DS.'news_menu'); ?>
		</div>
		<div class="large-10 columns content">
			<div class="main-content">
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
				echo "<p><label>".$this->Form->checkbox('publish_home')." Publish on home page</label></p>";
				echo "<p><label>Publish</label>";
				echo $this->Form->checkbox('publish', array('value' => 1));
				echo "</p>";
				echo "<p>";
				echo $this->Form->input('timestamp', array('class'=>'event-date', 'label'=>false, 'placeholder'=>'Date', 'value'=>$news_date));
				echo $this->Form->input('title', array('label'=>false, 'placeholder'=>'Title'));
				echo "</p><p>";
				echo $this->Form->textarea('story', array('class'=>'ckeditor'));
	        	//echo $this->Form->input('file', array('type'=>'file'));
				echo '<br />';
				echo $this->Form->input('image', array('type'=>'file', 'label'=>'Image'));
				echo $this->Form->input('banner', array('type'=>'file'));
				echo "</p>";
			?>
			<?php echo $this->Form->end('Update'); ?>
			</div>
			</div>
		</div>
	</div>