<ul class="accordion">
    <li id="one">
		<?php $pageCount = AppController::countRows("Blog"); ?>
        <a href="#one" <?php if($header == "Blogs"){echo 'class="active"';} ?>>Blogs<span><?php echo $pageCount ?></span></a>

        <ul class="sub-menu">
			<li><?php echo $this->Html->link(__(("<em>01</em>List Blogs<span>$pageCount</span>"), true), array('controller'=> 'blogs', 'action'=>'index', 'admin' => true), array('escape' => false)); ?></li>
			<li><?php echo $this->Html->link(__(("<em>02</em>Add Blog<span>+</span>"), true), array('controller'=> 'blogs', 'action'=>'add', 'admin' => true), array('escape' => false)); ?></li>
        </ul>
	</li>
</ul>