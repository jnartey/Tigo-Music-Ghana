<div class="row">
	<div class="large-12 columns">
		<div class="module yellow">
			<h2>
				<?php echo $current_page.$role['Role']['name']; ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-2 columns">
		<?php echo $this->element('admin'.DS.'user_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="row">
			<div class="large-12 columns">
				<div class="left">
					<?php echo $this->Html->link(__("Edit", true), array('controller'=> 'roles', 'action'=>'admin_edit', $role['Role']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary')); ?>
				</div>
				<div class="left">
					<?php echo $this->Form->postLink(__("Delete", true), array('controller'=> 'roles', 'action'=>'admin_delete', $role['Role']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$role['Role']['name'].'?', true), $role['Role']['id'])); ?>
				</div>
			</div><br>
			<div class="large-12 columns">
				<div class="panel">
					<p>
						<strong><?php echo __('Role: '); ?></strong> <?php echo $role['Role']['name']; ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
