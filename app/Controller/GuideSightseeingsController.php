<?php

App::uses('AppController', 'Controller');

class GuideSightseeingsController extends AppController {

	public $components = array('Paginator');

	public function admin_addsightseeing($id = null) {

		$this->set('idx', $id);

		if ($this->request->is('post')) {

			$imageNamexx = [];

			$image = $this->request->data['GuideSightseeing']['image'];

			if ($image != '') {

				$uploadFolder = "Addhotels";

				$uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
				foreach ($this->request->data['GuideSightseeing']['image'] as $value) {

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

				$this->request->data['GuideSightseeing']['image'] = $photo;

			} else {
				$this->request->data['GuideSightseeing']['image'] = "";
			}
			$this->request->data['GuideSightseeing']['guidelistid'] = $id;
			$this->GuideSightseeing->create();

			if ($this->GuideSightseeing->save($this->request->data)) {

				$this->Session->setFlash('The Sightseeing has been saved.');

				return $this->redirect(array('action' => 'viewsightseeing/' . $id));

			} else {

				$this->Session->setFlash('The Sightseeing could not be saved. Please, try again.');

			}

		}

	}

	public function admin_viewsightseeing($id = null) {
	    

		$options = array('conditions' => array('GuideSightseeing.guidelistid' => $id));
		//$abc = $this->GuideSightseeing->find('first', $options);
        
		$this->set('GuideList', $this->GuideSightseeing->find('all', $options));

	}

	public function admin_deletesubmenu($id = null) {

		$this->loadModel('GuideSightseeing');
		$this->GuideSightseeing->id = $id;


		$this->request->onlyAllow('post', 'delete');

		if ($this->GuideSightseeing->delete()) {

			$this->Session->setFlash('The Crete sub menu has been deleted.');

		} else {

			$this->Session->setFlash('The Crete sub menu could not be deleted. Please, try again.');

		}
		$this->redirect(Router::url($this->referer(), true));
		//return $this->redirect(array('controller' => 'GuideLists', 'action' => 'index'));

	}

	public function admin_editsubmenu($id = null) {

		$this->loadModel('GuideSightseeing');


		if ($this->request->is(array('post', 'put'))) {

			//print_r($_POST);exit;

			$imageq = $this->request->data['GuideSightseeing']['image']['name'];

			$image = $this->request->data['GuideSightseeing']['image'];

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

					$this->request->data['GuideSightseeing']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/" . $imageName;

					move_uploaded_file($image['tmp_name'], $full_image_path);

				}

			} else {

				$imagex = $this->GuideSightseeing->find('first', array('conditions' => array('GuideSightseeing.id' => $id)));

				$this->request->data['GuideSightseeing']['image'] = $imagex['GuideSightseeing']['image'];

			}

			if ($this->GuideSightseeing->save($this->request->data)) {

				$this->Session->setFlash('The Guide Sightseeing has been saved.');
				$getting_guidelistid_data = $this->GuideSightseeing->find('first', array('conditions' => array('GuideSightseeing.id' => $id)));
				$guidelist_id = $getting_guidelistid_data['GuideSightseeing']['guidelistid'];
				return $this->redirect('viewsightseeing/' . $guidelist_id);

			} else {

				$this->Session->setFlash('The Guide Sightseeing could not be saved. Please, try again.');

			}

		} else {

			$options = array('conditions' => array('GuideSightseeing.id' => $id));

			$this->request->data = $this->GuideSightseeing->find('first', $options);

		}

	}

}