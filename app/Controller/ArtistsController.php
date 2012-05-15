<?php
App::uses('AppController', 'Controller');
/**
 * Artists Controller
 *
 * @property Artist $Artist
 */
class ArtistsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Artist->recursive = 0;
		$this->set('artists', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Artist->id = $id;
		if (!$this->Artist->exists()) {
			throw new NotFoundException(__('Invalid artist'));
		}
		$this->set('artist', $this->Artist->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			//Clean up the Website URL
			if(!empty($this->request->data['Artist']['url'])){
				$this->request->data['Artist']['url'] = $this->Utils->addHttp($this->request->data['Artist']['url']);
				//Make sure http:// isn't the only thing that exists.
				if($this->request->data['Artist']['url'] == "http://"){
					$this->request->data['Artist']['url'] = '';
				}
			}
			
			//Clean up the LinkedIn URL
			if(!empty($this->request->data['Artist']['linkedin_url'])){
				$this->request->data['Artist']['linkedin_url'] = $this->Utils->addHttp($this->request->data['Artist']['linkedin_url']);
				//Make sure http:// isn't the only thing that exists.
				if($this->request->data['Artist']['linkedin_url'] == "http://"){
					$this->request->data['Artist']['linkedin_url'] = '';
				}
			}
			
			//Clear the @ sign if nothing else was entered.
			$this->request->data['Artist']['twitter'] = trim($this->request->data['Artist']['twitter']);
			if(strlen($this->request->data['Artist']['twitter']) == 1){
				$this->request->data['Artist']['twitter'] = '';
			}
			$this->Artist->create();
			if ($this->Artist->save($this->request->data)) {
				$this->Session->setFlash(__('The artist has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artist could not be saved. Please, try again.'));
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
		$this->Artist->id = $id;
		if (!$this->Artist->exists()) {
			throw new NotFoundException(__('Invalid artist'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Artist->save($this->request->data)) {
				$this->Session->setFlash(__('The artist has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artist could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Artist->read(null, $id);
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
		$this->Artist->id = $id;
		if (!$this->Artist->exists()) {
			throw new NotFoundException(__('Invalid artist'));
		}
		if ($this->Artist->delete()) {
			$this->Session->setFlash(__('Artist deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Artist was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
