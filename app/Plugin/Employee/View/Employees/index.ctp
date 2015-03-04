<?php 
    /*Demo code for serializing data*/
    //echo json_encode(compact('serializeData')); exit;
?>
<h1>Employee List</h1>
<?php echo $this->Html->link('Add Employee', array('controller' => 'employees', 'action' => 'add')); ?>
   
<table>
    <tr>
        <th><?php echo $this->Paginator->sort('ID', 'id'); ?></th>
        <th><?php echo $this->Paginator->sort('Name', 'Name'); ?></th>
        <th><?php echo $this->Paginator->sort('Designation', 'Designation'); ?></th>
        <th><?php echo $this->Paginator->sort('Salary', 'Salary'); ?></th>
        <th><?php echo $this->Paginator->sort('Created', 'Created'); ?></th>
        <th><?php echo $this->Paginator->sort('Action', 'Action'); ?></th>
    </tr>
       <?php foreach($data as $employee): ?>
    <tr>
        <td><?php echo $employee['Employee']['id']; ?> </td>
        <td><?php echo $employee['Employee']['Name']; ?> </td>
        <td><?php echo $employee['Employee']['Designation']; ?> </td>
        <td><?php echo $employee['Employee']['Salary']; ?> </td>
        <td><?php echo $employee['Employee']['Created']; ?> </td>
        <td>
            <h5>
                <?php 
                    echo $this->Html->link(
                        'Edit',
                        array('action' => 'edit', $employee['Employee']['id'])
                    );
                ?>
                <?php
                    echo $this->Form->postLink(
                        'Delete',
                        array('action' => 'delete', $employee['Employee']['id']),
                        array('confirm' => 'Are you sure?')
                    );
                ?>
            </h5>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
   
<?php echo $this->Paginator->numbers(); ?>    
<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>    
<?php echo $this->Paginator->counter(); ?>