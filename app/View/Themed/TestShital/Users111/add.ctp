<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('pass', array('type' => 'password'));
        echo $this->Form->input('pass2', array('type' => 'password', 'label' => 'Repeat password'));
		echo $this->Form->input('name');
		echo $this->Form->input('location');
		echo $this->Form->input('address');
		echo $this->Form->input('email');
		echo $this->Form->input('web');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Jobs', true), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job', true), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
	</ul>
</div>