<h1>Add Employee Information</h1>
<?php
echo $this->Form->create('Employee');
echo $this->Form->input('Name');
echo $this->Form->input('Designation');
echo $this->Form->input('Salary');
echo $this->Form->input('Created');
echo $this->Form->end('Save Post');
?>
<h3>
<?php 
	echo $this->Html->link('Return Back', array('controller' => 'employees', 'action' => 'index')); 
?>
</h3>
