<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('post-title');
echo $this->Form->input('post_desc', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>
<h3>
	<?php echo $this->Html->link('Back', array('controller' => 'posts', 'action' => 'index') ); ?>
</h3>