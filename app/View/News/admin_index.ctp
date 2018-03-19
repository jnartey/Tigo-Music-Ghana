<div class="row">
	<div class="large-12 columns">
		<div class="module yellow">
			<h2>
				<?php echo $current_page; ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-2 columns">
		<?php echo $this->element('admin'.DS.'news_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?><?php echo $this->Html->link(__(("+ Add News"), true), array('controller'=> 'news', 'action'=>'add', 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><br />
		<br>
		<table cellspacing="0">
			<thead>
				<tr>
					<th>
						<?php echo $this->Paginator->sort('title');?>
					</th>
					<th>
						<?php echo __('Actions'); ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
							foreach ($news as $data):
							?>
				<tr>
					<td class="large-8">
						<?php 
													$Count = AppController::countRows('News');
													$pageCount = $Count;
													echo $data['News']['title']; 
												?>
					</td>
					<td class="actions">
						<?php 
							echo $this->Html->link(__("View", true), array('controller'=> 'news', 'action'=>'view', $data['News']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny primary')); 
							echo $this->Html->link(__("Edit", true), array('controller'=> 'news', 'action'=>'edit', $data['News']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary')); 
							echo $this->Form->postLink(__("Delete", true), array('controller'=> 'news', 'action'=>'delete', $data['News']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$data['News']['title'].'?', true), $data['News']['id'])); 
							if($data['News']['publish'] == 0){
								echo  $this->Form->postLink(__("Publish", true), array('controller'=>'news', 'action'=>'publish_news', $data['News']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary'), sprintf(__('Are you sure you want to publish ~ '.$data['News']['title'], true), $data['News']['id']));
							}else{
								echo  $this->Form->postLink(__("Hide", true), array('controller'=>'news', 'action'=>'unpublish_news', $data['News']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary'), sprintf(__('Are you sure you want to hide ~ '.$data['News']['title'], true), $data['News']['id']));
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
