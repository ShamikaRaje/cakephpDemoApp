<h1>Blog posts</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Post Description</th>
        <th>Action</th>
    </tr>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <?php 
    foreach ($postsData as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['post-title'],array('controller' => 'posts', 'action' => 'view',  $post['Post']['id'])); ?>
        </td>
        <td><?php echo $post['Post']['post_desc']; ?></td>
        <td>
        	<h5>
				<?php 
					echo $this->Html->link(
	                    'Edit',
	                    array('action' => 'edit', $post['Post']['id'])
	                );
				?>
                <?php 
                    echo $this->Html->link(
                        'View',
                        array('action' => 'view', $post['Post']['id'])
                    );
                ?>
				<?php
                	echo $this->Form->postLink(
	                    'Delete',
	                    array('action' => 'delete', $post['Post']['id']),
	                    array('confirm' => 'Are you sure?')
	                );
            	?>
			</h5>
        </td>
    </tr>
    <?php endforeach; ?>
	<?php unset($post); ?>
</table>
<h3>
	<?php echo $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add') ); ?> 
</h3>
