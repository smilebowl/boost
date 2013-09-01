<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	/**
	 * 承認
	 */
	public function isAuthorized($user) {
		// parent::isAuthorized($user);
//		if (isset($user['role']) && $user['role'] != 'admin' && ($this -> view == 'add' || $this -> view == 'delete')) {
//			$this -> Session -> setFlashError(__('Permission denied.'));
//			return false;
//		}
//		return true;
	}

	public function login() {
		if ($this -> request -> is('post')) {
			if ($this -> Auth -> login()) {
				$this -> redirect($this -> Auth -> redirect()); // cake bug => Missing Controller
//				$this -> redirect(array('controller'=>'users','action' => 'index'));
			} else {
				$this -> Session -> setFlashError(__('Invalid username or password, try again'));
			}
		}
	}

	public function logout() {
		$this -> redirect($this -> Auth -> logout());
	}

	public function beforeFilter() {
		if ($this -> Auth -> user('role') == 'admin' &&  in_array($this->action, array('index','view'))) {
			$this->User->Behaviors->detach('SoftDelete');
		}	
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this -> Auth -> user('role') != 'admin') {
			throw new ForbiddenException(__('Permission denied.'));
		}
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlashInfo(__('The user has been saved.') );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlashError(__('The user could not be saved. Please, try again.') );
			}
		}
		$this->set('roles', Configure::read('Users.roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this -> Auth -> user('role') != 'admin' && $id != $this -> Auth -> user('id')) {
			throw new ForbiddenException(__('Permission denied.'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			// パスワード入力時のみ更新
			if (empty($this -> request -> data['User']['password'])) {
				unset($this -> request -> data['User']['password']);
			}
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlashInfo(__('The user has been saved.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlashError(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$this->set('roles', Configure::read('Users.roles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this -> Auth -> user('role') != 'admin') {
			throw new ForbiddenException(__('Permission denied.'));
		}
		
		$this->request->onlyAllow('post', 'delete');
		if (!$this->User->delete()) {
			$this->Session->setFlashInfo(__('User deleted.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlashError(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
