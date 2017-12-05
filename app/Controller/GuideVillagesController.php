<?php

App::uses('AppController', 'Controller');

class GuideVillagesController extends AppController {



////////////////////////////////////////////////////////////



    public $components = array('Paginator');



////////////////////////////////////////////////////////////



    public function admin_index() {

    Configure::write('debug', 0);


        $this->Paginator->settings = array(

            'recursive' => 1,

            'order' => array(

                'GuideVillage.title' => 'ASC'

            ),

            'limit' => 100,

        );

        // echo "<pre>";
        // print_r($this->Paginator->paginate('GuideVillage')); die;

        $this->set('GuideVillage', $this->Paginator->paginate('GuideVillage'));

    }



////////////////////////////////////////////////////////////



    public function admin_view($id = null) {

        if (!$this->GuideVillage->exists($id)) {

            throw new NotFoundException('Invalid GuideVillage');

        }

        $options = array('conditions' => array('GuideVillage.id' => $id));

        $this->set('GuideVillage', $this->GuideVillage->find('first', $options));

    }



////////////////////////////////////////////////////////////



    public function admin_add($id = null) {

		$this->set('idx',$id);

        $GuideCretelist = array('East Crete'=>'East Crete','West Crete'=>'West Crete');

        $GuideCretelistgreek = array('Ανατολική Κρήτη'=>'Ανατολική Κρήτη','Δυτική Κρήτη'=>'Δυτική Κρήτη');

        $this->set('GuideCretelist',$GuideCretelist);
        $this->set('GuideCretelistgreek',$GuideCretelistgreek);
	    $this->loadModel('GuideList');
        $Guidecity = $this->GuideList->find('list');

        $this->set('GuideCity',$Guidecity);

        if ($this->request->is('post')) {			

			$imageNamexx= [];
            
            $image = $this->request->data['GuideVillage']['image'];

             // $imageq = $this->request->data['GuideList']['image']['name'];

            if($image !=''){

            $uploadFolder = "Addhotels";

            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            foreach ($this->request->data['GuideVillage']['image'] as $value){

                if ($value['error'] == 0) {  

                $imageName = $value['name'];

                if (file_exists($uploadPath . DS . $imageName)) {

                    $imageName = date('His') . $imageName;

                }


                $full_image_path = $uploadPath . DS . $imageName;

                move_uploaded_file($value['tmp_name'], $full_image_path);

                $imageNamexx[]=FULL_BASE_URL . $this->webroot . "files/Addhotels/".$imageName;
                }
                } 
                
                $photo = implode(",",$imageNamexx);
               
                $this->request->data['GuideVillage']['image'] = $photo;

             }else {
               $this->request->data['GuideVillage']['image'] = ""; 
            }

			

            $this->GuideVillage->create();

            if ($this->GuideVillage->save($this->request->data)) {

                $this->Session->setFlash('The GuideVillage has been saved.');

                //return $this->redirect($this->referer());

                 return $this->redirect(array('action' => 'index'));

            } else {

                $this->Session->setFlash('The GuideVillage could not be saved. Please, try again.');

            }

        }

		

		

    }



////////////////////////////////////////////////////////////



    public function admin_edit($id = null) {

        if (!$this->GuideVillage->exists($id)) {

            throw new NotFoundException('Invalid GuideVillage');

        }

		$imagezz = $this->GuideVillage->find('first',array('conditions'=>array('GuideVillage.id'=>$id)));

		$imagexx = $imagezz['GuideVillage']['image'];
        $imgxx = explode(",",$imagexx);
        $this->set('imagexx',$imgxx);

        if ($this->request->is(array('post', 'put'))) {			

			$imageNamexx= [];
            
            $image = $this->request->data['GuideVillage']['image'];

            if($image[0]['name'] !=''){

            $uploadFolder = "Addhotels";

            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            foreach ($this->request->data['GuideVillage']['image'] as $value){

                if ($value['error'] == 0) {  

                $imageName = $value['name'];

                if (file_exists($uploadPath . DS . $imageName)) {

                    $imageName = date('His') . $imageName;

                }


                $full_image_path = $uploadPath . DS . $imageName;

                move_uploaded_file($value['tmp_name'], $full_image_path);

                $imageNamexx[]=FULL_BASE_URL . $this->webroot . "files/Addhotels/".$imageName;
                }
                } 
                
                $photo = implode(",",$imageNamexx);
               
                $this->request->data['GuideVillage']['image'] = $photo;


             }else{

				 $imagex = $this->GuideVillage->find('first',array('conditions'=>array('GuideVillage.id'=>$id)));

				 //print_r($imagex);

				 $this->request->data['GuideVillage']['image'] = $imagex['GuideVillage']['image'];

				 

			 }

			

			

			

            if ($this->GuideVillage->save($this->request->data)) {

                $this->Session->setFlash('The GuideVillage has been saved.');

                return $this->redirect(array('action' => 'index'));

            } else {

                $this->Session->setFlash('The GuideVillage could not be saved. Please, try again.');

            }

        } else {

            $options = array('conditions' => array('GuideVillage.id' => $id));

            $this->request->data = $this->GuideVillage->find('first', $options);

        }

    }



////////////////////////////////////////////////////////////



    public function admin_delete($id = null) {

        $this->GuideVillage->id = $id;

        if (!$this->GuideVillage->exists()) {

            throw new NotFoundException('Invalid GuideVillage');

        }

        $this->request->onlyAllow('post', 'delete');

        if ($this->GuideVillage->delete()) {

            $this->Session->setFlash('The GuideVillage has been deleted.');

        } else {

            $this->Session->setFlash('The GuideVillage could not be deleted. Please, try again.');

        }

        return $this->redirect(array('action' => 'index'));

    }

	

////////////////////////////////////////////////////////////



}

