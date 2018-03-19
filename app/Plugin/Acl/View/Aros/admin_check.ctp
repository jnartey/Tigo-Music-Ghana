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
					echo $this->element('Aros/links');

					if(count($missing_aros['roles']) > 0)
					{
						echo '<h3>' . __d('acl', 'Roles without corresponding Aro') . '</h3>';
			
						$list = array();
						foreach($missing_aros['roles'] as $missing_aro)
						{
							$list[] = $missing_aro[$role_model_name][$role_display_field];
						}
			
						echo $this->Html->nestedList($list);
					}


					if(count($missing_aros['users']) > 0)
					{
						echo '<h3>' . __d('acl', 'Users without corresponding Aro') . '</h3>';
			
						$list = array();
						foreach($missing_aros['users'] as $missing_aro){
							$list[] = $missing_aro[$user_model_name][$user_display_field];
						}
			
						echo $this->Html->nestedList($list);
					}


					if(count($missing_aros['roles']) > 0 || count($missing_aros['users']) > 0)
					{
						echo '<p>';
						echo $this->Html->link(__d('acl', 'Build'), '/admin/acl/aros/check/run');
						echo '</p>';
					}
					else
					{
						echo '<br /><div class="alert-box standard">';
						echo __d('acl', 'There is no missing ARO.');
						echo '</div>';
					}

					echo $this->element('design/footer');
		?>
	</div>
</div>
