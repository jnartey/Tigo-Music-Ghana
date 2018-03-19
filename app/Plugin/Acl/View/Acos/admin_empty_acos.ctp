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
		<?php echo $this->element('admin'.DS.'user_menu_acl'); ?>
	</div>
	<div class="large-9 columns content">
		<?php 
						echo $this->Session->flash();
						echo $this->element('design/header');
						echo $this->element('Acos/links');
		?><?php

			echo '<div class="separator"></div>';
			echo '<div class="alert-box standard">';
			echo __d('acl', 'This page allows you to clear all actions ACOs.');
			echo '</div>';
			
			echo '<div class="alert-box standard">';
			echo __d('acl', 'Clicking the link will destroy all existing actions ACOs and associated permissions.');
			echo '</div>';
			
			echo '<div>';
			echo $this->Html->link($this->Html->image('/acl/img/design/cross.png') . ' ' . __d('acl', 'Clear ACOs'), '/admin/acl/acos/empty_acos/run', array('confirm' => __d('acl', 'Are you sure you want to destroy all existing ACOs ?'), 'escape' => false, 'class'=>'button small alert'));
			echo '</div>';

		echo $this->element('design/footer');
		?>
	</div>
</div>
