<?php
App::uses('AppController', 'Controller');
/**
 * Senders Controller
 *
 * @property Sender $Sender
 * @property PaginatorComponent $Paginator
 */
class SendersController extends AppController {

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
		$this->Sender->recursive = 0;
		$this->set('senders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sender->exists($id)) {
			throw new NotFoundException(__('Invalid sender'));
		}
		$options = array('conditions' => array('Sender.' . $this->Sender->primaryKey => $id));
		$this->set('sender', $this->Sender->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sender->create();
			if ($this->Sender->save($this->request->data)) {
				$this->Session->setFlash(__('The sender has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sender could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Sender->exists($id)) {
			throw new NotFoundException(__('Invalid sender'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Sender->save($this->request->data)) {
				$this->Session->setFlash(__('The sender has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sender could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Sender.' . $this->Sender->primaryKey => $id));
			$this->request->data = $this->Sender->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Sender->id = $id;
		if (!$this->Sender->exists()) {
			throw new NotFoundException(__('Invalid sender'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Sender->delete()) {
			$this->Session->setFlash(__('The sender has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sender could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
