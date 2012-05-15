<?php
App::uses('AppController', 'Controller');
/**
 * Works Controller
 *
 * @property Work $Work
 */
class WorksController extends AppController {
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Work->recursive = 0;
		$this->set('works', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Work->id = $id;
		if (!$this->Work->exists()) {
			throw new NotFoundException(__('Invalid work'));
		}
		$this->set('work', $this->Work->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Work->create();
			
			//Check to see if an artist name was added.
			debug($this->request->data);
			
			/*if ($this->Work->save($this->request->data)) {
				$this->Session->setFlash(__('The work has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The work could not be saved. Please, try again.'));
			}*/
		}
		$artists = $this->Work->Artist->find('list');
		$publications = $this->Work->Publication->find('list');
		$this->set(compact('artists', 'publications'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Work->id = $id;
		if (!$this->Work->exists()) {
			throw new NotFoundException(__('Invalid work'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Work->save($this->request->data)) {
				$this->Session->setFlash(__('The work has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The work could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Work->read(null, $id);
		}
		$artists = $this->Work->Artist->find('list');
		$publications = $this->Work->Publication->find('list');
		$this->set(compact('artists', 'publications'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Work->id = $id;
		if (!$this->Work->exists()) {
			throw new NotFoundException(__('Invalid work'));
		}
		if ($this->Work->delete()) {
			$this->Session->setFlash(__('Work deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Work was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
