	<div class="large-3 columns version hide-for-small">
		<?php echo $this->element('admin/cms_version'); ?>
	</div>
	<div class="large-1 columns dashboard-link text-right">
		<?php 
			if($current_page != 'Dashboard'){
				echo $this->Html->link(__((
				$this->Html->image("admin".DS."glyphicons_020_home.png", array("alt" => "Dashboard", 'title'=>'Dashboard'))
				), true), array('controller'=> 'dashboard', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>''));
			}
		?>
	</div>