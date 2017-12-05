<?php
App::uses('AppController', 'Controller');
/**
 * RestaurantsTypes Controller
 *
 * @property RestaurantsType $RestaurantsType
 * @property PaginatorComponent $Paginator
 */
class RestaurantsTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->RestaurantsType->recursive = 0;
		$this->set('restaurantsTypes', $this->Paginator->paginate());
                
                
                
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->RestaurantsType->exists($id)) {
			throw new NotFoundException(__('Invalid restaurants type'));
		}
		$options = array('conditions' => array('RestaurantsType.' . $this->RestaurantsType->primaryKey => $id));
		$this->set('restaurantsType', $this->RestaurantsType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {

        if ($this->request->is('post')) {
            $image = $this->request->data['RestaurantsType']['logo'];
            $name = $this->request->data['RestaurantsType']['name'];
            $name = $this->request->data['RestaurantsType']['catid'];
            $uploadFolder = "restaurants";
            //full path to upload folder
            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            //check if there wasn't errors uploading file on serwer
            if ($image['error'] == 0) {
                //image file name
                $imageName = $image['name'];
                //check if file exists in upload folder
                if (file_exists($uploadPath . DS . $imageName)) {
                    //create full filename with timestamp
                    $imageName = date('His') . $imageName;
                }
                //create full path with image name
                $full_image_path = $uploadPath . DS . $imageName;
                $this->request->data['RestaurantsType']['logo'] = $imageName;
                // $this->request->data['Restaurant']['amities_selected'] = $ckbox;
                //upload image to upload folder
                move_uploaded_file($image['tmp_name'], $full_image_path);
               // $add = $this->request->data['RestaurantsType']['name'];
                
            }

            $this->RestaurantsType->create(); 
            if ($this->RestaurantsType->save($this->request->data)) { 
                $this->Session->setFlash(__('The restaurants type has been saved.'));
		return $this->redirect(array('action' => 'index'));
            }else {
		$this->Session->setFlash(__('The restaurants type could not be saved. Please, try again.'));
            }

           
        } 
    }

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 * 
 * 
 */
    
	public function admin_edit($id = null) {
		if (!$this->RestaurantsType->exists($id)) {
			throw new NotFoundException(__('Invalid Deal type'));
		}
		if ($this->request->is(array('post', 'put'))) {
                    $image = $this->request->data['RestaurantsType']['logo'];
                    $uploadpath = WWW_ROOT . '/files/restaurants/';
                        if ($image['error'] == 0) {
                            $imagename = $image['name'];
                            if (file_exists($uploadiconpath . DS . $imagename)) {
                                $imagename = time() . $imagename;
                            }
                            $fullpathimage = $uploadiconpath . DS . $imagename;
                            $fullpathlogo = $uploadpath . DS . $logoname;
                            $this->request->data['Cat']['image'] = $imagename;
                            move_uploaded_file($image['tmp_name'], $fullpathimage);
                        }
			if ($this->RestaurantsType->save($this->request->data)) {
				$this->Session->setFlash(__('The Deal type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Deal type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RestaurantsType.' . $this->RestaurantsType->primaryKey => $id));
			$this->request->data = $this->RestaurantsType->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->RestaurantsType->id = $id;
		if (!$this->RestaurantsType->exists()) {
			throw new NotFoundException(__('Invalid restaurants type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RestaurantsType->delete()) {
			$this->Session->setFlash(__('The restaurants type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The restaurants type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
