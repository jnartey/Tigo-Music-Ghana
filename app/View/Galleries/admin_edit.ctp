<div class="row">
	<div class="large-12 columns">
		<div class="module yellow">
			<h2>
				<?php echo $current_page.' | '.$gallery['Gallery']['name']; ?> <a href="#"><?php echo $header; ?></a>
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
		<div class="large-6 columns">
			<?php echo $this->Html->link(__(("List Galleries"), true), array('controller'=> 'galleries', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><?php echo $this->Html->link(__(("View"), true), array('controller'=> 'galleries', 'action'=>'view', $gallery['Gallery']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><br>
			<?php
								echo $this->Form->create('Gallery');
								echo $this->Form->input('name', array('label'=>false, 'placeholder'=>'Name'));
								echo $this->Form->input('description', array('label'=>false, 'placeholder'=>'Description'));
								echo '<br />';
								echo $this->Form->end('Update Gallery');
							?>
		</div>
	</div>
</div>
