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
		<div class="separator"></div>
		<div class="panel">
			<p>
				Powerful things require access control. Access control lists are a way to manage application permissions in a fine-grained, yet easily maintainable and manageable way.<br>
				<br>
				Access control lists, or ACL, handle two main things: things that want stuff, and things that are wanted. In ACL lingo, things (most often users) that want to use stuff are called access request objects, or AROs. Things in the system that are wanted (most often actions or data) are called access control objects, or ACOs. The entities are called 'objects' because sometimes the requesting object isn't a person - sometimes you might want to limit the access certain Cake controllers have to initiate logic in other parts of your application. ACOs could be anything you want to control, from a controller action, to a web service, to a line on your grandma's online diary.
			</p>
		</div><?php
						echo $this->element('design/footer');
					?>
	</div>
</div>
