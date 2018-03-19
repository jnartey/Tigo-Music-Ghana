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
			if(count($logs) > 0)
			{
				echo '<div class="separator"></div>';
				echo '<div class="alert-box success">';
				echo __d('acl', 'The following actions ACOs have been pruned');
				echo '<div>';

				echo '<div class="alert-box standard">';
				echo $this->Html->nestedList($logs);
				echo '<div>';
			}
			else
			{
				echo '<div class="separator"></div>';
				echo '<div class="alert-box standard">';
				echo __d('acl', 'There was no actions ACOs to prune');
				echo '</div>';
			}
		}
		else
		{
			echo '<div class="separator"></div>';
			echo '<div class="alert-box standard">';
			echo __d('acl', 'This page allows you to prune obsolete ACOs.');
			echo '</div>';
				
			if(count($nodes_to_prune) > 0)
			{
				echo '<div class="alert-box alert">' . __d('acl', 'Obsolete ACO nodes') . '</div>';
				
				echo '<div class="alert-box standard">';
				echo $this->Html->nestedList($nodes_to_prune);
				echo '</div>';
			
				echo '<div class="alert-box standard">';
				echo __d('acl', 'Clicking the link will not change or remove permissions for actions ACOs that are not obsolete.');
				echo '</div>';
				
				echo '<div>';
				echo $this->Html->link($this->Html->image('/acl/img/design/clean.png') . ' ' . __d('acl', 'Prune'), '/admin/acl/acos/prune_acos/run', array('escape' => false, 'class'=>'button small success'));
				echo '</div>';
			}
			else
			{
				echo '<div class="alert-box standard">';
				echo $this->Html->image('/acl/img/design/tick.png') . ' ' . __d('acl', 'There is no ACO node to delete');
				echo '</div>';
			}
		}

		echo $this->element('design/footer');
		?>
	</div>
</div>
