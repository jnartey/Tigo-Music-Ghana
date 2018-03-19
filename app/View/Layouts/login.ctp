<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<?php 
		$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
		
		if($isiPad){ ?>
			<!-- Set the viewport width to device width for mobile -->
			<meta name="viewport" content="width=950, initial-scale=0.8, minimum-scale=0.8, maximum-scale=0.8, user-scalable=no" />
		<?php }else { ?>
			<!-- Set the viewport width to device width for mobile -->
			<meta name="viewport" content="width=device-width" />
	<?php } ?>
	
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('admin'.DS.'foundation.css');
		echo $this->Html->css('admin'.DS.'normalize.css');
		echo $this->Html->css('admin'.DS.'login.css');
		echo $this->Html->script('admin'.DS.'vendor'.DS.'custom.modernizr');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
	<!--[if lt IE 9]>
		<?php echo $this->Html->css('ie.css'); ?>
	<![endif]-->
	
	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	
		<?php echo $this->Session->flash(); ?>
    	<div class="login-bg">
            <?php echo $content_for_layout; ?>
		</div>
		<div class="large-12 columns footer">
			<?php echo $this->element('admin/cms_version'); ?>
		</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
<!-- Included JS Files -->
<?php
	echo $this->Html->script('admin'.DS.'vendor'.DS.'jquery');
	echo $this->Html->script('admin'.DS.'foundation.min');
?>
</html>
