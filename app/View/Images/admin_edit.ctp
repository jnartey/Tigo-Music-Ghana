<div class="row">
	<div class="large-12 columns">
		<div class="module yellow">
			<h2>
				<?php echo "Gallery | ".$gallery['Gallery']['name'].$current_page." :: "; if($image['Image']['name']){ echo $image['Image']['name']; }else{ echo $image['Image']['img_file']; }; ?> <a href="#"><?php echo $header; ?></a>
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
				<?php echo $this->Html->link(__(("&lsaquo; back"), true), array('controller'=> 'galleries', 'action'=>'view', $gallery['Gallery']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small primary')); ?><br>
				<div class="large-6">
				<?php
												echo $this->Form->create('Image', array('type' => 'file'));
												echo $this->Form->input('img_file', array('type' => 'file'));
												echo $this->Form->hidden('name');
												echo $this->Form->end('+ Change');
											?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns"></div>
		</div>
	</div>
</div>
