<ul class="accordion">
    <li id="one">
		<?php $bannerCount = AppController::countRows("Banner"); ?>
        <a href="#one" <?php if($header == "Banners"){echo 'class="active"';} ?>>Banners<span><?php echo $bannerCount ?></span></a>

        <ul class="sub-menu">
			<li><?php echo $this->Html->link(__(("<em>01</em>List Banners<span>$bannerCount</span>"), true), array('controller'=> 'banners', 'action'=>'index', 'admin' => true), array('escape' => false)); ?></li>
			<li><?php //echo $this->Html->link(__(("<em>02</em>Add New Banner<span>+</span>"), true), array('controller'=> 'banners', 'action'=>'add', 'admin' => true), array('escape' => false)); ?></li>
        </ul>
	</li>
</ul>