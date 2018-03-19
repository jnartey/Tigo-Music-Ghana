<ul class="accordion">
    <li id="one">
		<?php $pageCount = AppController::countRows("Music"); ?>
        <a href="#one" <?php if($header == "Music"){echo 'class="active"';} ?>>Music<span>+</span></a>

        <ul class="sub-menu">
			<li><?php echo $this->Html->link(__(("<em>01</em>List Music<span>$pageCount</span>"), true), array('controller'=> 'music', 'action'=>'index', 'admin' => true), array('escape' => false)); ?></li>
			<li><?php //echo $this->Html->link(__(("<em>02</em>Add New Page<span>+</span>"), true), array('controller'=> 'pageContents', 'action'=>'add', 'admin' => true), array('escape' => false)); ?></li>
        </ul>
	</li>
</ul>