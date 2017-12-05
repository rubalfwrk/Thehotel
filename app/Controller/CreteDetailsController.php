<?php

App::uses('AppController', 'Controller');

class CreteDetailsController extends AppController {



////////////////////////////////////////////////////////////



    public $components = array('Paginator');



////////////////////////////////////////////////////////////

//public PaginatorComponent->paginate('CreteDetail');

    public function admin_index() {

Configure::write('debug', 2);

$this->loadModel('CreteDetail');
/*$beachesall = $this->CreteDetail->find('all');
 $this->set('CreteDetail', $beachesall);*/
//echo 'dddddddddddddddddddd';exit;

       $this->Paginator->settings = array(

            'recursive' => -1,

            'order' => array(

                'CreteDetail.title' => 'ASC'

            ),

            'limit' => 100,

        );



        $this->set('CreteDetail', $this->Paginator->paginate('CreteDetail'));

    }



////////////////////////////////////////////////////////////



    public function admin_view($id = null,$title = null) {
	$this->loadModel('CreteDetail');
        if (!$this->CreteDetail->exists($id)) {

            throw new NotFoundException('Invalid CreteDetail');

        }

        $options = array('conditions' => array('CreteDetail.id' => $id));

        $this->set('CreteDetail', $this->CreteDetail->find('first', $options));
		$this->set('title', $title);

    }



////////////////////////////////////////////////////////////



    public function admin_add($id = null) {
	$this->loadModel('CreteDetail');
		$this->set('idx',$id);

	/*	$this->loadModel('GuideCrete');

		$GuideCretelist = $this->GuideCrete->find('list');

		$this->set('GuideCretelist',$GuideCretelist);*/

        if ($this->request->is('post')) {

			

			

			//print_r($_POST);exit;

			 $image = $this->request->data['CreteDetail']['image'];

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

                $this->request->data['CreteDetail']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/".$imageName;

                move_uploaded_file($image['tmp_name'], $full_image_path);

               

            } 

			

            $this->CreteDetail->create();

            if ($this->CreteDetail->save($this->request->data)) {

                $this->Session->setFlash('The CreteDetail has been saved.');

                return $this->redirect($this->referer());

                // return $this->redirect(array('action' => 'index'));

            } else {

                $this->Session->setFlash('The CreteDetail could not be saved. Please, try again.');

            }

        }

		

		

    }



////////////////////////////////////////////////////////////



    public function admin_edit($id = null) {
	$this->loadModel('CreteDetail');
        if (!$this->CreteDetail->exists($id)) {

            throw new NotFoundException('Invalid CreteDetail');

        }
		$imagezz = $this->CreteDetail->find('first',array('conditions'=>array('CreteDetail.id'=>$id)));
		$imagexx = $imagezz['CreteDetail']['image'];
		$this->set('imagexx',$imagexx);

        if ($this->request->is(array('post', 'put'))) {

			

			//print_r($_POST);exit;
			 $imageq = $this->request->data['CreteDetail']['image']['name'];
			 $image = $this->request->data['CreteDetail']['image'];

			 if($imageq!=''){

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

                $this->request->data['CreteDetail']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/".$imageName;

                move_uploaded_file($image['tmp_name'], $full_image_path);

               

            } 

			 }else{

				 $imagex = $this->CreteDetail->find('first',array('conditions'=>array('CreteDetail.id'=>$id)));

				 //print_r($imagex);

				 $this->request->data['CreteDetail']['image'] = $imagex['CreteDetail']['image'];

				 

			 }

			

			

			

            if ($this->CreteDetail->save($this->request->data)) {

                $this->Session->setFlash('The CreteDetail has been saved.');

                return $this->redirect(array('action' => 'index'));

            } else {

                $this->Session->setFlash('The CreteDetail could not be saved. Please, try again.');

            }

        } else {

            $options = array('conditions' => array('CreteDetail.id' => $id));

            $this->request->data = $this->CreteDetail->find('first', $options);

        }

    }



////////////////////////////////////////////////////////////



    public function admin_delete($id = null) {
	$this->loadModel('CreteDetail');
        $this->CreteDetail->id = $id;

        if (!$this->CreteDetail->exists()) {

            throw new NotFoundException('Invalid CreteDetail');

        }

        $this->request->onlyAllow('post', 'delete');

        if ($this->CreteDetail->delete()) {

            $this->Session->setFlash('The CreteDetail has been deleted.');

        } else {

            $this->Session->setFlash('The CreteDetail could not be deleted. Please, try again.');

        }

        return $this->redirect(array('action' => 'index'));

    }

	

////////////////////////////////////////////////////////////



}

