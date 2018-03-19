	<div class="row">
		<div class="large-12 columns">
			<div class="module yellow">
				<h2><?php echo $current_page; ?> <a href="#"><?php echo $header; ?></a></h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-2 columns">
			<?php echo $this->element('admin'.DS.'video_menu'); ?>
		</div>
		<div class="large-10 columns content">
			<?php echo $this->Session->flash(); ?>
			<?php //echo $this->Html->link(__(("+ Add"), true), array('controller'=> 'videos', 'action'=>'add', 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><br />
			<table  cellspacing="0">
			    <thead>
			<tr>
				<th><?php echo $this->Paginator->sort('name');?></th>
				<th><?php echo __('Actions'); ?></th>
			</tr>
			    </thead>
			    <tbody>
			<?php
			foreach ($items as $item):
			?>
				<tr>
					<td>
						<?php 
							if($item['Video']['id'] != 217){
								$Count = AppController::countRows('Video', 'category', $item['Video']['id']);
								$pageCount = $Count;
								echo '<span class="count">'.$pageCount.'</span> '.$item['Video']['name']; 
							}
							
						?>
					</td>
					<td class="actions">
						<?php echo $this->Html->link(__("View", true), array('controller'=> 'videos', 'action'=>'view', $item['Video']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny primary')); ?>
						<?php echo $this->Html->link(__("Edit", true), array('controller'=> 'videos', 'action'=>'edit', $item['Video']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary')); ?>
						<?php //echo $this->Form->postLink(__("Delete", true), array('controller'=> 'pagecontents', 'action'=>'delete', $page['PageContent']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$page['PageContent']['title'].'?', true), $page['PageContent']['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			    </tbody>
			</table>
			<br />
			<div class="pagination">
				<?php echo '<span class="unavailable">&laquo;</span>'.$this->Paginator->prev(__('prev', true), array(), null, array('class'=>'unavailable'));?>
			 	<?php echo $this->Paginator->numbers();?>
				<?php echo $this->Paginator->next(__('next', true), array(), null, array('class'=>'unavailable')).'<span class="unavailable">&raquo;</span>';?>
			</div>
		</div>
	</div>