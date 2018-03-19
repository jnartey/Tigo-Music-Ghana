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
		<?php echo $this->Session->flash(); ?><?php echo $this->Html->link(__(("+ Add New Role"), true), array('controller'=> 'roles', 'action'=>'add', 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><br>
		<br>
		<table cellspacing="0">
			<thead>
				<tr>
					<th>
						<?php echo $this->Paginator->sort('name');?>
					</th>
					<th class="actions">
						<?php __('Actions'); ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
							foreach ($roles as $role):
							?>
				<tr>
					<td>
						<?php echo $role['Role']['name']; ?>
					</td>
					<td class="actions">
						<?php echo $this->Html->link(__("View", true), array('controller'=> 'roles', 'action'=>'view', $role['Role']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny primary')); ?><?php echo $this->Html->link(__("Edit", true), array('controller'=> 'roles', 'action'=>'edit', $role['Role']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary')); ?><?php echo $this->Form->postLink(__("Delete", true), array('controller'=> 'users', 'action'=>'delete', $role['Role']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$role['Role']['name'].'?', true), $role['Role']['id'])); ?>
					</td>
				</tr><?php endforeach; ?>
			</tbody>
		</table><br>
		<div class="pagination">
			<?php echo '<span class="unavailable">&laquo;</span>'.$this->Paginator->prev(__('prev', true), array(), null, array('class'=>'unavailable'));?><?php echo $this->Paginator->numbers();?><?php echo $this->Paginator->next(__('next', true), array(), null, array('class'=>'unavailable')).'<span class="unavailable">&raquo;</span>';?>
		</div>
	</div>
</div>
