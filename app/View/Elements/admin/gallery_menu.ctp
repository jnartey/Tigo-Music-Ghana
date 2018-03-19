<ul class="accordion">
    <li id="one">
		<?php $galleryCount = AppController::countRows("Gallery"); ?>
        <a href="#one" <?php if($header == "Photo Gallery"){echo 'class="active"';} ?>>Photo Gallery<span><?php echo $galleryCount ?></span></a>

        <ul class="sub-menu">
			<li><?php echo $this->Html->link(__(("<em>01</em>List Galleries<span>$galleryCount</span>"), true), array('controller'=> 'galleries', 'action'=>'index', 'admin' => true), array('escape' => false)); ?></li>
			<li><?php //echo $this->Html->link(__(("<em>02</em>Add New Gallery<span>+</span>"), true), array('controller'=> 'galleries', 'action'=>'add', 'admin' => true), array('escape' => false)); ?></li>
        </ul>
	</li>
</ul>