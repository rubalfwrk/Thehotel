<?php

App::uses('AppController', 'Controller');

/**



 * Staticpages Controller



 *



 * @property Staticpage $Staticpage



 * @property PaginatorComponent $Paginator



 */

class StaticpagesController extends AppController {

	public function beforeFilter() {

		parent::beforeFilter();

		$this->Auth->allow(array('api_aboutus', 'api_greekwords', 'api_usefulinfo', 'admin_background'));

	}

	/**



	 * Components



	 *



	 * @var array



	 */

	public $components = array('Paginator');

/**



 * index method



 *



 * @return void



 */

	public function index() {

		$this->Staticpage->recursive = 0;

		$this->set('staticpages', $this->Paginator->paginate());

	}

/**



 * view method



 *



 * @throws NotFoundException



 * @param string $id



 * @return void



 */

	public function view($id = null) {

		if (!$this->Staticpage->exists($id)) {

			throw new NotFoundException(__('Invalid staticpage'));

		}

		$options = array('conditions' => array('Staticpage.' . $this->Staticpage->primaryKey => $id));

		$this->set('staticpage', $this->Staticpage->find('first', $options));

	}

/**



 * add method



 *



 * @return void



 */

	public function add() {

		if ($this->request->is('post')) {

			$this->Staticpage->create();

			if ($this->Staticpage->save($this->request->data)) {

				$this->Session->setFlash(__('The staticpage has been saved.'));

				return $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash(__('The staticpage could not be saved. Please, try again.'));

			}

		}

	}

/**



 * edit method



 *



 * @throws NotFoundException



 * @param string $id



 * @return void



 */

	public function edit($id = null) {

		if (!$this->Staticpage->exists($id)) {

			throw new NotFoundException(__('Invalid staticpage'));

		}

		if ($this->request->is(array('post', 'put'))) {

			if ($this->Staticpage->save($this->request->data)) {

				$this->Session->setFlash(__('The staticpage has been saved.'));

				return $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash(__('The staticpage could not be saved. Please, try again.'));

			}

		} else {

			$options = array('conditions' => array('Staticpage.' . $this->Staticpage->primaryKey => $id));

			$this->request->data = $this->Staticpage->find('first', $options);

		}

	}

/**



 * delete method



 *



 * @throws NotFoundException



 * @param string $id



 * @return void



 */

	public function delete($id = null) {

		$this->Staticpage->id = $id;

		if (!$this->Staticpage->exists()) {

			throw new NotFoundException(__('Invalid staticpage'));

		}

		$this->request->allowMethod('post', 'delete');

		if ($this->Staticpage->delete()) {

			$this->Session->setFlash(__('The staticpage has been deleted.'));

		} else {

			$this->Session->setFlash(__('The staticpage could not be deleted. Please, try again.'));

		}

		return $this->redirect(array('action' => 'index'));

	}

/**



 * admin_index method



 *



 * @return void



 */

	public function admin_index() {

		$this->Staticpage->recursive = 0;

		if ($this->request->is("post")) {

			if ($this->request->data["keyword"]) {

				$keyword = trim($this->request->data["keyword"]);

				$this->paginate = array("limit" => 20, "conditions" => array("OR" => array(

					"Staticpage.title LIKE" => "%" . $keyword . "%",

					"Staticpage.image LIKE" => "%" . $keyword . "%",

					"Staticpage.created LIKE" => "%" . $keyword . "%",

				)));

				$this->set("keyword", $keyword);

			}

		}

		$this->set('staticpages', $this->Paginator->paginate());

	}

/**



 * admin_view method



 *



 * @throws NotFoundException



 * @param string $id



 * @return void



 */

	public function admin_view($id = null) {

		if (!$this->Staticpage->exists($id)) {

			throw new NotFoundException(__('Invalid staticpage'));

		}

		$options = array('conditions' => array('Staticpage.' . $this->Staticpage->primaryKey => $id));

		$this->set('staticpage', $this->Staticpage->find('first', $options));

	}

/**



 * admin_add method



 *



 * @return void



 */

	public function admin_add() {

		Configure::write("debug", 0);

		$this->loadModel('Addhotel');
		$this->loadModel('staticpage');

		$hotelinfo = $this->Addhotel->find('all', array('fields' => array('Addhotel.hotelname', 'Addhotel.id', 'Addhotel.code')));

		$this->set('restype', $hotelinfo);

		if ($this->request->is('post')) {

			$hotel = $this->Staticpage->find('first', array('conditions' => array('Staticpage.hotelname' => $this->request->data['Staticpage']['hotelname'], 'Staticpage.title' => $this->request->data['Staticpage']['title'])));

			if (empty($hotel)) {

				$hotelcode = $this->Addhotel->find('first', array('conditions' => array('Addhotel.hotelname' => $this->request->data['Staticpage']['hotelname'])));

				$this->request->data['Staticpage']['hotelcode'] = $hotelcode['Addhotel']['code'];

				$one = $this->request->data['Staticpage']['image'];

				$image_name = $this->request->data['Staticpage']['image'] = date('dmHis') . $one['name'];

				$this->Staticpage->create();

				if ($this->Staticpage->save($this->request->data)) {

					if ($one['error'] == 0) {

						$pth = 'files' . DS . 'staticpage' . DS . $image_name;

						move_uploaded_file($one['tmp_name'], $pth);

					}

					$this->Session->setFlash(__('The staticpage has been saved'));

					$this->redirect(array('action' => 'index'));

				} else {

					$this->Session->setFlash(__('The staticpage could not be saved. Please, try again.'));

				}
			} else {

				$this->Session->setFlash(__('The staticpage regarding this hotel already exists. Please edit to make changes.'));
			}
		}
	}

/**



 * admin_edit method



 *



 * @throws NotFoundException



 * @param string $id



 * @return void



 */

	public function admin_edit($id = null) {

		$this->Staticpage->id = $id;

		if (!$this->Staticpage->exists()) {

			throw new NotFoundException(__('Invalid Staticpage'));

		}

		if ($this->request->is('post') || $this->request->is('put')) {

			if (@$this->request->data['Staticpage']['image']) {

				$one = $this->request->data['Staticpage']['image'];

				$image_name = $this->request->data['Staticpage']['image'] = date('dmHis') . $one['name'];

				if ($one['name'] != "") {

					$x = $this->Staticpage->read('image', $id);

					$x = 'files' . DS . 'staticpage' . DS . $x['Staticpage']['image'];

//                unlink($x);

					$pth = 'files' . DS . 'staticpage' . DS . $image_name;

					move_uploaded_file($one['tmp_name'], $pth);

				}

				if ($one['name'] == "") {

					$xc = $this->Staticpage->read('image', $id);

					$this->request->data['Staticpage']['image'] = $xc['Staticpage']['image'];

				}

			}

			if ($this->Staticpage->save($this->request->data)) {

				$this->Session->setFlash(__('The Staticpage has been saved'));

				$this->redirect(array('action' => 'admin_index'));

			} else {

				$this->Session->setFlash(__('The Staticpage could not be saved. Please, try again.'));

			}

		} else {

			$this->request->data = $this->Staticpage->read(null, $id);

		}

		$this->set('admin_edit', $this->Staticpage->find('first', array('conditions' => array('Staticpage.id' => $id))));

	}

/**



 * admin_delete method



 *



 * @throws NotFoundException



 * @param string $id



 * @return void



 */

	public function admin_delete($id = null) {

		$this->Staticpage->id = $id;

		if (!$this->Staticpage->exists()) {

			throw new NotFoundException(__('Invalid staticpage'));

		}

		$this->request->allowMethod('post', 'delete');

		if ($this->Staticpage->delete()) {

			$this->Session->setFlash(__('The staticpage has been deleted.'));

		} else {

			$this->Session->setFlash(__('The staticpage could not be deleted. Please, try again.'));

		}

		return $this->redirect(array('action' => 'index'));

	}

	public function admin_activate($id = null) {

		$this->Staticpage->id = $id;

		if ($this->Staticpage->exists()) {

			$x = $this->Staticpage->save(array(

				'Staticpage' => array(

					'status' => '1',

				),

			));

			$this->Session->setFlash(__("Activated successfully."));

			$this->redirect($this->referer());

		} else {

			$this->Session->setFlash(__("Unable to activate."));

			$this->redirect($this->referer());

		}

	}

	public function admin_deactivate($id = null) {

		$this->Staticpage->id = $id;

		//exit;

		if ($this->Staticpage->exists()) {

			$x = $this->Staticpage->save(array(

				'Staticpage' => array(

					'status' => '0',

				),

			));

			$this->Session->setFlash(__("Activated successfully."));

			$this->redirect($this->referer());

		} else {

			$this->Session->setFlash(__("Unable to activate."));

			$this->redirect($this->referer());

		}

	}

	public function api_aboutus() {

		Configure::write('debug', 0);
		$this->loadModel('Staticpage');

		$postdata = file_get_contents("php://input");
		$redata = json_decode($postdata);

		$this->request->data['Staticpage']['hotelcode'] = $redata->Staticpage->hotelcode;
		$this->request->data['Staticpage']['title'] = $redata->Staticpage->title;

		if ($this->request->is('post')) {

			$data = $this->Staticpage->find('all', array('conditions' => array(
				"Staticpage.hotelcode" => $this->request->data['Staticpage']['hotelcode'], "Staticpage.title" => $this->request->data['Staticpage']['title'],
			)));

			$response['result'] = $data;
			$response['status'] = true;
			$response['msg'] = 'Info';
		} else {

			$response['status'] = False;
			$response['msg'] = 'Info doesnot exists.';

		}

		echo json_encode($response);
		exit;

	}

	public function api_greekwords() {

		Configure::write('debug', 0);
		$this->loadModel('GreekWord');
		$this->loadModel('GreekDescription');

		// $postdata = file_get_contents("php://input");
		// $redata = json_decode($postdata);

		$this->GreekWord->recursive = 2;
		$data = $this->GreekWord->find('all');

		$response['result'] = $data;
		$response['status'] = true;
		$response['msg'] = 'Greek Words';

		echo json_encode($response);
		exit;

	}

	public function api_usefulinfo() {

		Configure::write('debug', 0);
		$this->loadModel('UsefulInfo');

		// $postdata = file_get_contents("php://input");
		// $redata = json_decode($postdata);

		$data = $this->UsefulInfo->find('all');

		$response['result'] = $data;
		$response['status'] = true;
		$response['msg'] = 'Useful info';

		echo json_encode($response);
		exit;

	}

	public function api_usefulnumbers() {

		Configure::write('debug', 0);
		$this->loadModel('UsefulNumber');

		$postdata = file_get_contents("php://input");
		$redata = json_decode($postdata);

		$this->UsefulNumber->recursive = 2;
		$data = $this->UsefulNumber->find('all');

		$response['result'] = $data;
		$response['status'] = true;
		$response['msg'] = 'Useful Numbers';

		echo json_encode($response);
		exit;

	}

	public function admin_viewusefulnumber() {

		$this->loadModel('UsefulInfo');
		$data = $this->UsefulInfo->find('all', array('order' => 'id ASC'));

		$this->set('AbouttoCrete', $data);
	}

	public function admin_deleteusefulinfo($id = null) {

		$this->loadModel('UsefulInfo');
		$this->UsefulInfo->id = $id;

		if (!$this->UsefulInfo->exists()) {

			throw new NotFoundException(__('Invalid Useful Info'));

		}

		$this->request->allowMethod('post', 'delete');

		if ($this->UsefulInfo->delete()) {

			$this->Session->setFlash(__('The Useful Info has been deleted.'));

		} else {

			$this->Session->setFlash(__('The Useful Info could not be deleted. Please, try again.'));

		}

		return $this->redirect(array('Controller' => 'staticpages', 'action' => 'viewusefulnumber'));

	}

	public function admin_addusefulnumber() {

		Configure::write("debug", 0);

		$this->loadModel('UsefulInfo');

		if ($this->request->is('post')) {

			$this->UsefulInfo->create();

			if ($this->UsefulInfo->save($this->request->data)) {

				$this->Session->setFlash(__('The useful info has been saved'));

				$this->redirect(array('Controller' => 'staticpages', 'action' => 'viewusefulnumber'));

			}

		}
	}

	public function admin_viewgreekword() {

		$this->loadModel('GreekWord');
		$data = $this->GreekWord->find('all', array('order' => 'id ASC'));
		//echo "<pre>"; print_r($data); die;
		$this->set('AbouttoCrete', $data);
	}

	public function admin_deletegreekword($id = null) {

		$this->loadModel('GreekWord');
		$this->GreekWord->id = $id;

		if (!$this->GreekWord->exists()) {

			throw new NotFoundException(__('Invalid Greek Word'));

		}

		$this->request->allowMethod('post', 'delete');

		if ($this->GreekWord->delete()) {

			$this->Session->setFlash(__('The Greek Word has been deleted.'));

		} else {

			$this->Session->setFlash(__('The Greek Word could not be deleted. Please, try again.'));

		}

		return $this->redirect(array('Controller' => 'staticpages', 'action' => 'viewgreekword'));

	}

	public function admin_addgreekword() {
		Configure::write("debug", 0);

		$this->loadModel('GreekWord');

		if ($this->request->is('post')) {

			$this->GreekWord->create();

			if ($this->GreekWord->save($this->request->data)) {

				$this->Session->setFlash(__('The Greek Word has been saved'));

				$this->redirect(array('Controller' => 'staticpages', 'action' => 'viewgreekword'));

			}

		}
	}

	public function admin_addgreekdescription($id = null) {

		Configure::write("debug", 0);

		$this->loadModel('GreekDescription');

		if ($this->request->is('post')) {
			//print_r('hello');die();

			$this->request->data['GreekDescription']['greekwordsid'] = $id;
			//   print_r($this->request->data['GreekDescription']);
			//exit;
			$this->GreekDescription->create();

			if ($this->GreekDescription->save($this->request->data['GreekDescription'])) {

				$this->Session->setFlash(__('The Greek Description has been saved'));
				//$this->redirect(Router::url($this->referer(), true));

				return $this->redirect('viewgreekdescription/' . $id);
				// $this->redirect(array('Controller' => 'staticpages', 'action' => 'viewgreekword'));

			}

		}
	}

	public function admin_viewgreekdescription($id = null) {

		$this->loadModel('GreekDescription');
		$data = $this->GreekDescription->find('all', array('conditions' => array('greekwordsid' => $id), array('order' => 'id ASC')));
		// echo "<pre>"; print_r($data); die;
		$this->set('AbouttoCrete', $data);
	}

	public function admin_deletegreekdescription($id = null) {

		$this->loadModel('GreekDescription');
		$get_image_name = $this->GreekDescription->find('first', array('conditions' => array('GreekDescription.id' => $id)));
		$get_cat_id = $get_image_name['GreekDescription']['greekwordsid'];
		$this->GreekDescription->id = $id;

		if (!$this->GreekDescription->exists()) {

			throw new NotFoundException(__('Invalid Greek Word'));

		}

		$this->request->allowMethod('post', 'delete');

		if ($this->GreekDescription->delete()) {

			$this->Session->setFlash(__('The Greek Description has been deleted.'));

		} else {

			$this->Session->setFlash(__('The Greek Description could not be deleted. Please, try again.'));

		}

		return $this->redirect('viewgreekdescription/' . $get_cat_id);
		// return $this->redirect(array('Controller' => 'staticpages', 'action' => 'viewgreekword'));
	}

	public function admin_viewnumber() {

		$this->loadModel('UsefulNumber');
		$data = $this->UsefulNumber->find('all', array('order' => 'id ASC'));

		$this->set('AbouttoCrete', $data);
	}

	public function admin_deletenumber($id = null) {

		$this->loadModel('UsefulNumber');
		$this->UsefulNumber->id = $id;

		if (!$this->UsefulNumber->exists()) {

			throw new NotFoundException(__('Invalid UsefulNumber'));

		}

		$this->request->allowMethod('post', 'delete');

		if ($this->UsefulNumber->delete()) {

			$this->Session->setFlash(__('The UsefulNumber has been deleted.'));

		} else {

			$this->Session->setFlash(__('The UsefulNumber could not be deleted. Please, try again.'));

		}

		return $this->redirect(array('Controller' => 'staticpages', 'action' => 'viewnumber'));

	}

	public function admin_addnumber() {
		Configure::write("debug", 0);

		$this->loadModel('UsefulNumber');

		if ($this->request->is('post')) {

			$this->UsefulNumber->create();

			if ($this->UsefulNumber->save($this->request->data)) {

				$this->Session->setFlash(__('The UsefulNumber has been saved'));

				$this->redirect(array('Controller' => 'staticpages', 'action' => 'viewnumber'));

			}

		}
	}

	public function admin_addnumberdata($id = null) {

		Configure::write("debug", 0);

		$this->loadModel('UsefulData');

		if ($this->request->is('post')) {
			$this->request->data['UsefulData']['usefulnumberid'] = $id;
			$this->UsefulData->create();

			if ($this->UsefulData->save($this->request->data)) {

				$this->Session->setFlash(__('The Useful Data has been saved'));

				$this->redirect(array('Controller' => 'staticpages', 'action' => 'viewnumber'));

			}

		}
	}

	public function admin_editnumberdata($id = null) {

		$this->loadModel('UsefulNumber');

		$this->UsefulNumber->id = $id;

		if (!$this->UsefulNumber->exists()) {

			throw new NotFoundException(__('Invalid Staticpage'));

		}

		if ($this->request->is('post') || $this->request->is('put')) {

			if ($this->UsefulNumber->save($this->request->data)) {

				$this->Session->setFlash(__('The UsefulNumber has been saved'));

				$this->redirect(array('Controller' => 'staticpages', 'action' => 'viewnumber'));

			} else {

				$this->Session->setFlash(__('The UsefulNumber could not be saved. Please, try again.'));

			}

		} else {

			$this->request->data = $this->UsefulNumber->read(null, $id);

		}

		$this->set('admin_edit', $this->UsefulNumber->find('first', array('conditions' => array('id' => $id))));

	}

	public function admin_edituseful($id = null) {

		$this->loadModel('UsefulInfo');

		$this->UsefulInfo->id = $id;

		if (!$this->UsefulInfo->exists()) {

			throw new NotFoundException(__('Invalid UsefulInfo'));

		}

		if ($this->request->is('post') || $this->request->is('put')) {

			if ($this->UsefulInfo->save($this->request->data)) {

				$this->Session->setFlash(__('The UsefulInfo has been saved'));

				$this->redirect(array('Controller' => 'staticpages', 'action' => 'viewusefulnumber'));

			} else {

				$this->Session->setFlash(__('The UsefulInfo could not be saved. Please, try again.'));

			}

		} else {

			$this->request->data = $this->UsefulInfo->read(null, $id);

		}

		$this->set('admin_edit', $this->UsefulInfo->find('first', array('conditions' => array('id' => $id))));

	}

	public function admin_viewnumberdata($id = null) {

		$this->loadModel('UsefulData');
		$data = $this->UsefulData->find('all', array('conditions' => array('usefulnumberid' => $id)));
		$this->set('AbouttoCrete', $data);
	}

	public function admin_deletenumberdata($id = null) {

		$this->loadModel('UsefulData');
		$this->UsefulData->id = $id;

		if (!$this->UsefulData->exists()) {

			throw new NotFoundException(__('Invalid Useful Data'));

		}

		$this->request->allowMethod('post', 'delete');

		if ($this->UsefulData->delete()) {

			$this->Session->setFlash(__('The Useful Data has been deleted.'));

		} else {

			$this->Session->setFlash(__('The Useful Data could not be deleted. Please, try again.'));

		}

		$this->redirect(Router::url($this->referer(), true));
	}

	public function admin_background($id = Null) {

		$this->loadModel('Background');
		$imagex = $this->Background->find('first', array('conditions' => array('Background.hotelid' => $id)));
		$this->set('imagex', $imagex);
		if ($this->request->is('post') || $this->request->is('put')) {

			$image = $this->request->data['Background']['image'];

			if ($image != '') {

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

					$this->request->data['Background']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/" . $imageName;

					move_uploaded_file($image['tmp_name'], $full_image_path);

					$this->request->data['Background']['hotelid'] = $id;
					$imagex = $this->Background->find('first', array('conditions' => array('Background.hotelid' => $id)));
					$this->set('imagex', $imagex);
					if ($imagex) {

						$picture = FULL_BASE_URL . $this->webroot . "files/Addhotels/" . $imageName;

						$data = $this->Background->updateAll(array('Background.image' => "'$picture'"), array('Background.hotelid' => $id));
						$this->Session->setFlash(__('The Background image has been saved'));
						return $this->redirect(array('action' => 'background/' . $id));

					} else {

						$this->Background->save($this->request->data);
						$this->Session->setFlash(__('The Background image has been saved'));
						return $this->redirect(array('action' => 'background'));
					}

				}
			} else {
				$imagex = $this->Background->find('first', array('conditions' => array('Background.hotelid' => $id)));
				$this->set('imagex', $imagex);
			}

		}

	}

}
