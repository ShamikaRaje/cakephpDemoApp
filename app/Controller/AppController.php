<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
require_once APP.'webroot/lib/Kendo/Autoload.php'; 

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

class AppController extends Controller {

    public $theme = 'TestShital';	

    var $helpers = array('Html', 'Form', 'Js', 'Text');

    /**
     * components which are in use for application
     */

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'plugin' => 'user',
                'controller' => 'users',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'plugin' => 'login',
                'controller' => 'logins',
                'action' => 'login',
            ),
            'authenticate' => array( 'Form'   
            //, 'Basic'
                /*'Form' => array(
                   // 'passwordHasher' => 'Blowfish'
                )*/
            ),
           // 'authError' => 'Sorry! You do not have permission to access this page.',
        )
    );

    public function beforeFilter() {

        $this->Auth->allow('login');
        if ($this->params['controller'] == 'users') {
            $this->Auth->allow('add'); // or ('page1', 'page2', ..., 'pageN')
        }
        if ($this->Auth->loggedIn()) { 
            $this->setLoginData();
        }
    }

    public function afterFilter(){
        if ($this->Auth->loggedIn()) {
           $this->setLoginData();
       }
    }

/**
   * Loads and instantiates models required by this controller.
   * If the model is non existent, it will throw a missing database table error, as Cake generates
   * dynamic models for the time being.
   *
   * @param string $modelClass Name of model class to load
   * @param integer|string $id Initial ID the instanced model class should have
   * @return mixed true when single model found and instance created, error returned if model not found.
   * @throws MissingModelException if the model class cannot be found.
*/

    public function loadModel($modelClass = null, $id = null) {
		if ($modelClass === null) {
		  $modelClass = $this->modelClass;
		}

		$this->uses = ($this->uses) ? (array)$this->uses : array();
		if (!in_array($modelClass, $this->uses)) {
		  $this->uses[] = $modelClass;
		}

		list($plugin, $modelClass) = pluginSplit($modelClass, true);

		$this->{$modelClass} = ClassRegistry::init(array(
		  'class' => $plugin . $modelClass, 'alias' => $modelClass, 'id' => $id
		));
		if (!$this->{$modelClass}) {
		  throw new MissingModelException($modelClass);
		}
		return true;
	}

    public function isAuthorized($user) {

        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
          return true;
        }

        // Default deny
        return false;
    }

    /**
     * [setLoginData used to set login variable to check whether authorized user is logged in or not]
     */
    public function setLoginData(){
        Configure::write('USER_LOGGED_IN','logged_in_user');
        $this->Auth->allow('index','view','add', 'delete', 'logout');
    }
}
