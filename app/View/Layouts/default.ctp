<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
<?php 
	$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
	$isiPhone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPhone');

if($isiPad){ ?>
	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=950, initial-scale=0.8, minimum-scale=0.8, maximum-scale=0.8, user-scalable=no" />
<?php }else { ?>
	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=0.8, minimum-scale=0.8, maximum-scale=0.8, user-scalable=no" />
	<meta name="HandheldFriendly" content="True" />
<?php } ?>
	<meta http-equiv="Cache-control" content="public" />
	<meta name="description" content="Tigo Music Hub, unlimited music, keeps you grooving everywhere. Over 38 millions songs can be accessed on the deezer service only on Tigo in Ghana"/>
	<!--<meta name="Abstract" content="tigo music hub tigo music unplugged my kinda music tigo music ghana"/>-->
	<meta name="author" content="Adrenalin Media"/>
	<!--<meta name="key Phrase" content="tigomusichub tigomusicunplugged mykindamusic tigomusicghana"/>-->
	<meta name="copyright" content="Tigo Music Ghana"/>
	<!--<meta name="distribution" content="Global"/>-->
	<meta name="keywords" content="music, tigo, deezer, ghana, videos, tigo music, music ghana, deezer app, unplugged listen, ghana unplugged, tigo music ghana, deezer app tigo, ghana unplugged listen, music ghana unplugged, app tigo music, latest music videos, trending music, ghana music"/>
	
	
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $main_page_title; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('tigomusic.plugins.css');
		echo $this->Html->css('style.css');

		echo $this->Html->css('admin'.DS.'style.css');
		echo $this->Html->script('vendor'.DS.'modernizr');
		echo $this->Html->script('vendor'.DS.'jquery');
		echo $this->Html->script('vendor'.DS.'jquery.countdown.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
	<script>
	  //videojs.options.flash.swf = "<?php echo $this->Html->url('/js/vendor/video-js.swf', true); ?>";
	
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-60840890-1', 'auto');
	  //ga('send', 'pageview');

	</script>
</head>
<body class="nobg">
	<div class="animsition">
	<?php 
		echo $this->element('head');
		echo '<div id="load-page" class="large-12 columns">';
		echo $this->fetch('content'); 
		echo '</div>';
		echo $this->element('footer'); 
		echo $this->element('admin'.DS.'menu'); 
	
		echo $this->Html->script('vendor'.DS.'tigomusic.min.plugins');
		echo $this->Html->script('vendor'.DS.'tigomusic');
		echo $this->Html->script('vendor'.DS.'jquery.lazyload.min');
		echo $this->Html->script('admin'.DS.'fancybox');
	?>
	</div>
	<script>window.twttr = (function (d, s, id) {
	  var t, js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src= "https://platform.twitter.com/widgets.js";
	  fjs.parentNode.insertBefore(js, fjs);
	  return window.twttr || (t = { _e: [], ready: function (f) { t._e.push(f) } });
	}(document, "script", "twitter-wjs"));</script>
</body>
<script>
	window.dzAsyncInit = function() {
		DZ.init({
			appId  : '146631',
			channelUrl : "<?php echo $this->Html->url('/files/deezer/channel.php', true); ?>",
			player : {
				onload : onPlayerLoaded
			}
		});
	};

	(function() {
		var e = document.createElement('script');
		e.src = 'http://cdn-files.deezer.com/js/min/dz.js';
		e.async = true;
		document.getElementById('dz-root').appendChild(e);
	}());
</script>
</html>
