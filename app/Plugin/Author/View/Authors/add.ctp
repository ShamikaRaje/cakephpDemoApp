<?php
	echo $this->Form->create('Author');

    if($this->action == "edit"){
        echo $this->Form->input('id');
    }

	echo $this->Form->input('Name');
	echo $this->Form->input('Book_published');

	$createdOn = new \Kendo\UI\DatePicker('CreatedOn');
	$createdOn->value(new DateTime('', new DateTimeZone('UTC')))
	           ->attr('style', 'width: 150px')

	           ->format('yyyy/MM/dd');

	echo $createdOn->render();

	echo $this->Form->end('Submit');


//echo $this->Form->input('post_desc', array('rows' => '3'));
 	/*//kendo datepicker
    $datePicker = new \Kendo\UI\DatePicker('datepicker');

    $datePicker->value(new DateTime('10/10/2011', new DateTimeZone('UTC')))
           ->attr('style', 'width: 150px');

    echo $datePicker->render();
    echo "<br><br>";*/


    // kendo calender
    /*$calender = new \Kendo\UI\Calendar('MyCalender');
    echo $calender->render();
    echo "<br><br>";*/

    //kendo monthpicker
    /*$monthPicker = new \Kendo\UI\DatePicker('monthpicker');
    $monthPicker->value(new DateTime('November 2011', new DateTimeZone('UTC')))
            ->start('year')
            ->depth('year')
            ->format('MMMM yyyy')
            ->attr('style', 'width: 150px');

    echo $monthPicker->render();
    echo "<br>";*/
