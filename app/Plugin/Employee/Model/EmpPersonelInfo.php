<?php 
App::uses('AppModel', 'Model');


class EmpPersonelInfo extends AppModel{

	public $useTable = 'emp_personel_infos';

	public $primaryKey = 'id';

	public $actsAs = array('Containable');

    public $validate = array(
        
        'emp_id' => array(
            'required' => true, 
            'allowEmpty' => false
        ),
       
    );

	public $belongsTo = array(
        'City' => array(
            'className' => 'Employee.City',
            'foreignKey' => 'city'
        ),

        'State' => array(
            'className' => 'Employee.State',
            'foreignKey' => 'state'
        ),

        'Country' => array(
            'className' => 'Employee.Country',
            'foreignKey' => 'country'
        ),

        'Employee' => array(
            'className' => 'Employee.Employee',
            'foreignKey' => 'emp_id'
        ),
    );


}

