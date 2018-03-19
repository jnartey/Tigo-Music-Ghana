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
		<?php echo $this->element('admin'.DS.'banner_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?><?php //echo $this->Html->link(__(("+ Add New Banner"), true), array('controller'=> 'banners', 'action'=>'add', 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><br>
		<br>
		<table cellspacing="0">
			<thead>
				<tr>
					<th>
						<?php echo $this->Paginator->sort('title');?>
					</th>
					<th></th>
					<th>
						<?php echo __('Actions'); ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
							foreach ($banners as $banner):
								if($banner['Banner']['id'] != 31){
							?>
				<tr>
					<td>
						<?php 
							$Count = AppController::countRows('Banner', 'category', $banner['Banner']['id']);
							$bannerCount = $Count;
							echo '<span class="count">'.$bannerCount.'</span> '.$banner['Banner']['title'];
						?>
					</td>
					<td>
						<?php 
							$banner_images = AppController::getChildrenId('Banner', 'category', $banner['Banner']['id'], 5);
							if($banner_images){
								foreach ($banner_images as $banner_image):
									
										echo $this->Html->image("banners".DS."thumb".DS."small".DS.$banner_image['Banner']['banner_image'], array(
									    "alt" => "",
									    /*'url' => array('controller' => 'images', 'action' => 'view', $image['Image']['id'])*/
										)).'&nbsp;';
									
								endforeach;
							}elseif($banner['Banner']['banner_image']){
								echo $this->Html->image("banners".DS."thumb".DS."small".DS.$banner['Banner']['banner_image'], array(
							    "alt" => "",
							    /*'url' => array('controller' => 'images', 'action' => 'view', $image['Image']['id'])*/
								)).'&nbsp;&nbsp;';
							}
							}
						?>
					</td>
					<td class="actions">
						<?php echo $this->Html->link(__("View", true), array('controller'=> 'banners', 'action'=>'view', $banner['Banner']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny primary')); ?><?php echo $this->Html->link(__("Edit", true), array('controller'=> 'banners', 'action'=>'edit', $banner['Banner']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny secondary')); ?><?php //echo $this->Form->postLink(__("Delete", true), array('controller'=> 'banners', 'action'=>'delete', $banner['Banner']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$banner['Banner']['title'].'?', true), $banner['Banner']['id'])); ?>
					</td>
				</tr><?php endforeach; ?>
			</tbody>
		</table><br>
		<div class="pagination">
			<?php echo '<span class="unavailable">&laquo;</span>'.$this->Paginator->prev(__('prev', true), array(), null, array('class'=>'unavailable'));?><?php echo $this->Paginator->numbers();?><?php echo $this->Paginator->next(__('next', true), array(), null, array('class'=>'unavailable')).'<span class="unavailable">&raquo;</span>';?>
		</div>
	</div>
</div>
