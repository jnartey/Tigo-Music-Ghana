<div class="row">
	<div class="large-12 columns">
		<div class="module yellow">
			<h2>
				<?php echo $current_page; ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
	<div class="large-2 columns">
		<?php echo $this->element('admin'.DS.'user_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="large-6 columns">
			<?php echo $this->Html->link(__(("List Users"), true), array('controller'=> 'users', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><br>
			<?php
						echo $this->Form->create('User');
						echo $this->Form->input('role_id', array('label'=>false, 'placeholder'=>'Role'))."<br />";
						echo $this->Form->input('name', array('label'=>false, 'placeholder'=>'Name'));
						echo $this->Form->input('username', array('label'=>false, 'placeholder'=>'Username'));
						echo $this->Form->input('ch_password', array('label'=>false, 'placeholder'=>'Reset password'));
						echo $this->Form->end('Update User');
						?>
		</div>
	</div>
</div>
