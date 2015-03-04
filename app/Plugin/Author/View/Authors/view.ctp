<?php

	/*$myText = '1) For more information regarding our world-famous ' .
	'pastries and desserts, contact info@example.com';
	echo $linkedText = $this->Text->autoLinkEmails($myText); 


	$myText2 = '2) For more information regarding our world-famous pastries and desserts.contact info@example.com';	
	echo $formattedText = $this->Text->autoParagraph($myText2);*/

	/*echo $this->Text->highlight(
	    $myText2,
	    'using',
	    array('format' => '<span class="highlight">\1</span>')
	);*/
	
	
	$authorsData = $this->requestAction("authors/view/".$this->params['pass'][0]);
	
	/*echo "<pre>"; 
	print_r($this->params);
	print_r($authorsData);
	 exit;*/

?>