<?php
App::uses('AppModel', 'Model');
/**
 * Accesslog Model
 *
 * @property User $User
 */
class Accesslog extends AppModel {


	public $actsAs = array('Search.Searchable');
	
	public $filterArgs = array(
        'controllername' => array('type' => 'like'),
        'actionname' => array('type' => 'like'),
        'user_id' => array('type' => 'value'),
        'param' => array('type' => 'like'),
        'logged_from' => array('type' => 'value', 'field' => 'logged >='),
        'logged_to' => array('type' => 'query', 'method' => 'toCondition'),
    );

 	public function toCondition($data = array()) {
        $end = $data['logged_to'];
		$cond = array('logged <=' => $end . ' 23:59:59');
        // $cond = array(
            // 'OR' => array(
                // $this->alias . '.title LIKE' => '%' . $filter . '%',
                // $this->alias . '.body LIKE' => '%' . $filter . '%',
            // ));
        return $cond;
    }
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => 'id,displayname',
			'order' => ''
		)
	);
}
