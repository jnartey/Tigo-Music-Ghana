<div class="row">
	<div class="large-12 columns">
		<div class="module yellow">
			<h2>
				<?php echo "Gallery :: ".$gallery['Gallery']['name'].$current_page; ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-2 columns">
		<?php echo $this->element('admin'.DS.'gallery_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="row">
			<div class="large-12 columns">
				<?php echo $this->Html->link(__(("&lsaquo; back"), true), array('controller'=> 'galleries', 'action'=>'view', $gallery['Gallery']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small primary')); ?><?php echo $this->Html->link(__(("Edit Gallery"), true), array('controller'=> 'galleries', 'action'=>'edit', $gallery['Gallery']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><?php echo $this->Form->postLink(__("Delete", true), array('controller'=> 'galleries', 'action'=>'delete', $gallery['Gallery']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button small alert'), sprintf(__('Are you sure you want to delete '.$gallery['Gallery']['name'].'?', true), $gallery['Gallery']['id'])); ?><br>
				<div class="large-6">
					<?php
												echo $this->Form->create('Image', array('type' => 'file'));
												echo $this->Form->input('img_files.', array('type' => 'file', 'multiple'));
												echo $this->Form->hidden('gallery_id', array('value' => $gallery_id));
												echo $this->Form->end('+ Upload');
											?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns"></div>
		</div>
	</div>
</div>
