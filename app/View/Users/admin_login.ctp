<?php
// echo $this->Form->create('User', array('action' => 'login'));
// echo $this->Form->inputs(array(
//     'legend' => __('Login'),
//     'username',
//     'password'
// ));
// echo $this->Form->end('Login');
    echo '<div class="large-2 center-login" >';
    echo $this->Form->create('User', array('action' => 'login'));
    echo $this->Form->input('username', array('placeholder' => 'Username', 'label' => ''));
    echo $this->Form->input('password', array('placeholder' => 'Password', 'label' => ''));
    echo $this->Form->end('Sign In');
    echo "</div>";
    
?>

