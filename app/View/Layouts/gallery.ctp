<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="Description" content="Telecoms Chamber" />
	<meta name="KeyWords" content="Telecoms Chamber" />
	<meta name="revisit-after" content="2 days" />
	<meta name="robots" content="index, follow" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en-US" />
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="-1" />
	
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo "Ghana Chamber of Telecommunications | ".$title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		
		//echo $this->Html->css('foundation.css');
		echo $this->Html->css('style-gallery.css');
		echo $this->Html->css('style.css');
		echo $this->Html->css('app.css');
		echo $this->Html->script('modernizr.foundation');
		echo $this->Html->script('jquery.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
	<script>
	//<![CDATA[
	$(document).ready(function() {

		//fade in
		$("body").fadeIn(1000);
		
	});
	//]]>
	</script>
	<!--[if IE]>
	    <?php echo $this->Html->css('style-ie.css'); ?>
	<![endif]-->
	
	<link rel="stylesheet" type="text/css" href="<?php echo $this->Html->url('/fancyapps/source/jquery.fancybox.css?v=2.0.6', true); ?>" media="screen" />
	
	<!--[if lt IE 9]>
		<?php echo $this->Html->css('ie.css'); ?>
	<![endif]-->
	
	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body class="gallery-bg">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
	<?php //echo $this->element('sql_dump'); ?>
</body>
<!-- Included JS Files -->
<?php
	echo $this->Html->script('preloadCssImages.jQuery_v5');
	echo $this->Html->script('jquery.galleriffic');
	echo $this->Html->script('jquery.opacityrollover');
?>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="<?php echo $this->Html->url('/fancyapps/lib/jquery.mousewheel-3.0.6.pack.js', true); ?>"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo $this->Html->url('/fancyapps/source/jquery.fancybox.js?v=2.0.6', true); ?>"></script>
<?php echo $this->Html->script('app'); ?>
<script type="text/javascript">
	$(document).ready(function($) {
		// We only want these styles applied when javascript is enabled
		//$('div.navigation').css({'width' : '300px', 'float' : 'left'});
		$('div.content').css('display', 'block');

		// Initially set opacity on thumbs and add
		// additional styling for hover effect on thumbs
		var onMouseOutOpacity = 0.67;
		$('#thumbs ul.thumbs li').opacityrollover({
			mouseOutOpacity:   onMouseOutOpacity,
			mouseOverOpacity:  1.0,
			fadeSpeed:         'fast',
			exemptionSelector: '.selected'
		});

		// Initialize Advanced Galleriffic Gallery
		var gallery = $('#thumbs').galleriffic({
			delay:                     4500,
			numThumbs:                 14,
			preloadAhead:              28,
			enableTopPager:            false,
			enableBottomPager:         true,
			maxPagesToShow:            2,
			imageContainerSel:         '#slideshow',
			controlsContainerSel:      '#controls',
			captionContainerSel:       '#caption',
			loadingContainerSel:       '#loading',
			renderSSControls:          true,
			renderNavControls:         true,
			playLinkText:              'Play',
			pauseLinkText:             'Pause',
			prevLinkText:              '',
			nextLinkText:              '',
			nextPageLinkText:          'Next',
			prevPageLinkText:          '&lsaquo;',
			enableHistory:             false,
			autoStart:                 true,
			syncTransitions:           true,
			defaultTransitionDuration: 1000,
			onSlideChange:             function(prevIndex, nextIndex) {
				// 'this' refers to the gallery, which is an extension of $('#thumbs')
				this.find('ul.thumbs').children()
					.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
					.eq(nextIndex).fadeTo('fast', 1.0);
			},
			onPageTransitionOut:       function(callback) {
				this.fadeTo('fast', 0.0, callback);
			},
			onPageTransitionIn:        function() {
				this.fadeTo('fast', 1.0);
			}
		});
	});
</script>
</html>
