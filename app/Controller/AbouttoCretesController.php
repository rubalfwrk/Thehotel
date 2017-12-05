<?php

App::uses('AppController', 'Controller');

class AbouttoCretesController extends AppController {

////////////////////////////////////////////////////////////

	public $components = array('Paginator');

////////////////////////////////////////////////////////////

	public function admin_index() {

		Configure::write('debug', 0);

		$this->Paginator->settings = array(

			'recursive' => -1,

			'order' => array(

				'AboutCrete.id' => 'ASC',

			),

			'limit' => 100,

		);

		$this->set('AbouttoCrete', $this->Paginator->paginate('AbouttoCrete'));

	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {

		if (!$this->AbouttoCrete->exists($id)) {

			throw new NotFoundException('Invalid GuideCrete');

		}

		$options = array('conditions' => array('AbouttoCrete.id' => $id));

		$this->set('AbouttoCrete', $this->AbouttoCrete->find('first', $options));

	}

////////////////////////////////////////////////////////////

	public function admin_add() {

		Configure::write("debug", 0);

		$this->loadModel('AboutCrete');

		if ($this->request->is('post')) {

			// echo "<pre>";

			// print_r($this->request->data); die;

			$image = $this->request->data['AboutCrete']['image'];

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

				$full_image_path = $uploadPath . DS . $imageName;

				move_uploaded_file($image['tmp_name'], $full_image_path);

				$data['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/" . $imageName;



			}
			$data['title'] = $this->request->data['AboutCrete']['title'];
			$data['title_greek'] = $this->request->data['AboutCrete']['title_greek'];

			$data['description'] = $this->request->data['AboutCrete']['description'];
			$data['description_greek'] = $this->request->data['AboutCrete']['description_greek'];

			

				$this->AboutCrete->create();

				$this->AboutCrete->save($data);

				$id = $this->AboutCrete->getLastInsertID();

			if (count($this->request->data['CreteDetail']['title']) > 0) {

				$this->loadModel('CreteDetail');

				for ($k = 0; $k < count($this->request->data['CreteDetail']['title']); $k++) {

					if (($this->request->data['CreteDetail']['title'][$k] != "") && ($this->request->data['CreteDetail']['description'][$k] != "")) {

						$new = array();

						$new['CreteDetail']['creteid'] = $id;

						$new['CreteDetail']['title'] = $this->request->data['CreteDetail']['title'][$k];
						

						$new['CreteDetail']['description'] = $this->request->data['CreteDetail']['description'][$k];

						$this->CreteDetail->create();

						$this->CreteDetail->save($new);
						return $this->redirect(array('action' => 'index'));
					}

				}

			}

		return $this->redirect(array('action' => 'index'));
		}

	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {

		Configure::write("debug", 0);
		$this->set('id', $id);
		if (!$this->AbouttoCrete->exists($id)) {

			throw new NotFoundException('Invalid AbouttoCrete');

		}

		if ($this->request->is(array('post', 'put'))) {

			if ($id == '1') {

				$imageNamexx = [];
				$image = $this->request->data['AbouttoCrete']['image'];

				if ($image) {

					$uploadFolder = "Addhotels";

					$uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
					foreach ($this->request->data['AbouttoCrete']['image'] as $value) {

						if ($value['error'] == 0) {

							$imageName = $value['name'];

							if (file_exists($uploadPath . DS . $imageName)) {

								$imageName = date('His') . $imageName;

							}

							$full_image_path = $uploadPath . DS . $imageName;

							move_uploaded_file($value['tmp_name'], $full_image_path);

							$imageNamexx[] = FULL_BASE_URL . $this->webroot . "files/Addhotels/" . $imageName;
						}
					}

					$photo = implode(",", $imageNamexx);

					$this->request->data['AbouttoCrete']['image'] = $photo;

				} else {

					$this->request->data['AbouttoCrete']['image'] = "";
				}

			} else {

				$image = $this->request->data['AbouttoCrete']['image'];

				if ($image != '') {

					$uploadFolder = "Addhotels";

					//full path to upload folder

					$uploadPath = WWW_ROOT . '/files/' . $uploadFolder;

					//print_r($image['name']);die;

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

						$this->request->data['AbouttoCrete']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/" . $imageName;

						move_uploaded_file($image['tmp_name'], $full_image_path);

					}
					//print_r("if");die();
				} else {
					//print_r("else");die();
					$imagex = $this->AbouttoCrete->find('first', array('conditions' => array('AbouttoCrete.id' => $id)));

					$this->request->data['AbouttoCrete']['image'] = $imagex['AbouttoCrete']['image'];

				}

			}
			if (is_array($this->request->data['AbouttoCrete']['image'])) {
				$get_image_name = $this->AbouttoCrete->find('first', array('conditions' => array('AbouttoCrete.id' => $id)));
				$this->request->data['AbouttoCrete']['image'] = $get_image_name['AbouttoCrete']['image'];
			}
			if ($this->AbouttoCrete->save($this->request->data)) {

				$this->Session->setFlash('The AbouttoCrete has been saved.');

				return $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash('The AbouttoCrete could not be saved. Please, try again.');

			}

		} else {

			$options = array('conditions' => array('AbouttoCrete.id' => $id));
			$this->request->data = $this->AbouttoCrete->find('first', $options);

		}

	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {

		$this->AbouttoCrete->id = $id;

		if (!$this->AbouttoCrete->exists()) {

			throw new NotFoundException('Invalid GuideCrete');

		}

		$this->request->onlyAllow('post', 'delete');

		if ($this->AbouttoCrete->delete()) {

			$this->Session->setFlash('The About Crete has been deleted.');

		} else {

			$this->Session->setFlash('The About Crete could not be deleted. Please, try again.');

		}

		return $this->redirect(array('action' => 'index'));

	}

////////////////////////////////////////////////////////////

	public function admin_addsubmenu($id = null) {

		Configure::write("debug", 0);

		$this->loadModel('AboutCrete');
		$this->loadModel('CreteDetail');

		if ($this->request->is('post')) {

			$data['title_greek'] = $this->request->data['Cretedetail']['title_greek'];
			$data['title'] = $this->request->data['Cretedetail']['title'];
			$data['creteid'] = $id;

			$data['description'] = $this->request->data['Cretedetail']['description'];
			$data['description_greek'] = $this->request->data['Cretedetail']['description_greek'];

			$this->CreteDetail->create();

			$this->CreteDetail->save($data);

			$id = $this->CreteDetail->getLastInsertID();
			$get_image_name = $this->CreteDetail->find('first', array('conditions' => array('CreteDetail.id' => $id)));
			$get_cat_id = $get_image_name['CreteDetail']['creteid'];
			return $this->redirect('viewsubmenu/' . $get_cat_id);
			//return $this->redirect(array('action' => 'index'));
		}

	}

	public function admin_viewsubmenu($id = null) {

		$this->loadModel('AboutCrete');
		$this->loadModel('CreteDetail');

		// if (!$this->CreteDetail->exists($id)) {
		//     echo "sdhjk"; die;
		//     throw new NotFoundException('Invalid GuideCrete');

		// }

		$options = array('conditions' => array('CreteDetail.creteid' => $id),'order' => 'CreteDetail.id ASC');
		// $abc = $this->CreteDetail->find('all', $options);

		$this->set('AbouttoCrete', $this->CreteDetail->find('all', $options));

	}

	public function admin_deletesubmenu($id = null) {

		$this->loadModel('CreteDetail');
		$this->CreteDetail->id = $id;
		$get_image_name = $this->CreteDetail->find('first', array('conditions' => array('CreteDetail.id' => $id)));
		$get_cat_id = $get_image_name['CreteDetail']['creteid'];
		if (!$this->CreteDetail->exists()) {

			throw new NotFoundException('Invalid GuideCrete');

		}

		$this->request->onlyAllow('post', 'delete');

		if ($this->CreteDetail->delete()) {

			$this->Session->setFlash('The Crete sub menu has been deleted.');

		} else {

			$this->Session->setFlash('The Crete sub menu could not be deleted. Please, try again.');

		}

		return $this->redirect('viewsubmenu/' . $get_cat_id);

	}

	public function admin_editsubmenu($id = null) {

		$this->loadModel('CreteDetail');

		if (!$this->CreteDetail->exists($id)) {

			throw new NotFoundException('Invalid AbouttoCrete');

		}

		if ($this->request->is(array('post', 'put'))) {

			if ($this->CreteDetail->save($this->request->data)) {

				$this->Session->setFlash('The Crete Detail has been saved.');
				$get_image_name = $this->CreteDetail->find('first', array('conditions' => array('CreteDetail.id' => $id)));
				$get_cat_id = $get_image_name['CreteDetail']['creteid'];
				return $this->redirect('viewsubmenu/' . $get_cat_id);
				//return $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash('The Crete Detail could not be saved. Please, try again.');

			}

		} else {

			$options = array('conditions' => array('CreteDetail.id' => $id));
			$this->request->data = $this->CreteDetail->find('first', $options);
		}

	}

	public function admin_addoption($id = null) {

		Configure::write("debug", 0);

		$this->loadModel('AboutCrete');
		$this->loadModel('CreteDetail');
		$this->loadModel('Gastronomy');

		if ($this->request->is('post')) {
			$cat_id = $id;
			$image = $this->request->data['Gastronomy']['image'];

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

				$full_image_path = $uploadPath . DS . $imageName;

				move_uploaded_file($image['tmp_name'], $full_image_path);

				$data['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/" . $imageName;

				$data['title'] = $this->request->data['Gastronomy']['title'];
				$data['cretedetailid'] = $id;

				$data['description'] = $this->request->data['Gastronomy']['description'];

				$this->Gastronomy->create();

				$this->Gastronomy->save($data);

				$id = $this->Gastronomy->getLastInsertID();
				return $this->redirect('viewoption/' . $cat_id);
			}
		}

	}

	public function admin_viewoption($id = null) {

		$this->loadModel('AboutCrete');
		$this->loadModel('CreteDetail');
		$this->loadModel('Gastronomy');

		// if (!$this->Gastronomy->exists($id)) {

		//     throw new NotFoundException('Invalid GuideCrete');

		// }

		$options = array('conditions' => array('Gastronomy.cretedetailid' => $id));

		$this->set('AbouttoCrete', $this->Gastronomy->find('all', $options));

	}

	public function admin_deleteoption($id = null) {
		// print_r($id);die();
		$this->loadModel('Gastronomy');
		$this->Gastronomy->id = $id;
		$new_id = $id;
		$get_image_name = $this->Gastronomy->find('first', array('conditions' => array('Gastronomy.id' => $new_id)));
		$get_cat_id = $get_image_name['Gastronomy']['cretedetailid'];

		if (!$this->Gastronomy->exists()) {

			throw new NotFoundException('Invalid GuideCrete');

		}

		$this->request->onlyAllow('post', 'delete');

		if ($this->Gastronomy->delete()) {

			$this->Session->setFlash('The Crete sub menu has been deleted.');

		} else {

			$this->Session->setFlash('The Crete sub menu could not be deleted. Please, try again.');

		}
		return $this->redirect('viewoption/' . $get_cat_id);
		//return $this->redirect(array('action' => 'index'));

	}

	public function admin_editoption($id = null) {

		$this->loadModel('Gastronomy');

		if (!$this->Gastronomy->exists($id)) {

			throw new NotFoundException('Invalid AbouttoCrete');

		}

		if ($this->request->is(array('post', 'put'))) {

			$imageq = $this->request->data['Gastronomy']['image']['name'];

			$image = $this->request->data['Gastronomy']['image'];

			if ($imageq != '') {

				$uploadFolder = "Addhotels";

				//full path to upload folder

				$uploadPath = WWW_ROOT . '/files/' . $uploadFolder;

				// print_r($uploadPath);die;

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

					$this->request->data['Gastronomy']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/" . $imageName;

					move_uploaded_file($image['tmp_name'], $full_image_path);

				}

			} else {

				$imagex = $this->Gastronomy->find('first', array('conditions' => array('Gastronomy.id' => $id)));

				$this->request->data['Gastronomy']['image'] = $imagex['Gastronomy']['image'];

			}

			if ($this->Gastronomy->save($this->request->data)) {

				$this->Session->setFlash('The Crete Detail has been saved.');
				$get_image_name = $this->Gastronomy->find('first', array('conditions' => array('Gastronomy.id' => $id)));
				$get_cat_id = $get_image_name['Gastronomy']['cretedetailid'];
				return $this->redirect('viewoption/' . $get_cat_id);

			} else {

				$this->Session->setFlash('The Crete Detail could not be saved. Please, try again.');

			}

		} else {

			$options = array('conditions' => array('Gastronomy.id' => $id));
			$this->request->data = $this->Gastronomy->find('first', $options);
		}

	}

}
