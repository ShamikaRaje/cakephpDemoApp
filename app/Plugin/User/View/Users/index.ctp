<h1>Users Listing</h1>
<table>
    <tr>
        <th>Username</th>
        <th>Role</th>
        <th>Created On</th>
    </tr>
    <!-- Here is where we loop through our $users array, printing out users info -->
    <?php foreach ($users as $user): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($user['User']['username'],array('controller' => 'Users', 'action' => 'view',  $user['User']['id'])); ?>
        </td>
        <td><?php echo $user['User']['role']; ?></td>
        <td><?php echo $user['User']['created']; ?></td>
        <td>
        	<h5>
                <?php 
                    echo $this->Html->link(
                        'View',
                        array('action' => 'view', $user['User']['id'])
                    );
                ?>
				<?php 
					echo $this->Html->link(
	                    'Edit',
	                    array('action' => 'edit', $user['User']['id'])
	                );
				?>
				<?php
                	echo $this->Form->PostLink(
	                    'Delete',
	                    array('action' => 'delete', $user['User']['id']),
	                    array('confirm' => 'Are you sure?')
	                );
            	?>
			</h5>
        </td>
    </tr>
    <?php endforeach; ?>
	<?php unset($user); ?>
</table>
<h3>
	<?php //echo $this->Html->link('Add User', array('controller' => 'users', 'action' => 'add') ); ?>
</h3>
