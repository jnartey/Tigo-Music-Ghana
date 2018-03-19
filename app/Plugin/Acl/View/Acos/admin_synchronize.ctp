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
	<div class="large-3 columns">
		<?php echo $this->element('admin'.DS.'user_menu_acl'); ?>
	</div>
	<div class="large-9 columns content">
		<?php 
						echo $this->Session->flash();
						echo $this->element('design/header');
						echo $this->element('Acos/links');
						?><?php
		if($run)
		{
			echo '<div class="separator"></div>';
			echo '<div class="alert-box success">' . __d('acl', 'New ACOs') . '</div>';
			
			if(count($create_logs) > 0)
			{
		//        echo '<p>';
		//        echo __d('acl', 'The following actions ACOs have been created');
		//        echo '<p>';
				echo '<div class="alert-box standard">';
				echo $this->Html->nestedList($create_logs);
				echo '</div>';
			}
			else
			{
				echo '<div class="alert-box standard">';
				echo __d('acl', 'There was no new actions ACOs to create');
				echo '</div>';
			}
			
			echo '<h3>' . __d('acl', 'Obsolete ACOs') . '</h3>';
			
			if(count($prune_logs) > 0)
			{
		//        echo '<p>';
		//        echo __d('acl', 'The following actions ACOs have been deleted');
		//        echo '<p>';
				echo $this->Html->nestedList($prune_logs);
			}
			else
			{
				echo '<div class="alert-box standard">';
				echo __d('acl', 'There was no action ACO to delete');
				echo '</div>';
			}
		}
		else
		{
			echo '<div class="separator"></div>';
			echo '<div class="alert-box standard">';
			echo __d('acl', 'This page allows you to synchronize the existing controllers and actions with the ACO datatable.');
			echo '</div>';
			
			
			$has_aco_to_sync = false;
			
			if(count($missing_aco_nodes) > 0)
			{
				echo '<div class="alert-box alert">' . __d('acl', 'Missing ACOs') . '</div>';
				
				echo '<div class="separator"></div>';
				echo '<div class="panel">';
				echo $this->Html->nestedList($missing_aco_nodes);
				echo '</div>';
				
				$has_aco_to_sync = true;
			}
			
			if(count($nodes_to_prune) > 0)
			{
				echo '<div class="alert-box alert">' . __d('acl', 'Obsolete ACO nodes') . '</div>';
				
				echo '<div class="separator"></div>';
				echo '<div class="panel">';
				echo $this->Html->nestedList($nodes_to_prune);
				echo '</div>';
				
				$has_aco_to_sync = true;
			}
			
			if($has_aco_to_sync)
			{
				echo '<div class="separator"></div>';
				echo '<div class="alert-box standard">';
				echo __d('acl', 'Clicking the link will not change or remove permissions for existing actions ACOs.');
				echo '</div>';
				
				echo '<p>';
				echo $this->Html->link($this->Html->image('/acl/img/design/sync.png') . ' ' . __d('acl', 'Synchronize'), '/admin/acl/acos/synchronize/run', array('escape' => false, 'class'=>'button medium success'));
				echo '</p>';
			}
			else
			{
				echo '<div class="alert-box success">';
				echo $this->Html->image('/acl/img/design/tick.png') . ' ' . __d('acl', 'The ACO datatable is already synchronized');
				echo '</div>';
			}
		}

		echo $this->element('design/footer');
		?>
	</div>
</div>
