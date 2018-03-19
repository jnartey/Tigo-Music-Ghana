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
			<?php echo $this->Html->link(__(("&lsaquo; back"), true), array('controller'=> 'users', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><br>
			<?php
							echo $this->Form->create('User');
							echo $this->Form->input('role_id', array('label'=>false, 'placeholder'=>'Role', 'empty'   => 'Select Role'))."<br />";
							echo $this->Form->input('name', array('label'=>false, 'placeholder'=>'Name'));
							echo $this->Form->input('username', array('label'=>false, 'placeholder'=>'Username'));
							echo $this->Form->input('password', array('label'=>false, 'placeholder'=>'Password'));
							echo $this->Form->end('Add User');
						?>
		</div>
	</div>
</div>
