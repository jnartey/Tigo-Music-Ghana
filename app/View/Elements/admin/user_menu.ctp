<ul class="accordion">

    <li id="one">
		<?php $userCount = AppController::countRows("User"); ?>
        <a href="#one" <?php if($header == "User Management"){echo 'class="active"';} ?>>Users<span><?php echo $userCount ?></span></a>

        <ul class="sub-menu">
			<li><?php echo $this->Html->link(__(("<em>01</em>List Users<span>$userCount</span>"), true), array('controller'=> 'users', 'action'=>'index', 'admin' => true), array('escape' => false)); ?></li>
			<li><?php echo $this->Html->link(__(("<em>02</em>Add New user<span>+</span>"), true), array('controller'=> 'users', 'action'=>'add', 'admin' => true), array('escape' => false)); ?></li>

        </ul>

    </li>

    <li id="two">
		<?php $roleCount = AppController::countRows("Role"); ?>
        <a href="#two" <?php if($header == "User Roles"){echo 'class="active"';} ?>>User Roles<span><?php echo $roleCount ?></span></a>

        <ul class="sub-menu">
			<li><?php echo $this->Html->link(__(("<em>01</em>List User Roles<span>$roleCount</span>"), true), array('controller'=> 'roles', 'action'=>'index', 'admin' => true), array('escape' => false)); ?></li>
			<li><?php echo $this->Html->link(__(("<em>02</em>Add New Role<span>+</span>"), true), array('controller'=> 'roles', 'action'=>'add', 'admin' => true), array('escape' => false)); ?></li>
        </ul>

    </li>

    <li id="three">

        <a href="#three" <?php if($header == "Advanced User Settings"){echo 'class="active"';} ?>>Advanced User Settings<span>$</span></a>

        <ul class="sub-menu">
			<li><?php echo $this->Html->link(__(("<em>01</em>User Permissions"), true), array('controller'=> 'acl', 'action'=>'aros', 'admin' => true), array('escape' => false)); ?></li>
			<li><?php echo $this->Html->link(__(("<em>02</em>User Actions"), true), array('controller'=> 'acl', 'action'=>'acos', 'admin' => true), array('escape' => false)); ?></li>
        </ul>

    </li>
</ul>