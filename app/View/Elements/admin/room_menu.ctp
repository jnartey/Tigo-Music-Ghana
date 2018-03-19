<ul class="accordion">
    <li id="one">
		<?php $pageCount = AppController::countRows("Room"); ?>
        <a href="#one" <?php if($header == "Pages"){echo 'class="active"';} ?>>Rooms<span>+</span></a>

        <ul class="sub-menu">
			<li><?php echo $this->Html->link(__(("<em>01</em>List Rooms<span>$pageCount</span>"), true), array('controller'=> 'rooms', 'action'=>'index', 'admin' => true), array('escape' => false)); ?></li>
			<li><?php echo $this->Html->link(__(("<em>02</em>Add New Rooms<span>+</span>"), true), array('controller'=> 'rooms', 'action'=>'add', 'admin' => true), array('escape' => false)); ?></li>
        </ul>
	</li>
</ul>