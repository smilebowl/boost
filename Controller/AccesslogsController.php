<?php
App::uses('AppController', 'Controller');
/**
 * Accesslogs Controller
 *
 * @property Accesslog $Accesslog
 */
class AccesslogsController extends AppController {

	public $presetVars = true; // using the model configuration
	public $components = array('Search.Prg');
	 
	public $paginate = array('order'=>'logged desc');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		
		$this->Prg->commonProcess();
		$this->paginate['conditions'] = $this->Accesslog->parseCriteria($this->passedArgs);
		
		$this->Accesslog->recursive = 0;
		$this->set('accesslogs', $this->paginate());
		
		$this->set('users', $this->Accesslog->User->find('list'));
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
	public function _add() {
		if ($this->request->is('post')) {
			$this->Accesslog->create();
			if ($this->Accesslog->save($this->request->data)) {
				$this->Session->setFlashInfo(__('The accesslog has been saved.') );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlashError(__('The accesslog could not be saved. Please, try again.') );
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
	public function _edit($id = null) {
		if (!$this->Accesslog->exists($id)) {
			throw new NotFoundException(__('Invalid accesslog'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Accesslog->save($this->request->data)) {
				$this->Session->setFlashInfo(__('The accesslog has been saved.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlashError(__('The accesslog could not be saved. Please, try again.'));
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
	public function _delete($id = null) {
		$this->Accesslog->id = $id;
		if (!$this->Accesslog->exists()) {
			throw new NotFoundException(__('Invalid accesslog'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Accesslog->delete()) {
			$this->Session->setFlashInfo(__('Accesslog deleted.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlashError(__('Accesslog was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
