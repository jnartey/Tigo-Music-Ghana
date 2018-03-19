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
						echo $this->element('design/header', array('no_acl_links' => true));
					?>
		<div class="error">
			<?php
				echo '<div class="alert-box alert">' . __d('acl', 'Some controllers have been modified, resulting in actions that are not referenced as ACO in the database or ACO records that are obsolete') . ' :</div>';
				
				if(count($missing_aco_nodes) > 0)
				{
					echo '<div class="alert-box alert">' . __d('acl', 'Missing ACOs') . '</div>';
				
					echo '<div class="alert-box standard">';
					echo $this->Html->nestedList($missing_aco_nodes);
					echo '</div>';
				}
				
				if(count($nodes_to_prune) > 0)
				{
					echo '<div class="alert-box alert">' . __d('acl', 'Obsolete ACOs') . '</div>';
					
					echo '<div class="alert-box standard">';
					echo $this->Html->nestedList($nodes_to_prune);
					echo '</div>';
				}
				
				echo '<div class="alert-box standard">';
				echo __d('acl', 'You can update the ACOs by clicking on the following link') . ' : ';
				echo $this->Html->link(__d('acl', 'Synchronize ACOs'), '/admin/acl/acos/synchronize/run');
				echo '</div>';
				
				echo '<div class="alert-box standard">';
				echo __d('acl', 'Please be aware that this message will appear only once. But you can always rebuild the ACOs by going to the ACO tab.');
				echo '</div>';
				?>
		</div><?php
		echo $this->element('design/footer');
		?>
	</div>
</div>
