<div class="row">
	<div class="large-12 columns">
		<div class="module yellow">
			<h2>
				<?php echo $current_page.$user['User']['name']; ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
	<div class="large-2 columns">
		<?php echo $this->element('admin'.DS.'user_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="row">
			<div class="large-12 columns">
				<div class="left">
					<?php echo $this->Html->link(__("&lsaquo; back", true), array('controller'=> 'users', 'action'=>'admin_index', 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary')); ?>
				</div>
				<div class="left">
					<?php echo $this->Html->link(__("Edit", true), array('controller'=> 'users', 'action'=>'admin_edit', $user['User']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary')); ?>
				</div>
				<div class="left">
					<?php echo $this->Form->postLink(__("Delete", true), array('controller'=> 'users', 'action'=>'admin_delete', $user['User']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$user['User']['name'].'?', true), $user['User']['id'])); ?>
				</div>
			</div><br>
			<div class="large-12 columns">
				<div class="panel">
					<p>
						<strong><?php echo __('Name: '); ?></strong> <?php echo $user['User']['name']; ?><br>
						<strong><?php echo __('Username: '); ?></strong> <?php echo $user['User']['username']; ?><br>
						<strong><?php echo __('User Role: '); ?></strong> <?php echo $this->Html->link($user['Role']['name'], array('controller'=> 'roles', 'action'=>'view', $user['Role']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny primary')); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
