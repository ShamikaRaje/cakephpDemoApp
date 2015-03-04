<?php 
App::uses('AppController', 'Controller');

class EmpPersonelInfoController extends AppController
{

	public $uses = array('Employee.Employee', 'Employee.EmpPersonelInfo', 'Employee.City', 'Employee.State', 'Employee.Country');

	/**
	 * [beforeFilter used to set login data for authorized users]
	 * @return [type] [description]
	 */
	
	public function beforeFilter() {
        parent::beforeFilter();
    }

	/* Load All states according to selected country */
	public function get_by_country() { 

		$country_id = $this->request->data['EmpPersonelInfo']['country'];
		$states = $this->State->find('all', array(
			'fields' =>array('State.id', 'State.State_name'),
			'conditions' => array('State.Country_id' => $country_id),
			'recursive' => -1
			));
		$stateArr = array();
		foreach ($states as $key => $dispState) {
			
			$key = $dispState['State']['id'];
			$stateArr[$key] = $dispState['State']['State_name'];
		}
		
 		//array_unshift($stateArr, '--Select--');
		$this->set('states',$stateArr);
		$this->layout = 'ajax';
	}

	/* Load All cities according to selected state */
	public function get_by_state() { 

		$state_id = $this->request->data['EmpPersonelInfo']['state'];
		$cities = $this->City->find('all', array(
			'fields' =>array('City.id', 'City.City_name'),
			'conditions' => array('City.State_id' => $state_id),
			'recursive' => -1
			));
		$citiesArr = array();
		foreach ($cities as $key => $dispCity) {
			
			$key = $dispCity['City']['id'];
			$citiesArr[$key] = $dispCity['City']['City_name'];
		}
		
 		//array_unshift($citiesArr, '--Select--');
 		//echo "<pre>"; print_r($citiesArr); exit;
		$this->set('cities',$citiesArr);
		$this->layout = 'ajax';
	}

	public function createArrInFormat($processArray, $modelName, $fieldName){
		$setArray = array();
		foreach ($processArray as $key => $value) { 	
			$key = $value[$modelName]['id']; 
			$setArray[$key] = $value[$modelName][$fieldName];
		}
		//array_unshift($setArray, '--Select--');
		return $setArray;
	}

	public function index(){
		
		$this->EmpPersonelInfo->recursive = 2;

		//----------Add Pagination to index page(With containable behaviour)----------//
        $this->paginate = array(
             'limit' => 2,
             'contain' => array(
		        'City'=>array(
		        	'fields' => array('id', 'City_name')
		        ),
		        'State' => array(
		            'fields' => array('id', 'State_name')
		        ),
		        'Country' => array(
		            'fields' => array('id', 'Country_name')
		        ),
		        'Employee' => array(
		            'fields' => array('id', 'Name')
		        ),
		    )
        );

        // we are using the 'EmpPersonelInfo' model
	    $empdata = $this->paginate('EmpPersonelInfo');
        //$empdata = '';
	    
	    if (!$empdata) {
	        //throw new NotFoundException('Could not find that employee records.');
	    	//echo //handle('EmpPersonelInfo1');
	    	//$this->autoRender(false);
	    	// $this->render('View/error404');
	    }

	    // pass the value to our view.ctp
	    $this->set('empdata', $empdata);
	    //---------------Pagination Ends-----------------------
	}

	public function add(){

		/*if($this->__isset('Employee')){ 
			echo "<pre>"; 
			print_r($this->__isset('Employee'));
			echo "true"; exit;
		}

		if($this->loadModel('Employee', 'id')){
			echo $this->modelClass; exit;
		}
		*/

		//load employees
		$empArr = $this->Employee->find('all',
			array('fields' => array('Employee.id', 'Employee.Name')
				));
		$setEmpArr = array();
		foreach ($empArr as $key => $emp_record) { 
			$key = $emp_record['Employee']['id'];
			$setEmpArr[$key] = $emp_record['Employee']['Name'];
		} 
		$this->set('employees', $setEmpArr);

		//load cities
		$cityArr = $this->City->find('all',
			array('fields' => array('City.id', 'City.City_name')
				));
		$cityArr = $this->createArrInFormat($cityArr, 'City', 'City_name');
		$this->set('cities', $cityArr);

		//load states
		$StateArr = $this->State->find('all',
			array('fields' => array('State.id', 'State.State_name')
				));
		$StateArr = $this->createArrInFormat($StateArr, 'State', 'State_name');
		$this->set('states', $StateArr);

		//load Countries
		$CountryArr = $this->Country->find('all',
			array('fields' => array('Country.id', 'Country.Country_name')
				));
		$CountryArr = $this->createArrInFormat($CountryArr, 'Country', 'Country_name');
		$this->set('countries', $CountryArr);

		/* Add Employee personel information */
    	if ($this->request->is('post')) { 
            $this->EmpPersonelInfo->create(); 
            if ($this->EmpPersonelInfo->save($this->request->data)) { 
                $this->Session->setFlash(__('Your employee information has been saved.'));
        		//return $this->redirect(array('action' => 'edit', $this->EmpPersonelInfo->getLastInsertId()));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your employee information.'));
        }
        //End
    }

    public function edit($id = null) {

    	//-----------------------load employees-----------------------
		$empArr = $this->Employee->find('all',
			array('fields' => array('Employee.id', 'Employee.Name')
				));
		$setEmpArr = array();
		foreach ($empArr as $key => $emp_record) { 
			$key = $emp_record['Employee']['id'];
			$setEmpArr[$key] = $emp_record['Employee']['Name'];
		} 
		$this->set('employees', $setEmpArr);

    	//-----------------------load cities-----------------------
		$cityArr = $this->City->find('all',
			array('fields' => array('City.id', 'City.City_name')
				));
		$cityArr = $this->createArrInFormat($cityArr, 'City', 'City_name');
		$this->set('cities', $cityArr);

		//-----------------------load states-----------------------
		$StateArr = $this->State->find('all',
			array('fields' => array('State.id', 'State.State_name')
				));
		$StateArr = $this->createArrInFormat($StateArr, 'State', 'State_name');
		$this->set('states', $StateArr);

		//-----------------------load Countries-----------------------
		$CountryArr = $this->Country->find('all',
			array('fields' => array('Country.id', 'Country.Country_name')
				));
		$CountryArr = $this->createArrInFormat($CountryArr, 'Country', 'Country_name');
		$this->set('countries', $CountryArr);

		/*----------------------- Edit Employee personel information----------------------- */
    	if (!$id) {
	        throw new NotFoundException(__('Invalid information'));
	    }

	    $employee = $this->EmpPersonelInfo->findById($id);
	    if (!$employee) {
	        throw new NotFoundException(__('Invalid information'));
	    }

	    /* Edit Employee personel information */
	    if ($this->request->is(array('post', 'put'))) {
	        $this->EmpPersonelInfo->id = $id;
	        if ($this->EmpPersonelInfo->save($this->request->data)) {
	            $this->Session->setFlash(__('Your post has been updated.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('Unable to update your post.'));
	    }
	    //End

	    if (!$this->request->data) {
	        $this->request->data = $employee;
	    }
	}

/**
* Provides backwards compatibility to avoid problems with empty and isset to alias properties.
* Lazy loads models using the loadModel() method if declared in $uses
*
* @param string $name
* @return void
*/
	public function __isset($name) {
		switch ($name) {
			case 'base':
			case 'here':
			case 'webroot':
			case 'data':
			case 'action':
			case 'params':
			return true;
		}

		if (is_array($this->uses)) {
			foreach ($this->uses as $modelClass) {
				list($plugin, $class) = pluginSplit($modelClass, true);
				if ($name === $class) {
				    return $this->loadModel($modelClass);
				}
			}
		}

		if ($name === $this->modelClass) {
			list($plugin, $class) = pluginSplit($name, true);
			if (!$plugin) {
			 	$plugin = $this->plugin ? $this->plugin . '.' : null;
			}
			return $this->loadModel($plugin . $this->modelClass);
		}
		return false;
	}
}