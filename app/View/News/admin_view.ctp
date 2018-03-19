<div class="row">
	<div class="columns admin-head">
		<div class="module yellow">
			<h2>
				<?php echo $current_page.substr($news_parent[0]['News']['title'], 0, strrpos(substr($news_parent[0]['News']['title'], 0, 30), ' '))."..."; ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-2 columns">
		<?php echo $this->element('admin'.DS.'news_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="large-12 columns">
			<?php 
					echo $this->Html->link(__(("&lsaquo; back"), true), array('controller'=> 'news', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small primary'));
					//echo $this->Html->link(__(("Add News"), true), array('controller'=> 'news', 'action'=>'add', $news_parent[0]['News']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); 
					echo $this->Html->link(__(("Edit"), true), array('controller'=> 'news', 'action'=>'edit', $news['News']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); 
					echo $this->Form->postLink(__("Delete", true), array('controller'=> 'news', 'action'=>'delete', $news['News']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button small alert'), sprintf(__('Are you sure you want to delete '.$news['News']['title'].'?', true), $news['News']['id'])); 
								?>
		</div>
		<div class="separator"></div>
		<div class="large-10 columns">
			<div class="panel">
				<p>
					<strong><?php echo __('News Title: '); ?></strong><br /><?php echo $news['News']['title']; ?><br />
					<br />
					<strong><?php echo __('New Content: ') ?></strong> <?php echo $news['News']['story']; ?><br />
				</p>
				<?php if($news['News']['image']){?>
				<p>
				<strong><?php __('News Image'); ?></strong><br>
				<?php echo $this->html->image('news'.DS.'thumbs'.DS.'large'.DS.$news['News']['image'], array('title' => '')); ?><br>
				</p>
				<?php } ?>
			</div>
		</div>
		
		<div class="large-12 columns">
			<?php if($news_data){ ?>
			<h4>
				News
			</h4>
			<table cellspacing="0">
				<thead>
					<tr>
						<th>
							<?php echo $this->Paginator->sort('title');?>
						</th>
						<th>
							<?php echo __('Actions');?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($news_data as $data):
					?>
					<tr>
						<td class="large-8">
							<?php 
								echo $data['News']['title']; 
							?>
						</td>
						<td class="actions">
							<?php 
								
								$collect = AppController::getChildren('News', 'category', $data['News']['id']);
								if($collect){
									$count = '('.count($collect).')';
								}else{
									$count = null;
								}
								
								echo $this->Html->link(__("view ".$count, true), array('controller'=> 'news', 'action'=>'view', $data['News']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny primary')); ?><?php echo $this->Html->link(__("Edit", true), array('controller'=> 'news', 'action'=>'edit', $data['News']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary')); ?><?php echo $this->Form->postLink(__("Delete", true), array('controller'=> 'news', 'action'=>'delete', $data['News']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$data['News']['title'].'?', true), $data['News']['id'])); ?><?php
														if($data['News']['publish'] == 0){
															echo  $this->Form->postLink(__("Publish", true), array('controller'=>'news', 'action'=>'publish_news', $data['News']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary'), sprintf(__('Are you sure you want to publish ~ '.$data['News']['title'], true), $data['News']['id']));
														}else{
															echo  $this->Form->postLink(__("Hide", true), array('controller'=>'news', 'action'=>'unpublish_news', $data['News']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary'), sprintf(__('Are you sure you want to hide ~ '.$data['News']['title'], true), $data['News']['id']));
														}
							?>
						</td>
					</tr><?php endforeach; ?>
				</tbody>
			</table><?php } ?>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<div class="pagination">
					<?php echo '<span class="unavailable">&laquo;</span>'.$this->Paginator->prev(__('prev', true), array(), null, array('class'=>'unavailable'));?><?php echo $this->Paginator->numbers();?><?php echo $this->Paginator->next(__('next', true), array(), null, array('class'=>'unavailable')).'<span class="unavailable">&raquo;</span>';?>
				</div>
			</div>
		</div>
	</div>
</div>
