<div class="row">
	<div class="large-12 columns">
		<div class="module yellow">
			<h2>
				<?php echo $current_page.$item_parent[0]['Artist']['name']; ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-2 columns admin-left-panel">
		<?php echo $this->element('admin'.DS.'music_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="large-12 columns">
			<?php 
									if($item_parent[0]['Artist']['category']):
										echo $this->Html->link(__(("&lsaquo; back"), true), array('controller'=> 'artists', 'action'=>'view', $item_parent[0]['Artist']['category'], 'admin' => true), array('escape' => false, 'class'=>'button small primary')); 
									else:
										echo $this->Html->link(__(("&lsaquo; back"), true), array('controller'=> 'artists', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small primary'));
									endif;
									
									if($item_parent[0]['Artist']['add_content'] == 1){
										echo $this->Html->link(__(("Add"), true), array('controller'=> 'artists', 'action'=>'add', $item_parent[0]['Artist']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); 
									}
									echo $this->Html->link(__(("Edit"), true), array('controller'=> 'artists', 'action'=>'edit', $item['Artist']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); 
									if($item_parent[0]['Artist']['category']){
										echo $this->Form->postLink(__("Delete", true), array('controller'=> 'artists', 'action'=>'delete', $item['Artist']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button small alert'), sprintf(__('Are you sure you want to delete '.$item['Artist']['name'].'?', true), $item['Artist']['id'])); 
									}
								?>
		</div>
		<div class="large-10 columns">
			<div class="panel">
				<?php 
					if(!$item_parent[0]['Artist']['category']){
						echo '<p>';
						echo '<strong>'.__('Name: ').'</strong><br />';
						echo $item['Artist']['name'].'<br /><br />';
						echo '</p>';
					}else{
							echo '<p>';
							echo '<strong>'.__('Name: ').'</strong><br />';
							echo $item['Artist']['name'].'<br /><br />';
							echo '<strong>'.__('Artist Content: ').'</strong><br />';
							echo $item['Artist']['content'].'<br /><br />';
							if($item['Artist']['cover_photo']){
								echo '<strong>'.__('Cover: ').'</strong><br />';
								echo $this->html->image('artists'.DS.'thumb'.DS.'large'.DS.$item['Artist']['cover_photo'], array('title' => ''));
							}
							echo '</p>';
					}
				?>
			</div>
		</div>
		<div class="large-12 columns">
			<?php if($items){ ?>
			<h4>
				<?php
					echo $item['Artist']['name'].' items';
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
							<?php echo $item['Artist']['name']; ?>
						</td>
						<td class="actions">
							<?php 
								$collect = AppController::getChildren('Artist', 'category', $item['Artist']['id']);
								if($collect){
									$count = '('.count($collect).')';
								}else{
									$count = null;
								}
								
								echo $this->Html->link(__(("view ".$count), true), array('controller'=> 'artists', 'action'=>'view', $item['Artist']['id'], 'admin' => true), array('escape' => false, 'class'=>'button tiny primary')); ?><?php echo $this->Html->link(__(("Edit"), true), array('controller'=> 'artists', 'action'=>'edit', $item['Artist']['id'], 'admin' => true), array('escape' => false, 'class'=>'button tiny secondary')); ?><?php 
								if(isset($item_parent) && !empty($item_parent)){
									echo $this->Form->postLink(__("Delete", true), array('controller'=> 'artists', 'action'=>'delete', $item['Artist']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$item['Artist']['name'].'?', true), $item['Artist']['id']));
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
