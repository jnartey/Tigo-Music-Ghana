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
				<?php echo $current_page.' | '. $item['Artist']['name']; ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-2 columns">
		<?php echo $this->element('admin'.DS.'artist_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="large-7 columns">
			<div class="row">
			<?php
				if($item_parent[0]['Artist']['category']):
						echo $this->Html->link(__(("cancel"), true), array('controller'=> 'artists', 'action'=>'view', $item_parent[0]['Artist']['category'], 'admin' => true), array('escape' => false, 'class'=>'button small primary right')); 
					else:
						echo $this->Html->link(__(("cancel"), true), array('controller'=> 'artists', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small primary right'));
					endif;
			?>
			</div>
			<?php
				echo $this->Form->create('Artist', array('type' => 'file'));
				if(!$parent['Artist']['artist_info']){
					echo '<div class="large-12 columns">';
					//echo "<p><label>Add Items</label>";
					//echo $this->Form->checkbox('add_content', array('value' => 1)).'</p>';
					echo $this->Form->input('name', array('label'=>false, 'placeholder'=>'Name'));
					echo $this->Form->hidden('artist_info', array('value'=>1));
					echo '</div>';
				}else{
					echo '<div class="large-12 columns">';
					echo $this->Form->input('name', array('label'=>false, 'placeholder'=>'Name'));
					echo $this->Form->textarea('content', array('id'=>'editor', 'label'=>false, 'placeholder'=>'Add artist text'));
					echo '<br />';
					echo $this->Form->input('cover_photo', array('type'=>'file', 'label'=>'Cover Photo'));
					echo $this->Form->hidden('category', array('value'=>$parent['Artist']['id']));
					echo '</div>';
				}
				
				echo '<div class="large-12 columns">';
				echo '<br />';
			 	echo $this->Form->end('Update'); 
				echo '</div>';
			?>
		</div>
	</div>
</div>
