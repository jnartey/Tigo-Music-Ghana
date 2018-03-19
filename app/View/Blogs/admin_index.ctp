	<div class="row">
		<div class="large-12 columns">
			<div class="module yellow">
				<h2><?php echo $current_page; ?> <a href="#"><?php echo $header; ?></a></h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-2 columns">
			<?php echo $this->element('admin'.DS.'blog_menu'); ?>
		</div>
		<div class="large-10 columns content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Html->link(__(("+ Add Blog"), true), array('controller'=> 'blogs', 'action'=>'add', 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><br />
			<table  cellspacing="0">
			    <thead>
			<tr>
				<th>
					<?php echo $this->Paginator->sort('date');?>
				</th>
				<th><?php echo $this->Paginator->sort('title');?></th>
				<th><?php echo __('Actions'); ?></th>
			</tr>
			    </thead>
			    <tbody>
			<?php
			foreach ($blogs as $blog):
			?>
				<tr>
					<td><?php echo date('M j, Y', $blog['Blog']['blog_date']); ?></td>
					<td>
						<?php 
							//$Count = AppController::countRows('Blog', 'category', $blog['Blog']['id']);
							echo '<strong>'.$blog['Blog']['author'].'</strong> - '.$blog['Blog']['title']; 
						?>
					</td>
					<td class="actions">
						<?php 
							echo $this->Html->link(__("View", true), array('controller'=> 'blogs', 'action'=>'view', $blog['Blog']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny primary')); 
							echo $this->Html->link(__("Edit", true), array('controller'=> 'blogs', 'action'=>'edit', $blog['Blog']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary')); 
							if($blog['Blog']['publish'] == 0){
								echo  $this->Form->postLink(__("Publish", true), array('controller'=>'blogs', 'action'=>'publish', $blog['Blog']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary'), sprintf(__('Are you sure you want to publish ~ '.$blog['Blog']['title'], true), $blog['Blog']['id']));
							}else{
								echo  $this->Form->postLink(__("Hide", true), array('controller'=>'blogs', 'action'=>'unpublish', $blog['Blog']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary'), sprintf(__('Are you sure you want to hide ~ '.$blog['Blog']['title'], true), $blog['Blog']['id']));
							}
							
							if($blog['Blog']['show_comment'] == 0){
								echo  $this->Form->postLink(__("Enable comments", true), array('controller'=>'blogs', 'action'=>'enable_comments', $blog['Blog']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary'), sprintf(__('Are you sure you want to enable comments ~ '.$blog['Blog']['title'], true), $blog['Blog']['id']));
							}else{
								echo  $this->Form->postLink(__("Disable comments", true), array('controller'=>'blogs', 'action'=>'disable_comments', $blog['Blog']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary'), sprintf(__('Are you sure you want to disable comments ~ '.$blog['Blog']['title'], true), $blog['Blog']['id']));
							}
							
							echo $this->Form->postLink(__("Delete", true), array('controller'=> 'blogs', 'action'=>'delete', $blog['Blog']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$blog['Blog']['title'].'?', true), $blog['Blog']['id'])); ?>
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