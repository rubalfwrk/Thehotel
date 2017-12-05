<?php

App::uses('AppController', 'Controller');

class GuideBeachesController extends AppController {

////////////////////////////////////////////////////////////

	public $components = array('Paginator');

////////////////////////////////////////////////////////////

//public PaginatorComponent->paginate('GuideBeache');

	public function admin_index() {

		Configure::write('debug', 0);

		$this->loadModel('GuideBeache');

		//echo 'dddddddddddddddddddd';exit;

		$this->Paginator->settings = array(

			'recursive' => -1,

			'order' => array(

				'GuideBeache.title' => 'ASC',

			),

			'limit' => 100,

		);

		$this->set('GuideBeache', $this->Paginator->paginate('GuideBeache'));

	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null, $title = null) {

		$this->loadModel('GuideBeache');

		if (!$this->GuideBeache->exists($id)) {

			throw new NotFoundException('Invalid GuideBeache');

		}

		$options = array('conditions' => array('GuideBeache.id' => $id));

		$this->set('GuideBeache', $this->GuideBeache->find('first', $options));

		$this->set('title', $title);

	}

////////////////////////////////////////////////////////////

	public function admin_add($id = null) {

		$this->loadModel('GuideBeache');

		$this->set('idx', $id);

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

			$this->GuideBeache->create();

			if ($this->GuideBeache->save($this->request->data)) {

				$this->Session->setFlash('The GuideBeache has been saved.');

				return $this->redirect($this->referer());

				// return $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash('The GuideBeache could not be saved. Please, try again.');

			}

		}

	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null, $title = null) {
		Configure::write('debug', 2);
		$this->loadModel('GuideBeache');

		if (!$this->GuideBeache->exists($id)) {

			throw new NotFoundException('Invalid GuideBeache');

		}
		$get_image_name = $this->GuideBeache->find('first', array('conditions' => array('GuideBeache.id' => $id)));
		$get_cat_id = $get_image_name['GuideBeache']['guidedataid'];
		$imagezz = $this->GuideBeache->find('first', array('conditions' => array('GuideBeache.id' => $id)));

		$imagexx = $imagezz['GuideBeache']['image'];

		$imgxx = explode(",", $imagexx);
		$this->set('imagexx', $imgxx);

		if ($this->request->is(array('post', 'put'))) {

			$imageNamexx = [];

			$image = $this->request->data['GuideBeache']['image'];

			// $imageq = $this->request->data['GuideList']['image']['name'];

			if ($image[0]['name'] != '') {

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

				$imagex = $this->GuideBeache->find('first', array('conditions' => array('GuideBeache.id' => $id)));

				//print_r($imagex);

				$this->request->data['GuideBeache']['image'] = $imagex['GuideBeache']['image'];

			}

			if ($this->GuideBeache->save($this->request->data)) {

				$this->Session->setFlash('The GuideBeache has been saved.');

				return $this->redirect(array('controller' => 'GuideDatas', 'action' => "view/$get_cat_id"));

			} else {

				$this->Session->setFlash('The GuideBeache could not be saved. Please, try again.');

			}

		} else {

			$options = array('conditions' => array('GuideBeache.id' => $id));

			$this->request->data = $this->GuideBeache->find('first', $options);

		}

	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {

		$this->loadModel('GuideBeache');
		$get_image_name = $this->GuideBeache->find('first', array('conditions' => array('GuideBeache.id' => $id)));
		$get_cat_id = $get_image_name['GuideBeache']['guidedataid'];
		$this->GuideBeache->id = $id;
		if (!$this->GuideBeache->exists()) {

			throw new NotFoundException('Invalid GuideBeache');

		}

		$this->request->onlyAllow('post', 'delete');

		if ($this->GuideBeache->delete()) {

			$this->Session->setFlash('The GuideBeache has been deleted.');

		} else {

			$this->Session->setFlash('The GuideBeache could not be deleted. Please, try again.');

		}
		return $this->redirect(array('controller' => 'GuideDatas', 'action' => "view/$get_cat_id"));

	}

////////////////////////////////////////////////////////////

}
