<div class="row">
	<div class="large-12 columns">
		<div class="module yellow">
			<h2>
				<?php echo $current_page.$event_parent[0]['Event']['title']; ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-3 columns">
		<?php echo $this->element('admin'.DS.'event_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="large-12 columns">
			<?php 
									echo $this->Html->link(__(("&lsaquo; back"), true), array('controller'=> 'events', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small primary'));
								?><?php echo $this->Html->link(__(("Edit"), true), array('controller'=> 'events', 'action'=>'edit', $event['Event']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><?php 
										echo $this->Form->postLink(__("Delete", true), array('controller'=> 'events', 'action'=>'delete', $event['Event']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button small alert'), sprintf(__('Are you sure you want to delete '.$event['Event']['title'].'?', true), $event['Event']['id'])); 
								?>
		</div>
		<div class="separator"></div>
		<div class="large-10 columns">
			<div class="panel">
				<p>
					<strong><?php echo __('Event Title: '); ?></strong> <?php echo $event['Event']['title']; ?><br />
					<br />
					<strong><?php echo __('Event Content: ') ?></strong> <?php echo $event['Event']['content']; ?><br />
					<?php if($event['Event']['event_image']){?><br />
					<strong><?php __('Event Image'); ?></strong><br />
					<?php echo $html->image('events'.DS.'thumbs'.DS.'normal'.DS.$event['Event']['event_image'], array('title' => '')); ?><br />
					<br>
					<?php } ?>
				</p>
			</div>
		</div>
		<!-- <div class="large-12 columns">
					<?php if($events){ ?>
					<h4>
						Sub Pages
					</h4>
					<table cellspacing="0">
						<thead>
							<tr>
								<th>
									<?php echo $this->Paginator->sort('title');?>
								</th>
								<th class="actions">
									<?php echo __('Actions');?>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
													$six_months = 6 * 30 * 24 * 60 * 60;
													$one_month = 30 * 24 * 60 * 60;
													foreach ($events as $event):
														if(strtotime($event['Event']['event_date']) >= time() && $event_parent[0]['Event']['id'] == 1){
													?>
							<tr>
								<td>
									<?php echo $event['Event']['title']; ?>
								</td>
								<td class="actions">
									<?php echo $this->Html->link(__(("view"), true), array('controller'=> 'events', 'action'=>'view', $event['Event']['id'], 'admin' => true), array('escape' => false, 'class'=>'button tiny primary')); ?><?php echo $this->Html->link(__(("Edit"), true), array('controller'=> 'events', 'action'=>'edit', $event['Event']['id'], 'admin' => true), array('escape' => false, 'class'=>'button tiny secondary')); ?><?php 
																			if(isset($event_parent) && !empty($event_parent)){
																			echo $this->Form->postLink(__("Delete", true), array('controller'=> 'events', 'action'=>'delete', $event['Event']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$event['Event']['title'].'?', true), $event['Event']['id']));
																			}
																		?>
								</td>
							</tr><?php }elseif(strtotime($event['Event']['event_date']) < time() && $event_parent[0]['Event']['id'] == 2 && $event['Event']['event_date'] != null && (time() - strtotime($event['Event']['event_date'])) <= $one_month){ ?>
							<tr>
								<td>
									<?php echo $event['Event']['title']; ?>
								</td>
								<td class="actions">
									<?php echo $this->Html->link(__(("view"), true), array('controller'=> 'events', 'action'=>'view', $event['Event']['id'], 'admin' => true), array('escape' => false, 'class'=>'button tiny primary')); ?><?php echo $this->Html->link(__(("Edit"), true), array('controller'=> 'events', 'action'=>'edit', $event['Event']['id'], 'admin' => true), array('escape' => false, 'class'=>'button tiny secondary')); ?><?php 
																			if(isset($event_parent) && !empty($event_parent)){
																			echo $this->Form->postLink(__("Delete", true), array('controller'=> 'events', 'action'=>'delete', $event['Event']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$event['Event']['title'].'?', true), $event['Event']['id']));
																			}
																		?>
								</td>
							</tr><?php }elseif((time() - strtotime($event['Event']['event_date'])) >= $six_months && $event_parent[0]['Event']['id'] == 3 && $event['Event']['event_date'] != null){ ?>
							<tr>
								<td>
									<?php echo $event['Event']['title']; ?>
								</td>
								<td class="actions">
									<?php echo $this->Html->link(__(("view"), true), array('controller'=> 'events', 'action'=>'view', $event['Event']['id'], 'admin' => true), array('escape' => false, 'class'=>'button tiny primary')); ?><?php echo $this->Html->link(__(("Edit"), true), array('controller'=> 'events', 'action'=>'edit', $event['Event']['id'], 'admin' => true), array('escape' => false, 'class'=>'button tiny secondary')); ?><?php 
																			if(isset($event_parent) && !empty($event_parent)){
																			echo $this->Form->postLink(__("Delete", true), array('controller'=> 'events', 'action'=>'delete', $event['Event']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$event['Event']['title'].'?', true), $event['Event']['id']));
																			}
																		?>
								</td>
							</tr><?php } ?><?php endforeach; ?>
						</tbody>
					</table><?php } ?>
				</div>
			</div>
			<div class="row">
				<div class="twelve columns">
					<div class="row">
						<div class="twelve columns paging">
							<?php echo $this->Paginator->prev(__('< Prev', true), array(), null, array('class'=>'disabled'));?><?php echo $this->Paginator->numbers();?><?php echo $this->Paginator->next(__('Next >', true), array(), null, array('class'=>'disabled'));?>
						</div><br>
						<br>
					</div>
				</div>
			</div> -->
</div>
