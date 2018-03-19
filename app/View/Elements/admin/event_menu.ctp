<ul class="accordion">
    <li id="one">
		<?php $pageCount = AppController::countRows("Event"); ?>
        <a href="#one" <?php if($header == "Events"){echo 'class="active"';} ?>>Events<span><?php echo $pageCount ?></span></a>

        <ul class="sub-menu">
			<li><?php echo $this->Html->link(__(("<em>01</em>List Events<span>$pageCount</span>"), true), array('controller'=> 'events', 'action'=>'index', 'admin' => true), array('escape' => false)); ?></li>
			<li><?php echo $this->Html->link(__(("<em>02</em>Add New Event<span>+</span>"), true), array('controller'=> 'events', 'action'=>'add', 'admin' => true), array('escape' => false)); ?></li>
        </ul>
	</li>
</ul>