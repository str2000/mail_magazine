<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class ApiUsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $uses = array("User");
	public $components = array('Paginator', 'RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
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
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				$result['message'] = 'Thanks';
				$result['code'] = '200';
				$this->set(array(
		            'result' => $result,
		            '_serialize' => array('result')
		        ));
			} else {
				$result['message'] = $this->User->validationErrors['email'][0];
				$result['code'] = '422';
				$this->set(array(
		            'result' => $result,
		            '_serialize' => array('result', 'error')
		        ));
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
	public function update($id = null) {
		$this->User->set($this->request->data);
		$user = $this->User->findByEmail($this->request->data('User.email'));
		// メールアドレスで検索してUserが存在するか
		// 
		if (!empty($user)) {
			$this->User->create();
			$this->User->id = $user['User']['id'];
			$data['email'] = $this->request->data('User.new');
			if ($this->User->save($data)) {
				$result['message'] = 'Thanks';
				$result['code'] = '200';
				$this->set(array(
		            'result' => $result,
		            '_serialize' => array('result')
		        ));
			} else {
				$result['message'] = $this->User->validationErrors['email'][0];
				$result['code'] = '422';
				$this->set(array(
		            'result' => $result,
		            '_serialize' => array('result', 'error')
		        ));
			}
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
		$this->request->onlyAllow('post', 'delete');
		$user = $this->User->findByEmail($this->request->data('User.email'));
		if (!empty($user)) {
			$this->User->delete($user['User']['id']);
			$result['message'] = 'Success';
			$result['code'] = '200';
			$this->set(array(
	            'result' => $result,
	            '_serialize' => array('result', 'error')
	        ));
		} else {
			$result['message'] = '存在しないメールアドレスです。もう一度お確かめください。';
			$result['code'] = '404';
			$this->set(array(
	            'result' => $result,
	            '_serialize' => array('result', 'error')
	        ));
		}
	}}
