<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	/**
  * Build an array-based association from string.
  *
  * @param string $type 'belongsTo', 'hasOne', 'hasMany', 'hasAndBelongsToMany'
  * @param string $assocKey
  * @return void
  */
    protected function _generateAssociation($type, $assocKey) {
        $class = $assocKey;
        $dynamicWith = false;
        $assoc =& $this->{$type}[$assocKey];
 
        foreach ($this->_associationKeys[$type] as $key) {
            if (!isset($assoc[$key]) || $assoc[$key] === null) {
                $data = '';
 
                switch ($key) {
                    case 'fields':
                         $data = '';
                         break;
 
                     case 'foreignKey':
                         $data = (($type === 'belongsTo') ? Inflector::underscore($assocKey) : Inflector::singularize($this->table)) . '_id';
                         break;
 
                     case 'associationForeignKey':
                         $data = Inflector::singularize($this->{$class}->table) . '_id';
                         break;
 
                     case 'with':
                         $data = Inflector::camelize(Inflector::singularize($assoc['joinTable']));
                         $dynamicWith = true;
                         break;
 
                     case 'joinTable':
                         $tables = array($this->table, $this->{$class}->table);
                         sort($tables);
                        $data = $tables[0] . '_' . $tables[1];
                         break;
 
                     case 'className':
                         $data = $class;
                         break;
 
                    case 'unique':
                        $data = true;
                        break;
                }
 
                $assoc[$key] = $data;
             }
 
            if ($dynamicWith) {
                $assoc['dynamicWith'] = true;
            }
        }
    }
}
