<?php

App::uses('AppController', 'Controller');

class FacilitiesController extends AppController {





////////////////////////////////////////////////////////////



    public $components = array('Paginator');



////////////////////////////////////////////////////////////



    public function admin_index($id=null) {

        $this->loadModel('Facilitie');
        Configure::write('debug', 0);



//echo 'dddddddddddddddddddd';exit;

        $this->Paginator->settings = array(

            'recursive' => -1,

            'conditions'=>array('hotelid'=>$id),

            'order' => array(

                'Facilitie.title' => 'ASC'

            ),

            'limit' => 100,

        );

        $this->set('Facilitie', $this->Paginator->paginate('Facilitie'));

        $this->set('hotelid',$id);

    }



////////////////////////////////////////////////////////////



    public function admin_view($id = null) {
          $this->loadModel('Facilitie');

        if (!$this->Facilitie->exists($id)) {

            throw new NotFoundException('Invalid Facilitie');

        }

        $options = array('conditions' => array('Facilitie.id' => $id));

        $this->set('Facilitie', $this->Facilitie->find('first', $options));

    }



////////////////////////////////////////////////////////////



    public function admin_add($id = null) {
        Configure::write('debug', 0);
        $this->loadModel('Facilitie');

		$this->set('idx',$id);

        if ($this->request->is('post')) {        

            //print_r($_POST);exit;
             $image = $this->request->data['Facilitie']['image'];
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
                $this->request->data['Facilitie']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/".$imageName;
                move_uploaded_file($image['tmp_name'], $full_image_path);
               
            } 



			$this->Facilitie->create();

            if ($this->Facilitie->save($this->request->data)) {

                $this->Session->setFlash('The Facilitie has been saved.');

                return $this->redirect(array('action' => 'admin_index',$id));


            } else {

                $this->Session->setFlash('The Facilitie could not be saved. Please, try again.');

            }

        }

		

		

    }



////////////////////////////////////////////////////////////



    public function admin_edit($id = null,$hotelid=null) {
          $this->loadModel('Facilitie');

        if (!$this->Facilitie->exists($id)) {

            throw new NotFoundException('Invalid Facilitie');

        }

        if ($this->request->is(array('post', 'put'))) {
            $image = $this->request->data['Facilitie']['image'];
        if($image != ""){
        $img = base64_decode($image);

        $im = imagecreatefromstring($img);

        if ($im !== false) {

            $image = "1" . time() . ".png";

            imagepng($im, WWW_ROOT . "files" . DS . "Addhotels" . DS . $image);
            
            imagedestroy($im);
            
            
        }
        $this->request->data['Facilitie']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/".$image;
        }

            if ($this->Facilitie->save($this->request->data)) {

                $this->Session->setFlash('The Facilitie has been saved.');

                return $this->redirect(array('action' => 'index',$hotelid));

            } else {

                $this->Session->setFlash('The Facilitie could not be saved. Please, try again.');

            }

        } else {

            $options = array('conditions' => array('Facilitie.id' => $id));

            $this->request->data = $this->Facilitie->find('first', $options);

        }

    }



////////////////////////////////////////////////////////////



    public function admin_delete($id = null,$hotelid=null) {

    $this->loadModel('Facilitie');

        $this->Facilitie->id = $id;

        if (!$this->Facilitie->exists()) {

            throw new NotFoundException('Invalid Facilitie');

        }

        $this->request->onlyAllow('post', 'delete');

        if ($this->Facilitie->delete()) {

            $this->Session->setFlash('The Facilitie has been deleted.');

        } else {

            $this->Session->setFlash('The Facilitie could not be deleted. Please, try again.');

        }

        return $this->redirect(array('action' => 'index',$hotelid));

    }

	

////////////////////////////////////////////////////////////



}

