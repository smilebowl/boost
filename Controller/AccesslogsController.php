<?php
App::uses('AppController', 'Controller');
/**
 * Accesslogs Controller
 *
 * @property Accesslog $Accesslog
 * @property PaginatorComponent $Paginator
 */
class AccesslogsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Accesslog->recursive = 0;
		$this->set('accesslogs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Accesslog->exists($id)) {
			throw new NotFoundException(__('Invalid accesslog'));
		}
		$options = array('conditions' => array('Accesslog.' . $this->Accesslog->primaryKey => $id));
		$this->set('accesslog', $this->Accesslog->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Accesslog->create();
			if ($this->Accesslog->save($this->request->data)) {
				$this->Session->setFlash(__('The accesslog has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accesslog could not be saved. Please, try again.'));
			}
		}
		$users = $this->Accesslog->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Accesslog->exists($id)) {
			throw new NotFoundException(__('Invalid accesslog'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Accesslog->save($this->request->data)) {
				$this->Session->setFlash(__('The accesslog has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accesslog could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Accesslog.' . $this->Accesslog->primaryKey => $id));
			$this->request->data = $this->Accesslog->find('first', $options);
		}
		$users = $this->Accesslog->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Accesslog->id = $id;
		if (!$this->Accesslog->exists()) {
			throw new NotFoundException(__('Invalid accesslog'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Accesslog->delete()) {
			$this->Session->setFlash(__('Accesslog deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Accesslog was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
