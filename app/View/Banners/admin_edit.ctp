<div class="row">
	<div class="large-12 columns admin-head">
		<div class="module yellow">
			<h2>
				<?php echo $current_page.' | '. strip_tags($banner['Banner']['title']); ?> <a href="#"><?php echo $header; ?></a>
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
		<div class="large-6 columns">
			<?php
							if($banner_parent[0]['Banner']['category']):
								echo $this->Html->link(__(("cancel"), true), array('controller'=> 'banners', 'action'=>'view', $banner_parent[0]['Banner']['category'], 'admin' => true), array('escape' => false, 'class'=>'button small primary flt-right')); 
							else:
								echo $this->Html->link(__(("cancel"), true), array('controller'=> 'banners', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small primary flt-right'));
							endif;
						?><?php
							echo $this->Form->create('Banner', array('type' => 'file'));
							echo "<p><label>Publish</label>";
							echo $this->Form->checkbox('publish', array('value' => 1));
							echo "</p>";
							echo $this->Form->input('title', array('label'=>false, 'placeholder'=>'Title'));
							echo $this->Form->input('description', array('label'=>false, 'placeholder'=>'Description'));
							echo "<br />";
							echo "<p><label>".$this->Form->checkbox('external')." External URL</label></p>";
							echo $this->Form->input('url', array('label'=>false, 'placeholder'=>'link'));
							//echo $this->Form->input('url', array('label'=>false, 'placeholder'=>'link code'));
							echo $this->Form->input('banner_image', array('type'=>'file', 'label'=>'Banner image'));
						?><?php echo $this->Form->end('Update'); ?>
		</div>
	</div>
</div>
