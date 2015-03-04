<?php
/**
* 
*/
APP::uses('AppController', 'Controller');
class JobsController extends AppController
{
	
	/*function __construct(argument)
	{
		# code...
	}*/

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'index', 'view', 'delete');
    }

	public function index(){
		 $this->Job->recursive = 0;
        $this->set('jobs', $this->paginate());
	}
}
?>