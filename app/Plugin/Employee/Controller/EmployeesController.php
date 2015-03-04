<?php
App::uses('AppController', 'Controller');
class EmployeesController extends AppController{
	
	public $uses = array('Employee.Employee');

	/**
	 * [declare components]
	 */
	public $components = array('Paginator', 'RequestHandler');

	public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {
    	
        $this->set('employee_list', $this->Employee->find('all'));

        /*--------Code for serializing data -------*/
        //$serializeData = $this->Employee->find('all');
        //$this->set(compact('serializeData'));


        //-----------------Add Pagination to index page-------------------------------
        $this->paginate = array(
                // 'conditions' => array('Employee.Name LIKE' => 'J%'),
                 'limit' => 5
             );

        // we are using the 'Employee' model
	    $data = $this->paginate('Employee'); 
	     
	    // pass the value to our view.ctp
	    $this->set('data', $data);
	    //---------------Pagination Ends-------------------------------------
        
    }

    /**
	 * [add employee information]
	 */

    public function add(){
    	if ($this->request->is('post')) {
            $this->Employee->create();
            if ($this->Employee->save($this->request->data)) {
                $this->Session->setFlash(__('Your employee information has been saved.'));
        		return $this->redirect(array('action' => 'edit', $this->Employee->getLastInsertId()));
                //return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your employee information.'));
        }
    }

    public function edit($id = null) {
	    if (!$id) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    $employee = $this->Employee->findById($id);
	    if (!$employee) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    if ($this->request->is(array('post', 'put'))) {
	        $this->Employee->id = $id;
	        if ($this->Employee->save($this->request->data)) {
	            $this->Session->setFlash(__('Your post has been updated.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('Unable to update your post.'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $employee;
	    }
	}

	public function view($id = null){ 

		if(!$id){
			throw new NotFoundException(__('Invalid Employee'));
		}
		$employee = $this->Employee->findById($id);
		if (!$employee) {
            throw new NotFoundException(__('Invalid Employee'));
        }
        $this->set('employee', $employee);
	}

    //delete your post
	public function delete($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->Employee->delete($id)) {
	        $this->Session->setFlash(
	            __('The post with id: %s has been deleted.', h($id))
	        );
	        return $this->redirect(array('action' => 'index'));
	    }
	}

}
?>