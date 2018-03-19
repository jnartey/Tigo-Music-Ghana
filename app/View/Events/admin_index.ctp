	<div class="row">
		<div class="large-12 columns">
			<div class="module yellow">
				<h2><?php echo $current_page; ?> <a href="#"><?php echo $header; ?></a></h2>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-3 columns">
			<?php echo $this->element('admin'.DS.'event_menu'); ?>
		</div>
		<div class="large-10 columns content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Html->link(__(("+ Add New Event"), true), array('controller'=> 'events', 'action'=>'add', 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><br />
			<table>
			    <thead>
			<tr>
				<th><?php echo $this->Paginator->sort('title');?></th>
				<th><?php echo $this->Paginator->sort('event_date'); ?></th>
				<th><?php echo __('Actions'); ?></th>
			</tr>
			    </thead>
			    <tbody>
			<?php
			foreach ($events as $event):
			?>
				<tr>
					<td>
						<?php 
							echo $event['Event']['title']; 
						?>
					</td>
					<td>
						<?php
							echo $event['Event']['event_date'];
						?>
					</td>
					<td class="actions">
						<?php echo $this->Html->link(__("View", true), array('controller'=> 'events', 'action'=>'view', $event['Event']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny primary')); ?>
						<?php echo $this->Html->link(__("Edit", true), array('controller'=> 'events', 'action'=>'edit', $event['Event']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary')); ?>
						<?php echo $this->Form->postLink(__("Delete", true), array('controller'=> 'events', 'action'=>'delete', $event['Event']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$event['Event']['title'].'?', true), $event['Event']['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			    </tbody>
			</table>
			<br />
			<div class="pagination">
				<?php echo '<span class="unavailable">&laquo;</span>'.$this->Paginator->prev(__('prev', true), array(), null, array('class'=>'unavailable'));?><?php echo $this->Paginator->numbers();?><?php echo $this->Paginator->next(__('next', true), array(), null, array('class'=>'unavailable')).'<span class="unavailable">&raquo;</span>';?>
			</div>
		</div>
	</div>