<script>
	$(function() {
		//datepicker
		$('.report-date').datepick({ 
		    yearRange: '2000:2050', 
			showTrigger: '#calImg'});
	});
</script>
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
	<div class="large-2 columns">
		<?php echo $this->element('admin'.DS.'music_menu'); ?>
	</div>
	<div class="large-10 columns content">
		<?php echo $this->Session->flash(); ?>
		<div class="large-7 columns">
			<div class="row">
				<?php
									if($item_parent[0]['Music']['category']):
										echo $this->Html->link(__(("cancel"), true), array('controller'=> 'music', 'action'=>'view', $item_parent[0]['Music']['category'], 'admin' => true), array('escape' => false, 'class'=>'button small primary right')); 
									else:
										echo $this->Html->link(__(("cancel"), true), array('controller'=> 'music', 'action'=>'index', 'admin' => true), array('escape' => false, 'class'=>'button small primary right'));
									endif;
								?>
			</div><?php
							echo $this->Form->create('Music', array('type' => 'file'));
							if($parent['Music']['music_type'] == 0){
								echo '<div class="large-12 columns">';
								//echo "<p><label>Add Items</label>";
								//echo $this->Form->checkbox('add_content', array('value' => 1)).'</p>';
								
								echo $this->Form->input('name', array('label'=>false, 'placeholder'=>'Name'));
								
								$options = array(
						        	'1' => 'playlists',
						        	'2' => 'upcoming albums',
									'3' => 'tracks',
									'4' => 'theme days'
						        );
								echo '</div>';

						        echo '<div class="large-4 columns">'.$this->Form->input('music_type', array(
						        	'type'    => 'select',
						        	'options' => $options,
						        	'empty'   => false
						        )).'</div>';
							}
							
							if($parent['Music']['music_type'] == 1){
								
								if($parent['Music']['id'] == 3){
									$options = array(
							        	'1' => 'track',
							        	'2' => 'album'
							        );
							
									echo '<div class="large-4 columns">'.$this->Form->input('item_type', array(
							        	'type'    => 'select',
							        	'options' => $options,
							        	'empty'   => false
							        )).'<br /></div>';
								}
								
								echo '<div class="large-12 columns">';
								echo $this->Form->hidden('category', array('value'=>$parent['Music']['id']));
								echo $this->Form->input('name', array('label'=>false, 'placeholder'=>'Name'));
								echo $this->Form->input('deezer_link');
								echo $this->Form->hidden('music_type', array('value'=>$parent['Music']['music_type']));
								echo '</div>';
							}
							
							if($parent['Music']['music_type'] == 2){
								echo '<div class="large-12 columns">';
								echo $this->Form->hidden('category', array('value'=>$parent['Music']['id']));
								echo $this->Form->input('name', array('label'=>false, 'placeholder'=>'Name'));
								echo $this->Form->textarea('text', array('id'=>'editor', 'label'=>false, 'placeholder'=>'Add artist text'));
								echo '<br />';
								echo $this->Form->input('cover', array('type'=>'file', 'label'=>'Cover'));
								echo $this->Form->hidden('music_type', array('value'=>$parent['Music']['music_type']));
								echo '</div>';
							}
							
							if($parent['Music']['music_type'] == 3){
								echo '<div class="large-12 columns">';
								echo $this->Form->hidden('category', array('value'=>$parent['Music']['id']));
								echo $this->Form->input('name', array('label'=>false, 'placeholder'=>'Name'));
								echo $this->Form->input('track_name', array('label'=>false, 'placeholder'=>'Name'));
								echo $this->Form->input('track', array('type'=>'file', 'label'=>'Track'));
								echo $this->Form->hidden('music_type', array('value'=>$parent['Music']['music_type']));
								echo '</div>';
							}
							
							if($parent['Music']['music_type'] == 4){
								echo '<div class="large-12 columns">';
								echo $this->Form->hidden('category', array('value'=>$parent['Music']['id']));
								echo $this->Form->input('name', array('label'=>false, 'placeholder'=>'Name'));
								echo $this->Form->textarea('text', array('id'=>'editor', 'label'=>false, 'placeholder'=>'Add artist text'));
								echo '<br />';
								echo $this->Form->input('cover', array('type'=>'file', 'label'=>'Theme Poster'));
								echo $this->Form->hidden('music_type', array('value'=>$parent['Music']['music_type']));
								echo '</div>';
							}
							
							//echo $this->Form->input('url', array('label'=>false, 'placeholder'=>'Page URL eg: /pages/about'));
							echo $this->Form->hidden('cid', array('value'=>$rev));
							echo '<div class="large-12 columns">';
							echo '<br />';
						 	echo $this->Form->end('Add'); 
							echo '</div>';
						?>
		</div>
	</div>
</div>
