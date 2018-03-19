	<div class="row">
		<div class="large-12 columns">
			<div class="module yellow">
				<h2><?php echo $current_page; ?> <a href="#"><?php echo $header; ?></a></h2>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-2 columns">
			<?php echo $this->element('admin'.DS.'gallery_menu'); ?>
		</div>
		<div class="large-10 columns content">
			<?php echo $this->Session->flash(); ?>
			<?php //echo $this->Html->link(__(("+ Add New Gallery"), true), array('controller'=> 'galleries', 'action'=>'add', 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><br />
			<table>
			    <thead>
			<tr>
				<th><?php echo $this->Paginator->sort('name');?></th>
				<th><?php echo __('Actions'); ?></th>
			</tr>
			    </thead>
			    <tbody>
			<?php
			foreach ($galleries as $gallery):
			?>
				<tr>
					<td>
						<?php 
							$Count = AppController::countRows('Image', 'gallery_id', $gallery['Gallery']['id']);
							$imageCount = $Count;
							echo '<span class="count">'.$imageCount.'</span> '.$gallery['Gallery']['name'];
						?>
					</td>
					<td class="actions">
						<?php echo $this->Html->link(__("View", true), array('controller'=> 'galleries', 'action'=>'view', $gallery['Gallery']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny primary')); ?>
						<?php echo $this->Html->link(__("Edit", true), array('controller'=> 'galleries', 'action'=>'edit', $gallery['Gallery']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary')); ?>
						<?php echo $this->Form->postLink(__("Delete", true), array('controller'=> 'galleries', 'action'=>'delete', $gallery['Gallery']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$gallery['Gallery']['name'].'?', true), $gallery['Gallery']['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			    </tbody>
			</table><br />
			<div class="pagination">
				<?php echo '<span class="unavailable">&laquo;</span>'.$this->Paginator->prev(__('prev', true), array(), null, array('class'=>'unavailable'));?><?php echo $this->Paginator->numbers();?><?php echo $this->Paginator->next(__('next', true), array(), null, array('class'=>'unavailable')).'<span class="unavailable">&raquo;</span>';?>
			</div>
		</div>
	</div>