<?php
App::uses('AppController', 'Controller');
App::uses('Vendor', 'Uploader.Uploader');
/**
 * Uploads Controller
 *
 * @property Upload $Upload
 */
class UploadsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Upload->recursive = 0;
		$this->set('uploads', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Upload->id = $id;
		if (!$this->Upload->exists()) {
			throw new NotFoundException(__('Invalid upload'));
		}
		$this->set('upload', $this->Upload->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			//Check to see if the user has selected a file
			$this->Upload->set($this->request->data);
			if ($this->Upload->validates()) {
			
				//http://milesj.me/code/cakephp/uploader
				$this->Uploader = new Uploader(array(
									'tempDir' => TMP,
									'baseDir'	=> WWW_ROOT,
									'uploadDir'	=> 'files/uploads/'.$userFolder.'/',
									'maxNameLength' => 200
									));
									
				if ($data = $this->Uploader->upload('fileName')) {
					// Upload successful, do whatever
					//debug($data);
			
					//Add pertinent data to the array
					$this->request->data['Upload'] = $data;
					$this->request->data['Upload']['active'] = 1; //Disable until the user pays
					$this->request->data['Upload']['user_id'] = $this->Upload->User->getLastInsertID();
					//$this->request->data['Upload']['caption'] = $this->request->data['Upload']['custom_name'];
			
					$this->Upload->create();
					if ($this->Upload->save($this->request->data)) {
						//Set the upload id
						$this->request->data['Upload']['id'] = $this->Upload->getLastInsertID();
					} else {
						$this->Session->setFlash(__('Bummer :( Your file could NOT be uploaded.'));
						$this->log('The file could not be uploaded.','upload_debug');
						Debugger::log($data);
					}
				}
			}
		}
		$works = $this->Upload->Work->find('list');
		$this->set(compact('works'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Upload->id = $id;
		if (!$this->Upload->exists()) {
			throw new NotFoundException(__('Invalid upload'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Upload->save($this->request->data)) {
				$this->Session->setFlash(__('The upload has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Upload->read(null, $id);
		}
		$works = $this->Upload->Work->find('list');
		$this->set(compact('works'));
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
		$this->Upload->id = $id;
		if (!$this->Upload->exists()) {
			throw new NotFoundException(__('Invalid upload'));
		}
		
		$this->deleteFiles($id); //Delete the physical file
		
		if ($this->Upload->delete()) {
			$this->Session->setFlash(__('Upload deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Upload was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	 * Remove all of the file content
	 * @param int upload_id
	 * @return bool
	 */
	protected function deleteFiles($upload_id){
		
		//Find all files created by the user and delete them
		$upload = $this->Upload->read(null,$upload_id);
		//Delete the physical files
		$this->Uploader = new Uploader();
		$this->Uploader->delete($upload['Upload']['path']);
		
		return true;
	}
}
