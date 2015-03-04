<?php

App::uses('AppModel', 'Model');
//App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            /*$passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );*/
            $this->data[$this->alias]['password'] = md5($this->data[$this->alias]['password']);
        }
        return true;
    }

    //public $virtualFields = array('userLoggedIn');

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            ),
            'uniqueUserName' => array(
                'rule' => 'isUnique',
                'message' => 'Username is already registered'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
}
?>