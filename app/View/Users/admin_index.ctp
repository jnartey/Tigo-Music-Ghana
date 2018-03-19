<div class="row">
	<div class="large-12 columns">
		<div class="module yellow">
			<h2>
				<?php echo $current_page; ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
	<div class="large-2 columns menu-panel">
		<?php echo $this->element('admin'.DS.'user_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?><?php echo $this->Html->link(__(("+ Add New user"), true), array('controller'=> 'users', 'action'=>'add', 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><br>
		<table>
			<thead>
				<tr>
					<th>
						<?php echo $this->Paginator->sort('name');?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('username');?>
					</th>
					<th>
						<?php echo $this->Paginator->sort('role_id');?>
					</th>
					<th class="actions">
						<?php __('Actions'); ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
							foreach ($users as $user):
							?>
				<tr>
					<td>
						<?php echo $user['User']['name']; ?>
					</td>
					<td>
						<?php echo $user['User']['username']; ?>
					</td>
					<td>
						<?php echo $this->Html->link($user['Role']['name'], array('controller'=> 'roles', 'action'=>'view', $user['Role']['id'])); ?>
					</td>
					<td class="actions">
						<?php echo $this->Html->link(__("View", true), array('controller'=> 'users', 'action'=>'view', $user['User']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny primary')); ?><?php echo $this->Html->link(__("Edit", true), array('controller'=> 'users', 'action'=>'edit', $user['User']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary')); ?><?php 
													if($slot = $this->Session->read('Auth.User')){
														if($slot['id'] == $user['User']['id']){
															echo '<a href="#" class="button tiny alert disabled">Delete</a>';
														}else{
															echo $this->Form->postLink(__("Delete", true), array('controller'=> 'users', 'action'=>'delete', $user['User']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$user['User']['name'].'?', true), $user['User']['id']));
														} 
												}
												?>
					</td>
				</tr><?php endforeach; ?>
			</tbody>
		</table><br>
		<div class="pagination">
			<?php echo '<span class="unavailable">&laquo;</span>'.$this->Paginator->prev(__('prev', true), array(), null, array('class'=>'unavailable'));?><?php echo $this->Paginator->numbers();?><?php echo $this->Paginator->next(__('next', true), array(), null, array('class'=>'unavailable')).'<span class="unavailable">&raquo;</span>';?>
		</div>
	</div>
</div>
