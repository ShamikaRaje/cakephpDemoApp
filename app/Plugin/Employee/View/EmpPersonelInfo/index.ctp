<?php 
    echo $this->Html->tag('h2', 'Employee Personel Information');
    echo $this->Html->link('Add Information', array('controller' => 'EmpPersonelInfo', 'action' => 'add')); 
?>
<table>
    <tr>
        <th><?php echo $this->Paginator->sort('Sr No', 'Sr No'); ?></th>
        <th><?php echo $this->Paginator->sort('Name', 'Name'); ?></th>
        <th><?php echo $this->Paginator->sort('Employee address', 'emp_addr'); ?></th>
        <th><?php echo $this->Paginator->sort('Nomineee Name', 'nominee_name'); ?></th>
        <th><?php echo $this->Paginator->sort('City', 'city'); ?></th>
        <th><?php echo $this->Paginator->sort('State', 'state'); ?></th>
        <th><?php echo $this->Paginator->sort('Country', 'country'); ?></th>
        <th><?php echo $this->Paginator->sort('Action', 'Action'); ?></th>
    </tr>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <?php $i =1; foreach ($empdata as $info): ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $info['Employee']['Name']; ?></td>
        <td><?php echo $info['EmpPersonelInfo']['emp_addr']; ?></td>
        <td><?php echo $info['EmpPersonelInfo']['nominee_name']; ?></td>
        <td><?php echo $info['City']['City_name']; ?></td>
        <td><?php echo $info['State']['State_name']; ?></td>
        <td><?php echo $info['Country']['Country_name']; ?></td>
        <td><?php echo $this->Html->link('Edit', array('action'=>'edit', $info['EmpPersonelInfo']['id'])); ?></td>
    </tr>
    <?php $i++; endforeach; ?>
    <?php unset($info); ?>
</table>

<?php echo $this->Paginator->numbers(); ?>    
<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>    
<?php echo $this->Paginator->counter(); ?>