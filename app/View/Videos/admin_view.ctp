<div class="row">
	<div class="large-12 columns">
		<div class="module yellow">
			<h2>
				<?php echo $current_page.$item_parent[0]['Video']['name']; ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-2 columns admin-left-panel">
		<?php echo $this->element('admin'.DS.'video_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="large-12 columns">
			<?php 
				if($item_parent[0]['Video']['category']):
					echo $this->Html->link(__(("&lsaquo; back"), true), array('controller'=> 'videos', 'action'=>'view', $item_parent[0]['Video']['category'], 'admin' => true), array('escape' => false, 'class'=>'button small primary')); 
				else:
					echo $this->Html->link(__(("&lsaquo; back"), true), array('controller'=> 'videos', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small primary'));
				endif;
				
				if($item_parent[0]['Video']['add_content'] == 1){
					echo $this->Html->link(__(("Add"), true), array('controller'=> 'videos', 'action'=>'add', $item_parent[0]['Video']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); 
				}
				echo $this->Html->link(__(("Edit"), true), array('controller'=> 'videos', 'action'=>'edit', $item['Video']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); 
				if($item_parent[0]['Video']['category']){
					echo $this->Form->postLink(__("Delete", true), array('controller'=> 'videos', 'action'=>'delete', $item['Video']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button small alert'), sprintf(__('Are you sure you want to delete '.$item['Video']['name'].'?', true), $item['Video']['id'])); 
				}
			?>
		</div>
		<div class="large-10 columns">
			<div class="panel">
				<?php 
					if(!$item_parent[0]['Video']['category']){
						echo '<p>';
						echo '<strong>'.__('Name: ').'</strong><br />';
						echo $item['Video']['name'].'<br /><br />';
						echo '</p>';
					}else{
							if($item['Video']['content_type'] == 1){
								echo '<p>';
								echo '<strong>'.__('Name: ').'</strong><br />';
								echo $item['Video']['name'].'<br /><br />';
								
								if($item['Video']['video_mp4']){
									echo '<strong>'.__('Video mp4: ').'</strong><br />';
									echo $item['Video']['video_mp4'].'<br />';
								}
								
								if($item['Video']['youtube_link']){
									echo '<strong>'.__('YouTube Link: ').'</strong><br />';
									echo $item['Video']['youtube_link'].'<br />';
								}
								
								if($item['Video']['video_poster']){
									echo '<strong>'.__('Poster: ').'</strong><br />';
									echo $this->html->image('videos'.DS.'thumb'.DS.'large'.DS.$item['Video']['video_poster'], array('title' => ''));
								}
								echo '</p>';
							}
					}
				?>
			</div>
		</div>
		<div class="large-12 columns">
			<?php if($items){ ?>
			<h4>
				<?php
					echo $item['Video']['name'].' items';
				?>
			</h4>
			<table cellspacing="0">
				<thead>
					<tr>
						<th>
							<?php echo $this->Paginator->sort('name');?>
						</th>
						<th>
							<?php echo __('Actions');?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($items as $item):
					?>
					<tr>
						<td>
							<?php echo $item['Video']['name']; ?>
						</td>
						<td class="actions">
							<?php 
								$collect = AppController::getChildren('Video', 'category', $item['Video']['id']);
								if($collect){
									$count = '('.count($collect).')';
								}else{
									$count = null;
								}
								
								echo $this->Html->link(__(("view ".$count), true), array('controller'=> 'videos', 'action'=>'view', $item['Video']['id'], 'admin' => true), array('escape' => false, 'class'=>'button tiny primary'));
								echo $this->Html->link(__(("Edit"), true), array('controller'=> 'videos', 'action'=>'edit', $item['Video']['id'], 'admin' => true), array('escape' => false, 'class'=>'button tiny secondary'));
								 
								if(isset($item_parent) && !empty($item_parent)){
									echo $this->Form->postLink(__("Delete", true), array('controller'=> 'videos', 'action'=>'delete', $item['Video']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$item['Video']['name'].'?', true), $item['Video']['id']));
								}
								
								if($item['Video']['featured'] == 1){
									echo '<a class="button tiny success" href="#">Featured</a>';
								}else{
									echo $this->Form->postLink(__("feature video", true), array('controller'=> 'videos', 'action'=>'featured', $item['Video']['id'], $item['Video']['category'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary'), sprintf(__('Are you sure you want to feature '.$item['Video']['name'].'?', true), $item['Video']['id']));
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
