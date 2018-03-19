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
				?>
		<div class="large-8 columns">
			<br>
			<?php
						echo $this->Form->create('User', array('url' => array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'admin_users')));
						echo "<label>". __d('acl', 'name')."</label>";
						echo $this->Form->input($user_display_field, array('label' => false, 'div' => false));
						echo $this->Form->end(array('label' =>__d('acl', 'filter'), 'div' => false));
						echo '<br/>';
					?>
		</div>
		<div class="large-12 columns">
			<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<?php
									$column_count = 1;
						
									$headers = array($this->Paginator->sort($user_display_field, __d('acl', 'name')));
						
									foreach($roles as $role)
									{
										$headers[] = $role[$role_model_name][$role_display_field];
										$column_count++;
									}
						
									echo $this->Html->tableHeaders($headers);
						
									?>
				</tr><?php
								foreach($users as $user){
									$style = isset($user['Aro']) ? '' : ' class="line_warning"';
					
									echo '<tr' . $style . '>';
									echo '  <td>' . $user[$user_model_name][$user_display_field] . '</td>';
					
									foreach($roles as $role){
										if(isset($user['Aro']) && $role[$role_model_name][$role_pk_name] == $user[$user_model_name][$role_fk_name])
										{
											echo '  <td>' . $this->Html->image('/acl/img/design/tick.png') . '</td>';
										}else{
											$title = __d('acl', 'Update the user role');
											echo '  <td>' . $this->Html->link($this->Html->image('/acl/img/design/tick_disabled.png'), '/admin/acl/aros/update_user_role/user:' . $user[$user_model_name][$user_pk_name] . '/role:' . $role[$role_model_name][$role_pk_name], array('title' => $title, 'alt' => $title, 'escape' => false)) . '</td>';
										}
									}
					
					//echo '  <td>' . (isset($user['Aro']) ? $this->Html->image('/acl/img/design/tick.png') : $this->Html->image('/acl/img/design/cross.png')) . '</td>';
					
						echo '</tr>';
					}
				?>
				<tr>
					<td class="paging" colspan="<?php echo $column_count ?>">
						<?php echo $this->Paginator->prev('<< ' . __d('acl', 'previous'), array(), null, array('class'=>'unavailable'));?>| <?php echo $this->Paginator->numbers(array('modulus' => 5, 'first' => 2, 'last' => 2, 'after' => ' ', 'before' => ' '));?> | <?php echo $this->Paginator->next(__d('acl', 'next') . ' >>', array(), null, array('class' => 'unavailable'));?>
					</td>
				</tr>
			</table><?php
			if($missing_aro){
			?>
			<div style="margin-top:20px">
				<p class="warning">
					<?php echo __d('acl', 'Some users AROS are missing. Click on a role to assign one to a user.') ?>
				</p>
			</div><?php
			}

			echo $this->element('design/footer');
			?>
		</div>
	</div>
</div>
