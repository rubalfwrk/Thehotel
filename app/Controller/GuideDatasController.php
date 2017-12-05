<?php

App::uses('AppController', 'Controller');

class GuideDatasController extends AppController {

////////////////////////////////////////////////////////////

	public $components = array('Paginator');

////////////////////////////////////////////////////////////

	public function admin_index() {

		Configure::write('debug', 0);
		$this->Paginator->settings = array(

			'recursive' => 2,

			'order' => array(

				'GuideData.title' => 'ASC',

			),

			'limit' => 100,

		);

		$this->set('GuideData', $this->Paginator->paginate('GuideData'));
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null, $title = null) {
		//print_r('hello');die();
		if (!$this->GuideData->exists($id)) {

			throw new NotFoundException('Invalid GuideData');

		}

		$this->loadModel('GuideBeache');
		// $this->Restaurant->recursive = 0;
		$options = array('conditions' => array('GuideBeache.guidedataid' => $id));

		$this->set('GuideBeache', $this->GuideBeache->find('all', $options));

		$this->set('title', $title);

	}

////////////////////////////////////////////////////////////

	public function admin_add() {

		Configure::write('debug', 0);

		$this->loadModel('GuideCrete');

		$GuideCretelist = $this->GuideCrete->find('list');

		unset($GuideCretelist[1], $GuideCretelist[2]);

		$this->set('GuideCretelist', $GuideCretelist);

		if ($this->request->is('post')) {
			//print_r(expression)($this->request->data);die();
			$imageNamexx = [];

			$image = $this->request->data['GuideList']['image'];

			// $imageq = $this->request->data['GuideList']['image']['name'];

			if ($image[0]['name'] != '') {

				$uploadFolder = "Addhotels";

				$uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
				foreach ($this->request->data['GuideList']['image'] as $value) {

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

				$this->request->data['GuideList']['image'] = $photo;

			} else {
				$this->request->data['GuideData']['image'] = "";
			}

			$this->GuideData->create();

			if ($this->GuideData->save($this->request->data)) {

				if ($this->request->data['GuideData']['Sub_title']) {

					$lastinsertedid = $this->GuideData->getLastInsertID();

					$getdata = $this->GuideData->find('first', array('conditions' => array('GuideData.id' => $lastinsertedid)));

					$image = $getdata['GuideData']['image'];

					$latitude = $getdata['GuideData']['latitude'];

					$longitude = $getdata['GuideData']['longitude'];

					$description = $getdata['GuideData']['description'];

					$this->loadModel('GuideBeache');

					$this->GuideBeache->create();

					$this->request->data['GuideBeache']['guidedataid'] = $lastinsertedid;

					$this->request->data['GuideBeache']['title'] = $this->request->data['GuideData']['Sub_title'];

					$this->request->data['GuideBeache']['image'] = $image;

					$this->request->data['GuideBeache']['latitude'] = $latitude;

					$this->request->data['GuideBeache']['longitude'] = $longitude;

					$this->request->data['GuideBeache']['description'] = $description;

					if ($this->GuideBeache->save($this->request->data)) {

						$this->GuideData->updateAll(array('GuideData.description' => "Null", 'GuideData.image' => "Null", 'GuideData.latitude' => "Null", 'GuideData.longitude' => "Null"), array('GuideData.id' => $lastinsertedid));}}

				$this->Session->setFlash('The GuideData has been saved.');

				//return $this->redirect($this->referer());

				return $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash('The GuideData could not be saved. Please, try again.');

			}

		}

	}

////////////////////////////////////////////////////////////

	public function admin_addbeach($id = Null) {

		Configure::write('debug', 0);
		$this->loadModel('BeachRegion');
		$this->loadModel('GuideBeache');

		$this->set('idx', $id);

		$check = $this->BeachRegion->find('all', array(
			"fields" => array("BeachRegion.region"),
		));

		$this->set('GuideCretelist', $check);

		if ($this->request->is('post')) {

			$imageNamexx = [];

			$image = $this->request->data['GuideBeache']['image'];

			// $imageq = $this->request->data['GuideList']['image']['name'];

			if ($image) {

				$uploadFolder = "Addhotels";

				$uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
				foreach ($this->request->data['GuideBeache']['image'] as $value) {

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

				$this->request->data['GuideBeache']['image'] = $photo;

			} else {
				$this->request->data['GuideBeache']['image'] = "";
			}

			$this->request->data['GuideBeache']['guidedataid'] = $id;

			$this->GuideBeache->create();

			if ($this->GuideBeache->save($this->request->data)) {

				$this->Session->setFlash('The GuideBeache has been saved.');

				return $this->redirect('view/' . $this->request->data['GuideBeache']['guidedataid']);

				// return $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash('The GuideBeache could not be saved. Please, try again.');

			}

		}

	}

////////////////////////////////////////////////////////////

	public function admin_addbeachregion() {

		Configure::write('debug', 0);

		$this->loadModel('BeachRegion');

		if ($this->request->is('post')) {

			$region = $this->BeachRegion->find('all', array('conditions' => array('BeachRegion.region' => $this->request->data['BeachRegion']['region'])));
			if (empty($region)) {

				$image = $this->request->data['BeachRegion']['regionimage'];

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

					$this->request->data['BeachRegion']['regionimage'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/" . $imageName;

					move_uploaded_file($image['tmp_name'], $full_image_path);

				} else {
					$this->request->data['BeachRegion']['regionimage'] = "";
				}

				$this->BeachRegion->create();

				if ($this->BeachRegion->save($this->request->data)) {

					$this->Session->setFlash('The Beach Region has been saved.');

					//return $this->redirect($this->referer());

					return $this->redirect(array('action' => 'viewbeachregion'));

				} else {

					$this->Session->setFlash('The Beach Region could not be saved. Please, try again.');

				}
			} else {
				$this->Session->setFlash('This Beach Region already exists!');
			}

		}

	}

	public function admin_viewbeachregion() {

		$this->loadModel('BeachRegion');
		// $this->Restaurant->recursive = 0;

		$title = $this->set('GuideBeache', $this->BeachRegion->find('all'));

		$this->set('title', $title);

	}

	public function admin_deletebeachregion($id = Null) {

		$this->loadModel('BeachRegion');

		$this->BeachRegion->id = $id;

		if (!$this->BeachRegion->exists()) {

			throw new NotFoundException('Invalid Beach Region');

		}

		$this->request->onlyAllow('post', 'delete');

		if ($this->BeachRegion->delete()) {

			$this->Session->setFlash('The Beach Region has been deleted.');

		} else {

			$this->Session->setFlash('The Beach Region could not be deleted. Please, try again.');

		}

		return $this->redirect(array('action' => 'viewbeachregion'));

	}

	public function admin_edit($id = null) {

		if (!$this->GuideData->exists($id)) {

			throw new NotFoundException('Invalid GuideData');

		}
		$imagezz = $this->GuideData->find('first', array('conditions' => array('GuideData.id' => $id)));

		$imagexx = $imagezz['GuideData']['image'];

		$imgxx = explode(",", $imagexx);
		$this->set('imagexx', $imgxx);

		if ($this->request->data) {
			//die();
			$imageNamexx = [];

			$image = $this->request->data['GuideData']['image'];

			if ($image[0]['name'] != '') {

				$uploadFolder = "Addhotels";

				$uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
				foreach ($this->request->data['GuideData']['image'] as $value) {

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

				$this->request->data['GuideData']['image'] = $photo;

			} else {

				$imagex = $this->GuideData->find('first', array('conditions' => array('GuideData.id' => $id)));

				$this->request->data['GuideData']['image'] = $imagex['GuideData']['image'];

			}

			if ($this->GuideData->save($this->request->data)) {

				$this->Session->setFlash('The GuideData has been saved.');

				return $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash('The GuideData could not be saved. Please, try again.');

			}

		} else {

			$options = array('conditions' => array('GuideData.id' => $id));

			$this->request->data = $this->GuideData->find('first', $options);

		}

	}

	public function admin_editbeachregion($id = null) {

		$this->loadModel('BeachRegion');
		$this->loadModel('GuideDatas');

		if (!$this->BeachRegion->exists($id)) {

			throw new NotFoundException('Invalid GuideData');

		}

		$imagezz = $this->BeachRegion->find('first', array('conditions' => array('BeachRegion.id' => $id)));

		$imagexx = $imagezz['BeachRegion']['regionimage'];

		$imgxx = explode(",", $imagexx);
		$this->set('imagexx', $imgxx);

		if ($this->request->data) {

			$imageNamexx = [];

			$image = $this->request->data['BeachRegion']['regionimage'];

			if ($image[0]['name'] != '') {

				$uploadFolder = "Addhotels";

				$uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
				foreach ($this->request->data['BeachRegion']['regionimage'] as $value) {

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

				$this->request->data['BeachRegion']['regionimage'] = $photo;

			} else {

				$imagex = $this->BeachRegion->find('first', array('conditions' => array('BeachRegion.id' => $id)));

				$this->request->data['BeachRegion']['regionimage'] = $imagex['BeachRegion']['regionimage'];

			}

			if ($this->BeachRegion->save($this->request->data)) {

				$this->Session->setFlash('The BeachRegion has been saved.');

				return $this->redirect(array('action' => 'viewbeachregion'));

			} else {

				$this->Session->setFlash('The BeachRegion could not be saved. Please, try again.');

			}

		} else {

			$options = array('conditions' => array('BeachRegion.id' => $id));

			$this->request->data = $this->BeachRegion->find('first', $options);

		}

	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {

		$this->GuideData->id = $id;

		if (!$this->GuideData->exists()) {

			throw new NotFoundException('Invalid GuideData');

		}

		$this->request->onlyAllow('post', 'delete');

		if ($this->GuideData->delete()) {

			$this->Session->setFlash('The GuideData has been deleted.');

		} else {

			$this->Session->setFlash('The GuideData could not be deleted. Please, try again.');

		}

		return $this->redirect(array('action' => 'index'));

	}

////////////////////////////////////////////////////////////

}
