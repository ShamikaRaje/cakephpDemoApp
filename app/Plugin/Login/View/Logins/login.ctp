<!-- app/View/Users/login.ctp -->

<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('User Login'); ?>
        </legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
<?php echo $this->Html->link('User Registration', array('plugin'=>'user','controller' => 'users', 'action' => 'add') ); ?>
</div>