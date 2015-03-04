<?php
App::uses('AppModel', 'Model');

/**
* Model class Country
*/
class Country extends AppModel
{
	public $useTable = 'countries';

	public $primaryKey = 'id';

	public $actsAs = array('Containable');


	public $hasMany = array(
        'State' => array(
            'className' => 'Employee.State',
            'foreignKey' => 'Country_id'
        )
    );
}
?>