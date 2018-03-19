<div class="row">
	<div class="large-12 columns">
		<div class="module yellow">
			<h2>
				<?php echo $current_page.$blog_parent[0]['Blog']['title']; ?> <a href="#"><?php echo $header; ?></a>
			</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-2 columns admin-left-panel">
		<?php echo $this->element('admin'.DS.'blog_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="large-12 columns">
			<?php 
					echo $this->Html->link(__(("&lsaquo; back"), true), array('controller'=> 'blogs', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small primary'));
								?><?php //echo $this->Html->link(__(("Add Publication"), true), array('controller'=> 'publications', 'action'=>'add', $publication_parent[0]['Publication']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><?php echo $this->Html->link(__(("Edit"), true), array('controller'=> 'blogs', 'action'=>'edit', $blog['Blog']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?><?php 
							echo $this->Form->postLink(__("Delete", true), array('controller'=> 'blogs', 'action'=>'delete', $blog['Blog']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button small alert'), sprintf(__('Are you sure you want to delete '.$blog['Blog']['title'].'?', true), $blog['Blog']['id'])); 
								?>
		</div>
		<div class="large-12 columns">
			<div class="panel">
				<p>
					<strong><?php echo __('Blog Date: '); ?></strong> <?php echo date('M j, Y', $blog['Blog']['blog_date']); ?><br /><br />
					<strong><?php echo __('Blog Author: '); ?></strong> <?php echo $blog['Blog']['author']; ?><br /><br />
					<strong><?php echo __('Blog Title: '); ?></strong> <?php echo $blog['Blog']['title']; ?><br /><br />
					<strong><?php echo __('Blog Content: ') ?></strong> <?php echo $blog['Blog']['content']; ?><br /><br />
					<br>
				</p>
			</div>
		</div>
	</div>
</div>
