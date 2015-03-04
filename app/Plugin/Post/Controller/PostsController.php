<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController {
    
    public $uses = array('Post.Post');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    //display your posts
    public function index_new() {
        $posts = $this->Post->find('all');
        $this->set('postsData', $posts);
    }

    //Add your posts
    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
        }
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
                return $this->redirect(array('action' => 'index_new'));
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
            return $this->redirect(array('action' => 'index_new'));
        }
    }


    public function download(){
        $this->downloadZipFiles('auto-save-master.zip', 'auto-save-master', 'zip',  APP . 'Vendor' . DS); 
       // $this->downloadDocFiles('MediaQueries.odt', 'MediaQueries', 'odt',  APP . 'Vendor' . DS, 'application/vnd.oasis.opendocument.text, application/x-vnd.oasis.opendocument.text');
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }

        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function downloadZipFiles($zipId, $filename, $ext, $path) {
        $this->viewClass = 'Media';
        // Download app/outside_webroot_dir/example.zip ex:- APP . 'outside_webroot_dir' . DS
        //For zip file
        $params = array(
            'id'        => $zipId,
            'name'      => $filename,
            'extension' => $ext,
            'download'  => true,
            'path'      => $path
        );
        $this->set($params);
    }

    public function downloadDocFiles($zipId, $filename, $ext, $path, $mimetype = null) {
        $this->viewClass = 'Media';
        //for odt file
        $params = array(
                'id'        => $zipId,
                'name'      => $filename,
                'extension' => $ext,
                'download'  => true,
                'mimeType'  => array(
                    'docx' => $mimetype
                ),
                'path'      => $path
        );
        $this->set($params);
    }
}

?>