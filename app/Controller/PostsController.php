<?php

/*namespace Post\Controller;
use app\Controller\AppController;*/
App::uses('AppController', 'Controller');

class PostsController extends AppController{

	public $uses = array('Post');
	//public $theme = 'testShital';

	public $helpers = array('Html', 'Form');

	//for index.ctp
	public function index_outer(){

		//debug($theme);
		$this->set('postsArr', $this->Post->find('all'));
	}

	//for view.ctp
	public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }

    //for add.ctp
    public function add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

    //for edit.ctp
    public function edit($id = null) {
	    if (!$id) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    $post = $this->Post->findById($id);
	    if (!$post) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    if ($this->request->is(array('post', 'put'))) {
	        $this->Post->id = $id;
	        if ($this->Post->save($this->request->data)) {
	            $this->Session->setFlash(__('Your post has been updated.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('Unable to update your post.'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $post;
	    }
	}

	//delete your post
	public function delete($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->Post->delete($id)) {
	        $this->Session->setFlash(
	            __('The post with id: %s has been deleted.', h($id))
	        );
	        return $this->redirect(array('action' => 'index'));
	    }
	}

}//PostsController ends
?>