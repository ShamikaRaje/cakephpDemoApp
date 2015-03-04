<?php
App::uses('AppModel', 'Model');

/**
* Model class State
*/
class State extends AppModel
{
	
	public $useTable = 'states';

	public $primaryKey = 'id';

	public $actsAs = array('Containable');

	public $hasMany = array(
        'City' => array(
            'className' => 'Employee.City',
            'foreignKey' => 'State_id'
        )
    );

}
?>