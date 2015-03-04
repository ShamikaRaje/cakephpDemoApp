<?php

App::uses('AppModel', 'Model');

class Employee extends AppModel {

	public $useTable = 'employees';
	/*public $hasMany = array(
        'MyEmployeePeronelInfo' => array(
            'className' => 'EmployeePeronelInfo',
            'foreignKey' => 'emp_id',
            'fields' => array('emp_addr','nominee_name'),
        )
    );*/
}
?>