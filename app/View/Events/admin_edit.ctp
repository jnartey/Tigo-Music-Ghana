<!-- File: /app/View/Roles/admin_add.ctp -->
<script>
	$(function() {
		//datepicker
		$('.event-date').datepick({ 
		    yearRange: '2000:2050', 
			dateFormat: 'yyyy-mm-dd',
			defaultDate: <?php echo $event['Event']['event_date'] ?>,
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
	<div class="large-3 columns">
		<?php echo $this->element('admin'.DS.'event_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="large-12 columns">
			<?php
									echo $this->Html->link(__(("cancel"), true), array('controller'=> 'events', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small primary right'));
							?><br>
			<br>
			<?php
							echo $this->Form->create('Event', array('type' => 'file'));
							// echo $this->Form->input('category', array(
							//                          'type'    => 'select',
							//                          'options' => $categories,
							//                          'empty'   => false,
							//                          'selected'=> $event));
							echo "<p><label>".$this->Form->checkbox('publish_home')." Publish on home page</label></p>";
							echo $this->Form->input('title');
							echo $this->Form->input('title', array('label'=>false, 'placeholder'=>'Title'));
							echo $this->Form->input('event_date', array('type'=>'text', 'class'=>'event-date', 'label'=>false, 'placeholder'=>'Event date'));
							echo $this->Form->input('time', array('label'=>false, 'type'=>'time', 'placeholder'=>'Time'));
							echo $this->Form->textarea('content', array('class'=>'ckeditor'));
							echo "<br />";
							echo $this->Form->input('event_image', array('type'=>'file'));
							echo "<br />";
							echo $this->Form->input('banner', array('type'=>'file'));
							echo $this->Form->input('file', array('type'=>'file'));
						?> <?php echo $this->Form->end('Update'); ?>
		</div>
	</div>
</div>
