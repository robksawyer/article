<?php
App::uses('AppController', 'Controller');
App::uses('Vendor', 'Uploader.Uploader');
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
			
			//Save the upload
			if(empty($this->request->data['Work']['upload_id']) || $this->request->data['Upload']['fileName']['size'] > 0){
				//Delete the old file if it exists
				if(!empty($this->request->data['Work']['upload_id'])){
					$this->Uploader = new Uploader();
					$upload = $this->Work->Upload->read(null,$this->request->data['Work']['upload_id']);
					$this->Uploader->delete($upload['Upload']['path']);
					//Delete the record
					$this->Work->Upload->id = $this->request->data['Work']['upload_id'];
					if($this->Work->Upload->delete()){
						//Delete success
					}else{
						//Delete fail
					}
				}
				
				$uploadData = $this->saveUpload();
				if(!empty($uploadData)){
					$this->set('upload',$uploadData);
					$this->request->data['Work']['upload_id'] = $uploadData['Upload']['id']; //Set the upload id
				}
			}else{
				$uploadData = $this->Work->Upload->read(null,$this->request->data['Work']['upload_id']);
				$this->set('upload',$uploadData);
			}
			
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
	 * Helper method to save the upload 
	 * @param 
	 * @return array The upload data
	 */
	protected function saveUpload(){
		if ($this->request->is('post')) {
			//Check to see if the user has selected a file
			$this->Work->Upload->set($this->request->data);
			if ($this->Work->Upload->validates()) {
		
				//http://milesj.me/code/cakephp/uploader
				$this->Uploader = new Uploader(array(
									'tempDir' => TMP,
									'baseDir'	=> WWW_ROOT,
									'uploadDir'	=> 'files/uploads/works/',
									'maxNameLength' => 200
									));
								
				if ($data = $this->Uploader->upload('fileName')) {
					// Upload successful, do whatever
					//debug($data);
		
					//Add pertinent data to the array
					$this->request->data['Upload'] = $data;
					$this->request->data['Upload']['active'] = 1; //Disable until the user pays
					//$this->request->data['Upload']['user_id'] = $this->Artist->Upload->User->getLastInsertID();
					//$this->request->data['Upload']['caption'] = $this->request->data['Upload']['custom_name'];
		
					$this->Work->Upload->create();
					if ($this->Work->Upload->save($this->request->data)) {
						//Set the upload id
						$uploadID = $this->Work->Upload->getLastInsertID();
						$upload = $this->Work->Upload->read(null,$uploadID);
						return $upload;
					} else {
						$this->Session->setFlash(__('Bummer :( Your file could NOT be uploaded.'));
						$this->log('The file could not be uploaded.','upload_debug');
						Debugger::log($data);
					}
				}
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
