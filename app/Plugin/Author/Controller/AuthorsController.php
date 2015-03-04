<?php
App::uses('AppController', 'Controller');
class AuthorsController extends AppController
{
	//var $scaffold;
	
	var $name = 'Authors';

	public function setData(){
		header('Content-Type: application/json');
        $arr = array();
        $authors = $this->Author->find('all');

        foreach ($authors as $key => $author) {  
        	$arr[] = $author['Author'];
        }
		echo "{\"setData\":".json_encode($arr)."}";
		exit;
	}

    function index() {

    } 

	public function add(){
		if ($this->request->is('post')) {
            $this->Author->create();
           	$this->request->data['Author']['CreatedOn'] = $this->request->data['CreatedOn'];
           	unset($this->request->data['CreatedOn']);
           	//echo "<pre>"; print_r($this->request->data); exit;
            if ($this->Author->save($this->request->data)) {
                $this->Session->setFlash(__('Author information has been saved.'));
        		return $this->redirect(array('action' => 'edit', $this->Author->getLastInsertId()));
            }
            $this->Session->setFlash(__('Unable to add your employee information.'));
        }
	}

	public function edit($id = null) {
	    if (!$id) {
	        throw new NotFoundException(__('Invalid Author'));
	    }

	    $author = $this->Author->findById($id);
	    if (!$author) {
	        throw new NotFoundException(__('Invalid Author'));
	    }
	    //echo "<pre>"; print_r($author); exit;
	    if ($this->request->is(array('post', 'put'))) {
	        $this->Author->id = $id;

	        if ($this->Author->save($this->request->data)) {
	            $this->Session->setFlash(__('Author has been updated.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('Unable to update Author.'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $author;
	    }
	    $this->render('add');
	}

	public function view($id = null){ 

		if(!$id){
			throw new NotFoundException(__('Invalid Author'));
		}
		$author = $this->Author->findById($id);
		if (!$author) {
            throw new NotFoundException(__('Invalid Author'));
        }
        return $author;
       // $this->set('author', $author);
	}
}	
?>