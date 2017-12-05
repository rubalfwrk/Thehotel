<?php

App::uses('AppController', 'Controller');

class WelcometocreteController extends AppController {





////////////////////////////////////////////////////////////



    public $components = array('Paginator');



////////////////////////////////////////////////////////////



    public function admin_index() {

        $this->loadModel('Welcometocrete');
        Configure::write('debug', 0);


        $Welcometocrete = $this->Welcometocrete->find('all');
        $this->set('welcometocrete', $Welcometocrete);
    }



////////////////////////////////////////////////////////////



    public function admin_view($id = Null) {
          $this->loadModel('Welcometocrete');


        $options = array('conditions' => array('Welcometocrete.id' => $id));

        $this->set('Facilitie', $this->Welcometocrete->find('first', $options));

    }



////////////////////////////////////////////////////////////



    public function admin_add() {
        Configure::write('debug', 0);
          $this->loadModel('Welcometocrete');

		  $this->set('idx',$id);

        if ($this->request->is('post')) {

            
            $imageNamexx= [];
            $image = $this->request->data['Welcometocrete']['image'];

            if($image){

            $uploadFolder = "Addhotels";

            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            foreach ($this->request->data['Welcometocrete']['image'] as $value){

                if ($value['error'] == 0) {  

                $imageName = $value['name'];

                if (file_exists($uploadPath . DS . $imageName)) {

                    $imageName = date('His') . $imageName;

                }


                $full_image_path = $uploadPath . DS . $imageName;

                move_uploaded_file($value['tmp_name'], $full_image_path);

                $imageNamexx[] = FULL_BASE_URL . $this->webroot . "files/Addhotels/".$imageName;
                }
                } 
                
                $photo = implode(",",$imageNamexx);
                
                $this->request->data['Welcometocrete']['image'] = $photo;

             }else{
                $this->request->data['Welcometocrete']['image'] = "";
            }


			$this->Welcometocrete->create();

            if ($this->Welcometocrete->save($this->request->data)) {

                $this->Session->setFlash('The Welcome to crete has been saved.');

                return $this->redirect(array('action' => 'admin_index',$id));


            } else {

                $this->Session->setFlash('The Welcome to crete could not be saved. Please, try again.');

            }

        }
	

    }



////////////////////////////////////////////////////////////



    public function admin_edit($id = null,$hotelid=null) {
         
        $this->set('welcometocrete', $Welcometocrete);
        if(!$this->Welcometocrete->exists($id)) {

            throw new NotFoundException('Invalid Welcometocrete');

        }

        if($this->request->is(array('post', 'put'))) {
           $imageNamexx= [];
            $image = $this->request->data['Welcometocrete']['image'];

            if($image){

            $uploadFolder = "Addhotels";

            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            foreach ($this->request->data['Welcometocrete']['image'] as $value){

                if ($value['error'] == 0) {  

                $imageName = $value['name'];

                if (file_exists($uploadPath . DS . $imageName)) {

                    $imageName = date('His') . $imageName;

                }


                $full_image_path = $uploadPath . DS . $imageName;

                move_uploaded_file($value['tmp_name'], $full_image_path);

                $imageNamexx[] = FULL_BASE_URL . $this->webroot . "files/Addhotels/".$imageName;
                }
                } 
                
                $photo = implode(",",$imageNamexx);
                
                $this->request->data['Welcometocrete']['image'] = $photo;

             }else{
                $this->request->data['Welcometocrete']['image'] = "";
            }


            if ($this->Welcometocrete->save($this->request->data)) {

                $this->Session->setFlash('The Welcometocrete has been saved.');

                return $this->redirect(array('action' => 'index'));

            } else {

                $this->Session->setFlash('The Facilitie could not be saved. Please, try again.');

            }

        } else {

            $options = array('conditions' => array('Welcometocrete.id' => $id));

            $this->request->data = $this->Welcometocrete->find('first', $options);

        }

    }



////////////////////////////////////////////////////////////



    public function admin_delete($id = null,$hotelid=null) {

    $this->loadModel('Welcometocrete');

        $this->Welcometocrete->id = $id;

        if (!$this->Welcometocrete->exists()) {

            throw new NotFoundException('Invalid Facilitie');

        }

        $this->request->onlyAllow('post', 'delete');

        if ($this->Welcometocrete->delete()) {

            $this->Session->setFlash('The Welcometocrete has been deleted.');

        } else {

            $this->Session->setFlash('The Welcometocrete could not be deleted. Please, try again.');

        }

        return $this->redirect(array('action' => 'index'));

    }

	

////////////////////////////////////////////////////////////



}

