<div class="large-12 columns footer antialiased">
	<div class="row wow fadeIn">
		<div class="large-3 columns footer-item">
			<h2>site navigation</h2>
			<ul>
				<li><?php echo $this->Html->link(__(('home'), true), array('controller'=> 'pages', 'action'=>'index'), array('escape' => false, 'class'=>'d-menu')); ?></li>
				<li><?php echo $this->Html->link(__(('music'), true), array('controller'=> 'pages', 'action'=>'music'), array('escape' => false, 'class'=>'d-menu')); ?></li>
				<li><?php echo $this->Html->link(__(('videos'), true), array('controller'=> 'pages', 'action'=>'latest-videos'), array('escape' => false, 'class'=>'d-menu')); ?></li>
				<li><?php echo $this->Html->link(__(('artists'), true), array('controller'=> 'pages', 'action'=>'artists'), array('escape' => false, 'class'=>'d-menu')); ?></li>
				<li><?php echo $this->Html->link(__(('events'), true), array('controller'=> 'pages', 'action'=>'events'), array('escape' => false, 'class'=>'d-menu')); ?></li>
				<li><?php echo $this->Html->link(__(('news'), true), array('controller'=> 'pages', 'action'=>'news'), array('escape' => false, 'class'=>'d-menu')); ?></li>
			</ul>
		</div>
		<div class="footer-item">
			<h2>join tigo music</h2>
			<ul>
				<li><?php echo $this->Html->link(__(('how to access deezer'), true), array('controller'=> 'pages', 'action'=>'how-to-access-deezer'), array('escape' => false, 'class'=>'d-menu')); ?></li>
				<li><a target="_blank" href="http://www.deezer.com/">sign up</a></li>
				<li><a target="_blank" href="http://www.deezer.com/">login</a></li>
			</ul>
		</div>
		<div class="footer-item">
			<h2>about us</h2>
			<ul>
				<li><a target="_blank" href="http://www.tigo.com.gh/about-us-0">mission statement</a></li>
				<li><a target="_blank" href="http://www.tigo.com.gh/disclaimer">disclaimer</a></li>
			</ul>
		</div>
		<div class="footer-item">
			<h2>connect</h2>
			<ul>
				<li><a target="_blank" href="https://www.facebook.com/tigogh">facebook</a></li>
				<li><a target="_blank" href="https://twitter.com/TigoGhana">twitter</a></li>
				<li><a target="_blank" href="https://www.youtube.com/channel/UCrlPmoT-coNFefT_Z-fAYyQ">youtube</a></li>
			</ul>
		</div>
		<div class="large-12 columns">
			<p>&copy; 2014 Tigo Music. All Rights Reserved site by <a href="http://www.adrenalingh.com" target="_blank">Fifthlight Media</a>.</p>
		</div>
	</div>
</div>