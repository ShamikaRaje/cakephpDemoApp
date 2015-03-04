<h1>Add Post</h1>
<?php 
echo $this->Form->create('Post');
//echo $this->Form->input('post-title');
 echo $this->element('textbox', array( "name" => "post-title", "id" => "post-title")); 
echo $this->Form->input('post_desc', array('rows' => '3'));
echo $this->element('dropdown', array(
								'name' => 'Rating', 
								'data' => array(
										'0' => '--Select--', 
										'1'=>'5', 
										'2'=>'4', 
										'3'=>'3',
										'4'=>'2',
										'5'=>'1'
										)
								)
);

echo $this->Form->end('Save Post');
?>
<h3>
	<?php echo $this->Html->link('Back', array('controller' => 'posts', 'action' => 'index') ); ?>
</h3>