<?php
App::uses('AppController', 'Controller');
/**
 * MediaTypes Controller
 *
 * @property MediaType $MediaType
 */
class MediaTypesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MediaType->recursive = 0;
		$this->set('mediaTypes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->MediaType->id = $id;
		if (!$this->MediaType->exists()) {
			throw new NotFoundException(__('Invalid media type'));
		}
		$this->set('mediaType', $this->MediaType->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MediaType->create();
			if ($this->MediaType->save($this->request->data)) {
				$this->Session->setFlash(__('The media type has been saved'));
				$this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The media type could not be saved. Please, try again.'));
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
		$this->MediaType->id = $id;
		if (!$this->MediaType->exists()) {
			throw new NotFoundException(__('Invalid media type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MediaType->save($this->request->data)) {
				$this->Session->setFlash(__('The media type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media type could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MediaType->read(null, $id);
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
		$this->MediaType->id = $id;
		if (!$this->MediaType->exists()) {
			throw new NotFoundException(__('Invalid media type'));
		}
		if ($this->MediaType->delete()) {
			$this->Session->setFlash(__('Media type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Media type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
