<?php echo $this->element('deezer_notification'); ?>
<div class="large-12 columns banner-i antialiased wow fadeIn">
	<?php
		$i=1;
		foreach($banners as $banner):
			if($i == 1){
				echo '<div class="banner-cover">';
				echo $this->html->image('banners'.DS.'thumb'.DS.'large'.DS.$banner['Banner']['banner_image'], array('alt' => 'tigo music', 'class'=>'left'));
				echo '</div>';
			}
			$i++;
		endforeach;
	?>
</div>
<div class="large-12 columns main-content antialiased">
	<?php
		echo $this->element('generic_submenu');
	?>
	
	<div class="content">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top-b wow pulse">
					<ul class="breadcrumbs">
					  <li><a href="#"><?php echo $title_for_layout; ?></a></li>
					</ul>
				</div>
			</div>
			<div class="large-7 columns extra-content">
				<div class="large-12 columns download-app">
					<?php
						echo '<a href="http://www.windowsphone.com/s?appid=abf78126-7301-e011-9264-00237de2db9e" target="_blank" class="ls-l">'.$this->Html->image('windows.png', array('alt' => 'tigo music ghana', 'class'=>'app-item')).'</a>
						<a href="http://appworld.blackberry.com/webstore/content/4624?" target="_blank" class="ls-l">'.$this->Html->image('blackberry.png', array('alt' => 'tigo music', 'class'=>'app-item')).'</a>
						<a href="https://play.google.com/store/apps/details?id=deezer.android.app" target="_blank">'.$this->Html->image('android.png', array('alt' => 'tigo music', 'class'=>'app-item')).'</a>
						<a href="https://itunes.apple.com/en/app/deezer/id292738169?" target="_blank" class="ls-l">'.$this->Html->image('apple.png', array('alt' => 'tigo music', 'class'=>'app-item')).'</a>';
					?>
				</div>
			<?php
				if($how_to_access){
					echo $how_to_access['PageContent']['content'];
				}else{
					echo '<p>No content available</p>';
				}
			?>
			</div>
			<div class="large-5 columns faq">
				<h3>faq</h3>
				<dl class="accordion" data-accordion>
					<?php
						$i = 1;
						foreach($faqs as $faq):
							
							$string = str_replace(' ', '-', $faq['PageContent']['title']); // Replaces all spaces with hyphens.
							$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

							$cleaned = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
							
							if($i == 1){
								$active = 'active';
							}else{
								$active = null;
							}
							
							echo '<dd class="accordion-navigation '.$active.'">';
							echo '<a href="#'.$cleaned.'">'.$i.'. '.$faq['PageContent']['title'].'</a>';
							echo '<div id="'.$cleaned.'" class="content '.$active.'">';
							echo $faq['PageContent']['content'];
							echo '</div>';
							echo '</dd>';
							$i++;
						endforeach;
					?>
				</dl>
			</div>
		</div>
	</div>
</div>