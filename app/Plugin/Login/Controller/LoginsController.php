<?php

App::uses('AppController', 'Controller');

class LoginsController extends AppController{

	public $uses = array('User.User');

	public function beforeFilter() {
        parent::beforeFilter();
    }

	public function login() {
		
        if ($this->request->is('post')) {  
            if ($this->Auth->login($this->request->data['User']['username'])) {
                $users = $this->User->find('all');
                foreach ($users as $key => $user) {
                    $userName[] = $user['User']['username'];
                    $passWord[] = $user['User']['password'];
                } 
                if(in_array($this->request->data['User']['username'], $userName) && in_array(md5($this->request->data['User']['password']), $passWord)){
                    //Configure::write('LOGGED_IN_USER_ROLE', $this->request->data['User']['username']);
                    return $this->redirect($this->Auth->redirect());
                }
                else{
                    $this->Session->setFlash(__('Invalid username or password, try again'));
                }
            }
            else{
                $this->Session->setFlash(__('Login failed, try again'));
            }
            
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
}
?>