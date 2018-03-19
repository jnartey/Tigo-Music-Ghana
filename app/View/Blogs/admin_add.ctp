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
		<?php echo $this->element('admin'.DS.'blog_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="large-12 columns">
			<div class="row">
				<?php
					if($blog_parent[0]['Blog']['category']):
						echo $this->Html->link(__(("cancel"), true), array('controller'=> 'blogs', 'action'=>'view', $blog_parent[0]['Blog']['category'], 'admin' => true), array('escape' => false, 'class'=>'button small primary right')); 
					else:
						echo $this->Html->link(__(("cancel"), true), array('controller'=> 'blogs', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small primary right'));
					endif;
				?>
			</div><?php
							echo $this->Form->create('Blog', array('type' => 'file'));
							echo "<p><label>Publish</label>";
							echo $this->Form->checkbox('publish', array('value' => 1));
							echo "</p>";
							
							echo "<p><label>Enable Comments</label>";
							echo $this->Form->checkbox('show_comment', array('value' => 1));
							echo "</p>";
							
							echo $this->Form->input('title', array('label'=>false, 'placeholder'=>'Title'));
							//echo $this->Form->input('title', array('label'=>false, 'placeholder'=>'Title Summary'));
							//echo $this->Form->input('author', array('label'=>false, 'placeholder'=>'Author'));
							echo $this->Form->input('blog_date', array('class'=>'event-date', 'label'=>false, 'placeholder'=>'Date'));
							echo $this->Form->textarea('content', array('id'=>'editor', 'label'=>false, 'placeholder'=>'Add content'));
							echo '<br />';
							echo $this->Form->input('blog_thumb', array('type'=>'file', 'label'=>'Blog thumb'));
							echo $this->Form->input('blog_image', array('type'=>'file', 'label'=>'Blog image'));
						 	echo $this->Form->end('Add Blog'); ?>
		</div>
	</div>
</div>
