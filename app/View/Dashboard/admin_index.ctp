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
	<div class="large-12 content">
		<div class="large-10 columns dashboard-content">
			<div class="large-4 columns">
			<?php 
				echo $this->Html->link(__((
				'<div class="large-2 columns hide-for-small">'.$this->Html->image("admin".DS."glyphicons_043_group.png", array("alt" => "")).'</div>'.
				'<div class="large-10 columns">Users<p>Manage Users and Groups</p></div>'
				), true), array('controller'=> 'users', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'dashboard-menu'));
			?>
			</div>
			<div class="large-4 columns">
			<?php 
				echo $this->Html->link(__((
				'<div class="large-2 columns hide-for-small">'.$this->Html->image("admin".DS."glyphicons_039_notes.png", array("alt" => "")).'</div>'.
				'<div class="large-10 columns">Pages<p>Update and manage pages</p></div>'
				), true), array('controller'=> 'pageContents', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'dashboard-menu'));
			?>
			</div>
			<div class="large-4 columns">
			<?php 
				echo $this->Html->link(__((
				'<div class="large-2 columns hide-for-small">'.$this->Html->image("admin".DS."glyphicons_138_picture.png", array("alt" => "")).'</div>'.
				'<div class="large-10 columns">Banners<p>Update and manage banners</p></div>'
				), true), array('controller'=> 'banners', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'dashboard-menu'));
			?>
			</div>
			<div class="large-4 columns">
			<?php 
				echo $this->Html->link(__((
				'<div class="large-2 columns hide-for-small">'.$this->Html->image("admin".DS."glyphicons_156_show_thumbnails.png", array("alt" => "")).'</div>'.
				'<div class="large-10 columns">Music<p>Update and manage music</p></div>'
				), true), array('controller'=> 'music', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'dashboard-menu'));
			?>
			</div>
			<div class="large-4 columns">
			<?php 
				echo $this->Html->link(__((
				'<div class="large-2 columns hide-for-small">'.$this->Html->image("admin".DS."glyphicons_156_show_thumbnails.png", array("alt" => "")).'</div>'.
				'<div class="large-10 columns">Videos<p>Update and manage videos</p></div>'
				), true), array('controller'=> 'videos', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'dashboard-menu'));
			?>
			</div>
			<div class="large-4 columns">
			<?php 
				echo $this->Html->link(__((
				'<div class="large-2 columns hide-for-small">'.$this->Html->image("admin".DS."glyphicons_158_show_lines.png", array("alt" => "")).'</div>'.
				'<div class="large-10 columns">Artists<p>Update and manage artists</p></div>'
				), true), array('controller'=> 'artists', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'dashboard-menu'));
			?>
			</div>
			<div class="large-4 columns">
			<?php 
				echo $this->Html->link(__((
				'<div class="large-2 columns hide-for-small">'.$this->Html->image("admin".DS."glyphicons_158_show_lines.png", array("alt" => "")).'</div>'.
				'<div class="large-10 columns">News<p>Update and manage News</p></div>'
				), true), array('controller'=> 'news', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'dashboard-menu'));
			?>
			</div>
			<div class="large-4 columns">
			<?php 
				echo $this->Html->link(__((
				'<div class="large-2 columns hide-for-small">'.$this->Html->image("admin".DS."glyphicons_158_show_lines.png", array("alt" => "")).'</div>'.
				'<div class="large-10 columns">Events<p>Update and manage events</p></div>'
				), true), array('controller'=> 'events', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'dashboard-menu'));
			?>
			</div>
			
		</div>
		<div class="large-2 columns live-updates">
			
		</div>
	</div>
</div>