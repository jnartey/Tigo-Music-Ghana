<div class="row">
	<div class="large-12 columns">
		<div class="module yellow">
			<h2>
				<?php echo $current_page.strip_tags($banner_parent[0]['Banner']['title']); ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-2 columns">
		<?php echo $this->element('admin'.DS.'banner_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="large-12 columns">
			<?php 
				if($banner_parent[0]['Banner']['category']):
					echo $this->Html->link(__(("&lsaquo; back"), true), array('controller'=> 'banners', 'action'=>'view', $banner_parent[0]['Banner']['category'], 'admin' => true), array('escape' => false, 'class'=>'button small primary')); 
				else:
					echo $this->Html->link(__(("&lsaquo; back"), true), array('controller'=> 'banners', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small primary'));
				endif;
					if($banner_parent[0]['Banner']['add_banner'] == 1){
						echo $this->Html->link(__(("Add Banner"), true), array('controller'=> 'banners', 'action'=>'add', $banner_parent[0]['Banner']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); 
					}
					echo $this->Html->link(__(("Edit"), true), array('controller'=> 'banners', 'action'=>'edit', $banner['Banner']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small secondary'));
					 //echo $this->Form->postLink(__("Delete", true), array('controller'=> 'banners', 'action'=>'delete', $banner['Banner']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button small alert'), sprintf(__('Are you sure you want to delete '.$banner['Banner']['title'].'?', true), $banner['Banner']['id'])); ?>
		</div>
		<div class="separator"></div>
		<div class="large-10 columns">
			<div class="panel">
				<p>
					<strong><?php echo __('Banner Title: '); ?></strong> <?php echo $banner['Banner']['title']; ?><br>
					<br>
					<?php if($banner['Banner']['banner_image']){?>
				</p>
				<p>
					<strong><?php __('Banner Image'); ?></strong><br>
					<?php echo $this->Html->image('banners'.DS.'thumb'.DS.'large'.DS.$banner['Banner']['banner_image'], array('title' => '')); ?><br>
					<br>
					<?php } ?>
				</p>
			</div>
		</div>
		<div class="large-12 columns">
			<?php if($banners){ ?>
			<table cellspacing="0">
				<thead>
					<tr>
						<th>
							<?php echo $this->Paginator->sort('title');?>
						</th>
						<th></th>
						<th>
							<?php echo __('Actions');?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
											foreach ($banners as $banner):
											?>
					<tr>
						<td>
							<?php echo $banner['Banner']['title']; ?>
						</td>
						<td>
							<?php 
									echo $this->Html->image("banners".DS."thumb".DS."small".DS.$banner['Banner']['banner_image'], array(
								    "alt" => "",
								    /*'url' => array('controller' => 'images', 'action' => 'view', $image['Image']['id'])*/
									)).'&nbsp;&nbsp;';
							?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(__(("view"), true), array('controller'=> 'banners', 'action'=>'view', $banner['Banner']['id'], 'admin' => true), array('escape' => false, 'class'=>'button tiny primary')); ?><?php echo $this->Html->link(__(("Edit"), true), array('controller'=> 'banners', 'action'=>'edit', $banner['Banner']['id'], 'admin' => true), array('escape' => false, 'class'=>'button tiny secondary')); ?><?php 
																	if(isset($banner_parent) && !empty($banner_parent)){
																	echo $this->Form->postLink(__("Delete", true), array('controller'=> 'banners', 'action'=>'delete', $banner['Banner']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$banner['Banner']['title'].'?', true), $banner['Banner']['id']));
																	}
																?>
						</td>
					</tr><?php endforeach; ?>
				</tbody>
			</table><?php } ?>
		</div>

				<div class="pagination">
					<?php echo '<span class="unavailable">&laquo;</span>'.$this->Paginator->prev(__('prev', true), array(), null, array('class'=>'unavailable'));?><?php echo $this->Paginator->numbers();?><?php echo $this->Paginator->next(__('next', true), array(), null, array('class'=>'unavailable')).'<span class="unavailable">&raquo;</span>';?>
				</div><br>
				<br>
			</div>
</div>
