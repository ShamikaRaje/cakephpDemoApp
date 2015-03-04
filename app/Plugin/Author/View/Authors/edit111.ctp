<?php
	echo $this->Form->create('Author');

	echo $this->Form->input('Name');
	echo $this->Form->input('Book_published');

	/*$createdOn = new \Kendo\UI\DatePicker('AuthorCreatedOn');
	$createdOn->attr('style', 'width: 160px')
	           ->format('yyyy/MM/dd');

	echo $createdOn->render();*/

	echo $this->Form->input('id', array('type' => 'hidden'));

	echo $this->Form->end('Submit');