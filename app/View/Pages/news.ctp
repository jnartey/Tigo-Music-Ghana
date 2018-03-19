<?php echo $this->element('deezer_notification'); ?>
<div class="large-12 columns banner-i antialiased wow fadeIn">
	<?php
		$i=1;
		foreach($banners as $banner):
			if($i == 1){
				echo '<div class="banner-cover">';
				echo $this->html->image('banners'.DS.'thumb'.DS.'large'.DS.$banner['Banner']['banner_image'], array('alt' => 'tigo music Ghana', 'class'=>'left'));
				echo '</div>';
			}
			$i++;
		endforeach;
	?>
</div>
<div class="large-12 columns main-content antialiased">
	<?php
		echo $this->element('generic_submenu');
		
		if(!$article){
	?>
	
	<div class="content">
		<div class="row padded-content">
			<div class="large-12 columns title-bar">
				<div class="callout-i top-b wow pulse">
					<ul class="breadcrumbs">
					  <li class="current"><a href="#">news</a></li>
					</ul>
				</div>
			</div>
			<div class="large-8 columns left">
				<div class="large-12 columns ws">
				<?php
					
					function clean($string) {
					   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
					   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

					   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
					}
					
					foreach($news as $article):
						echo '<div class="item list d-menu">';
						echo '<div class="large-4 columns item-img-wrapper">';
						$string = $article['News']['title'];
						$regex = "@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?).*$)@";
						$cleaned = preg_replace($regex, ' ', $string);
						
						$cleaned = clean($cleaned);
						
				?>
				<a href="<?php echo $this->Html->url(DS.'pages'.DS.'news'.DS.$article['News']['id'].DS.$cleaned, true); ?>">
					<div class="item-img" style="background:url(<?php echo $this->Html->url(DS.'img'.DS.'news'.DS.'thumb'.DS.'small'.DS.$article['News']['image'], true) ?>) top left no-repeat; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->Html->url(DS.'img'.DS.'news'.DS.'thumb'.DS.'small'.DS.$article['News']['image'], true) ?>', sizingMethod='scale');
						    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $this->Html->url(DS.'img'.DS.'news'.DS.'thumb'.DS.'small'.DS.$article['News']['image'], true) ?>', sizingMethod='scale')"; zoom:1;">
					</div>
				</a>
				<?php
						echo '</div>';
						echo '<div class="large-8 columns item-text left">';
						echo '<h5><a class="d-menu" href="'.$this->Html->url(DS.'pages'.DS.'news'.DS.$article['News']['id'].DS.$cleaned, true).'">'.$article['News']['title'].'</a></h5>';
						$temp_cleaned_article = preg_replace('/<iframe.*?\/iframe>/i','', $article['News']['story']);
						$cleaned_article = strip_tags($temp_cleaned_article);
						echo '<p>';
						echo strlen($cleaned_article) >= 120 ? substr($cleaned_article, 0, 120) . ' ...'.$this->Html->link(__(('read more'), true), array('controller'=> 'pages', 'action'=>'news', $article['News']['id'], $cleaned), array('escape' => false, 'class'=>'read-more d-menu')) : $cleaned_article;
						echo '</p>';
						echo '<br />';
						echo '</div>';
						echo '<span class="tool-bar"><strong><span class="fa fa-clock-o"></span> <span class="text">'.date('jS F, Y', $article['News']['timestamp']).'</span></strong></span>';
						echo '</div>';
					endforeach;
				?>
				</div>
				<div class="large-12 columns">
					<div class="pagination right">
					<?php
					 	echo '<span class="unavailable"></span>'.$this->Paginator->prev(__('prev', true), array('class'=>'d-menu'), null, array('class'=>'unavailable'));
						echo $this->Paginator->numbers(array('class'=>'d-menu'));
						echo $this->Paginator->next(__('next', true), array('class'=>'d-menu'), null, array('class'=>'unavailable')).'<span class="unavailable"></span>';
					?>
					</div>
				</div>
			</div>
			<div class="large-4 columns feeds">
				<?php echo $this->element('twitter_feed'); ?>
			</div>
		</div>
	</div>
	<?php
		}else{
	?>
		<div class="content">
			<div class="row padded-content">
				<div class="large-12 columns title-bar">
					<div class="callout-i top-b wow pulse">
						<ul class="breadcrumbs">
						  <li><?php echo $this->Html->link(__(('news'), true), array('controller'=> 'pages', 'action'=>'news'), array('escape' => false, 'class'=>'d-menu')); ?></li>
						  <li class="current hide-for-small"><a href="#"><?php echo $article['News']['title']; ?></a></li>
						  <li class="current show-for-small"><a href="#"><?php echo strlen($article['News']['title']) >= 15 ? substr($article['News']['title'], 0, 15) . '...' : $article['News']['title']; ?></a></li>
						</ul>
					</div>
				</div>
				<div class="large-8 columns news-content left">
					<div class="large-12 columns">
					<?php
						if($article){
							echo '<div class="large-12 columns">'.$this->Html->link(__(('<span class="fa fa-long-arrow-left"></span> back'), true), array('controller'=> 'pages', 'action'=>'news'), array('escape' => false, 'class'=>'d-menu back left')).'</div>';
							echo '<h4 class="text-left">'.$article['News']['title'].'</h4>';
							echo '<span class="tool-bar"><strong><span class="fa fa-clock-o"></span> <span class="text">'.date('jS F, Y', $article['News']['timestamp']).'</span></strong></span>';
							if($article['News']['image']){
								echo $this->html->image('news'.DS.'thumb'.DS.'large'.DS.$article['News']['image'], array('alt' => 'tigo music Ghana', 'class'=>'left img-rs'));
							}
							echo $article['News']['story'];
						}else{
							echo '<p>No news available</p>';
						}
					?>
					</div>
				</div>
				<div class="large-4 columns feeds">
					<?php echo $this->element('twitter_feed'); ?>
				</div>
			</div>
		</div>
		
	<?php
		}
	?>
</div>