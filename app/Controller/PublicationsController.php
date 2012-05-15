<?php
App::uses('AppController', 'Controller');
/**
 * Publications Controller
 *
 * @property Publication $Publication
 */
class PublicationsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Publication->recursive = 0;
		$this->set('publications', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Publication->id = $id;
		if (!$this->Publication->exists()) {
			throw new NotFoundException(__('Invalid publication'));
		}
		$this->set('publication', $this->Publication->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Publication->create();
			if ($this->Publication->save($this->request->data)) {
				$this->Session->setFlash(__('The publication has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The publication could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Publication->id = $id;
		if (!$this->Publication->exists()) {
			throw new NotFoundException(__('Invalid publication'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Publication->save($this->request->data)) {
				$this->Session->setFlash(__('The publication has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The publication could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Publication->read(null, $id);
		}
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
		$this->Publication->id = $id;
		if (!$this->Publication->exists()) {
			throw new NotFoundException(__('Invalid publication'));
		}
		if ($this->Publication->delete()) {
			$this->Session->setFlash(__('Publication deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Publication was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
