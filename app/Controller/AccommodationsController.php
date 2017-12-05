<?php
App::uses('AppController', 'Controller');
class AccommodationsController extends AppController {

////////////////////////////////////////////////////////////

    public $components = array('Paginator');

////////////////////////////////////////////////////////////

    public function admin_index($id=null) {
        Configure::write('debug', 0);
        $this->Paginator->settings = array(
            'recursive' => -1,
            'conditions'=>array('hotelid'=>$id),
            'order' => array(
                'Accommodation.title' => 'ASC'
            ),
            'limit' => 100,
        );
       

        $this->set('Accommodation', $this->Paginator->paginate('Accommodation'));
        $this->set('hotelid', $id);
    }

////////////////////////////////////////////////////////////

    public function admin_view($id = null) {
        if (!$this->Accommodation->exists($id)) {
            throw new NotFoundException('Invalid Accommodation');
        }
        $options = array('conditions' => array('Accommodation.id' => $id));
        $this->set('Accommodation', $this->Accommodation->find('first', $options));
        //$this->set('hotelid', $id);
    }

////////////////////////////////////////////////////////////

    public function admin_add($id = null) {
		$this->set('idx',$id);
	/*	$this->loadModel('GuideCrete');
		$GuideCretelist = $this->GuideCrete->find('list');
		$this->set('GuideCretelist',$GuideCretelist);*/
        if ($this->request->is('post')) {
			
			
			//print_r($_POST);exit;
			 $image = $this->request->data['Accommodation']['image'];
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
                $this->request->data['Accommodation']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/".$imageName;
                move_uploaded_file($image['tmp_name'], $full_image_path);
               
            } 
			// $log = $this->Accommodation->getDataSource();
   //           print_r($log); die;
            $this->Accommodation->create();
            if ($this->Accommodation->save($this->request->data)) {
                $this->Session->setFlash('The Accommodation has been saved.');
                return $this->redirect($this->referer());
                // return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The Accommodation could not be saved. Please, try again.');
            }
        }
		
		
    }

////////////////////////////////////////////////////////////

    public function admin_edit($id = null,$hotelid=null) {
         Configure::write('debug', 0);
        if (!$this->Accommodation->exists($id)) {
            throw new NotFoundException('Invalid Accommodation');
        }
        if ($this->request->is(array('post', 'put'))) {
			 
			
			 $image = $this->request->data['Accommodation']['image'];

			 if($image!=''){
                
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
                move_uploaded_file($image['tmp_name'], $full_image_path);
                $this->request->data['Accommodation']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/" .$imageName;

            } 
			 }else{
                
                $imagex = $this->Accommodation->find('first',array('conditions'=>array('Accommodation.id'=>$id)));
				 
				 $this->request->data['Accommodation']['image'] = $imagex['Accommodation']['image'];
				 
			 }
			
            if ($this->Accommodation->save($this->request->data)) {

                $this->Session->setFlash('The Accommodation has been saved.');
               return $this->redirect(array('action' => 'index',$hotelid));
            } else {
                $this->Session->setFlash('The Accommodation could not be saved. Please, try again.');
            }
        } else {

            $options = array('conditions' => array('Accommodation.id' => $id));
            $this->request->data = $this->Accommodation->find('first', $options);
        }
    }

////////////////////////////////////////////////////////////

    public function admin_delete($id = null,$hotelid=null) {
        $this->Accommodation->id = $id;
        if (!$this->Accommodation->exists()) {
            throw new NotFoundException('Invalid Accommodation');
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Accommodation->delete()) {
            $this->Session->setFlash('The Accommodation has been deleted.');
        } else {
            $this->Session->setFlash('The Accommodation could not be deleted. Please, try again.');
        }
        return $this->redirect(array('action' => 'index',$hotelid));
    }
	
////////////////////////////////////////////////////////////

}
