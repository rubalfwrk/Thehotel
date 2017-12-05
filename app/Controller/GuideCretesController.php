<?php

App::uses('AppController', 'Controller');

class GuideCretesController extends AppController {

////////////////////////////////////////////////////////////

	public $components = array('Paginator');

////////////////////////////////////////////////////////////

	public function admin_index() {

		Configure::write('debug', 0);

		$this->Paginator->settings = array(

			'recursive' => -1,

			'order' => array(

				'GuideCrete.title' => 'ASC',

			),

			'limit' => 100,

		);

		$this->set('GuideCrete', $this->Paginator->paginate('GuideCrete'));

	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {

		if (!$this->GuideCrete->exists($id)) {

			throw new NotFoundException('Invalid GuideCrete');

		}

		$options = array('conditions' => array('GuideCrete.id' => $id));

		$this->set('GuideCrete', $this->GuideCrete->find('first', $options));

	}

////////////////////////////////////////////////////////////

	public function admin_add() {

		if ($this->request->is('post')) {

			//print_r($_POST);exit;

			$image = $this->request->data['GuideCrete']['image'];

			$uploadFolder = "Addhotels";

			//full path to upload folder

			$uploadPath = WWW_ROOT . '/files/' . $uploadFolder;

			//check if there wasn't errors uploading file on serwer

			if ($image['error'] == 0) {

				$imageName = $image['name'];

				//check if file exists in upload folder

				if (file_exists($uploadPath . DS . $imageName)) {

					//create full filename with timestamp

					$imageName = date('His') . $imageName;

				}

				//create full path with image

				$full_image_path = $uploadPath . DS . $imageName;

				$this->request->data['GuideCrete']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/" . $imageName;

				move_uploaded_file($image['tmp_name'], $full_image_path);

			} else {
				$this->request->data['GuideCrete']['image'] = "";
			}

			$this->GuideCrete->create();

			if ($this->GuideCrete->save($this->request->data)) {

				$this->Session->setFlash('The GuideCrete has been saved.');

				//return $this->redirect($this->referer());

				return $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash('The GuideCrete could not be saved. Please, try again.');

			}

		}

	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {

		Configure::write('debug', 0);

		if (!$this->GuideCrete->exists($id)) {

			throw new NotFoundException('Invalid GuideCrete');

		}

		$imagezz = $this->GuideCrete->find('first', array('conditions' => array('GuideCrete.id' => $id)));

		$imagexx = $imagezz['GuideCrete']['image'];

		$this->set('imagexx', $imagexx);

		if ($this->request->is(array('post', 'put'))) {

			//print_r($this->request->data);exit;

			$imageq = $this->request->data['GuideCrete']['image']['name'];

			$image = $this->request->data['GuideCrete']['image'];

			if ($imageq != '') {

				$uploadFolder = "Addhotels";

				//full path to upload folder

				$uploadPath = WWW_ROOT . '/files/' . $uploadFolder;

				//check if there wasn't errors uploading file on serwer

				if ($image['error'] == 0) {

					$imageName = $image['name'];

					//check if file exists in upload folder

					if (file_exists($uploadPath . DS . $imageName)) {

						//create full filename with timestamp

						$imageName = date('His') . $imageName;

					}

					//create full path with image

					$full_image_path = $uploadPath . DS . $imageName;

					$this->request->data['GuideCrete']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/" . $imageName;

					move_uploaded_file($image['tmp_name'], $full_image_path);

				}

			} else {

				$imagex = $this->GuideCrete->find('first', array('conditions' => array('GuideCrete.id' => $id)));

				$this->request->data['GuideCrete']['image'] = $imagex['GuideCrete']['image'];

			}
			$this->GuideCrete->create();
			if ($this->GuideCrete->save($this->request->data)) {

				$this->Session->setFlash('The GuideCrete has been saved.');

				return $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash('The GuideCrete could not be saved. Please, try again.');

			}

		} else {

			$options = array('conditions' => array('GuideCrete.id' => $id));

			$this->request->data = $this->GuideCrete->find('first', $options);

		}

	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {

		$this->GuideCrete->id = $id;

		if (!$this->GuideCrete->exists()) {

			throw new NotFoundException('Invalid GuideCrete');

		}

		$this->request->onlyAllow('post', 'delete');

		if ($this->GuideCrete->delete()) {

			$this->Session->setFlash('The GuideCrete has been deleted.');

		} else {

			$this->Session->setFlash('The GuideCrete could not be deleted. Please, try again.');

		}

		return $this->redirect(array('action' => 'index'));

	}

////////////////////////////////////////////////////////////

}
