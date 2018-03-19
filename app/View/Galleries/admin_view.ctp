<!-- File: /app/View/Galleries/admin_view.ctp -->
	<div class="row">
		<div class="large-12 columns">
			<div class="module yellow">
				<h2><?php echo $current_page.$gallery['Gallery']['name']; ?> <a href="#"><?php echo $header; ?></a></h2>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-2 columns admin-left-panel">
			<?php echo $this->element('admin'.DS.'gallery_menu'); ?>
		</div>
		<div class="large-10 columns content">
			<?php echo $this->Session->flash(); ?>
			<div class="row">
				<div class="large-12 columns">
					<?php echo $this->Html->link(__(("&lsaquo; back"), true), array('controller'=> 'galleries', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small primary')); ?>
					<?php echo $this->Html->link(__(("+ Upload Image(s)"), true), array('controller'=> 'images', 'action'=>'add', $gallery['Gallery']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?>
					<?php echo $this->Html->link(__(("Edit Gallery"), true), array('controller'=> 'galleries', 'action'=>'edit', $gallery['Gallery']['id'], 'admin' => true), array('escape' => false, 'class'=>'button small secondary')); ?>
					<?php echo $this->Form->postLink(__("Delete", true), array('controller'=> 'galleries', 'action'=>'delete', $gallery['Gallery']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button small alert'), sprintf(__('Are you sure you want to delete '.$gallery['Gallery']['name'].'?', true), $gallery['Gallery']['id'])); ?>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<?php if($gallery['Image']): ?>
						<?php foreach($images as $image): ?>
						<div class="large-3 columns thumbs left">
							<div class="th radius text-center" href="#">
							<span class="top-buttons">
							<?php
							 	echo " ".$this->Html->link(__(("Change image"), true), array('controller'=> 'images', 'action'=>'edit', $image['Image']['id'], $gallery['Gallery']['id'], 'admin' => true), array('escape' => false, 'class'=>'button tiny secondary'));
								echo " ".$this->Form->postLink(__("Delete", true), array('controller'=> 'images', 'action'=>'delete', $image['Image']['id'], $gallery['Gallery']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny alert'), sprintf(__('Are you sure you want to delete '.$image['Image']['name'].'?', true), $image['Image']['id']));
								if($image['Image']['default_img'] == 1){
									echo '<span class="button tiny secondary">Default</span>';
								}else{
									echo " ".$this->Form->postLink(__("Set default", true), array('controller'=> 'images', 'action'=>'set_default', $gallery['Gallery']['id'], $image['Image']['id'], 'admin' => true), array('escape'=>false, 'class'=>'button tiny primary'), sprintf(__('Are you sure you want to set this photo as default?', true), $image['Image']['id'])); 
								}
								
								echo "</span><br />";
								echo '<div class="imgs">';
								echo $this->Html->image("photogallery".DS."thumb".DS."small".DS.$image['Image']['img_file'], array(
							    "alt" => "",
							    /*'url' => array('controller' => 'images', 'action' => 'view', $image['Image']['id'])*/
								));
								echo '</div>';
								?><br />
								<div class="edit_name" id="<?php echo $image['Image']['id']; ?>">
								<span id="image_<?php echo $image['Image']['id']; ?>" class="text">
									<?php
										if($image['Image']['name']):
											echo $image['Image']['name'];
										else:
											echo "No title";
										endif;
									?>
								</span> 
								<input type="text" placeholder="<?php if($image['Image']['name']): echo $image['Image']['name']; else: echo "No title"; endif; ?>" class="editbox" id="image_input_<?php echo $image['Image']['id']; ?>"/>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					<?php else: 
						echo '<br /><div class="large-6"><div class="panel">
								No images available in '.$gallery['Gallery']['name'].
							 '</div></div>';
						 endif; 
					?>
					</div>
					<div class="row">
						<div class="pagination">
							<?php echo '<span class="unavailable">&laquo;</span>'.$this->Paginator->prev(__('prev', true), array(), null, array('class'=>'unavailable'));?><?php echo $this->Paginator->numbers();?><?php echo $this->Paginator->next(__('next', true), array(), null, array('class'=>'unavailable')).'<span class="unavailable">&raquo;</span>';?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
	//Live edit for gallery
	$(".editbox").hide();
	
	$(".edit_name").click(function(){
		var ID=$(this).attr('id');
		$("#image_"+ID).hide();
		$("#image_input_"+ID).show();
	}).change(function(){
		var ID=$(this).attr('id');
		var last=$("#image_input_"+ID).val();
		var dataString = 'id='+ ID +'&name='+last;
	//$("#image_"+ID).html('edit'); // Loading image

	if(last.length > 0)
	{
		$.ajax({
			type: "POST",
			url: "<?php echo $this->Html->url(DS.'admin'.DS.'images'.DS.'ajax_edit', true); ?>",
			data: dataString,
			cache: false,
			success: function(html){
				$("#image_"+ID).html(last);
		}});
	}else{
		alert('Enter something.');
	}

	});

	// Edit input box click action
	$(".editbox").mouseup(function() 
	{
		return false
	});

	// Outside click action
	$(document).mouseup(function()
	{
		$(".editbox").hide();
		$(".text").show();
	});
});
</script>