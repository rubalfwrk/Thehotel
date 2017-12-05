<?php



App::uses('AppController', 'Controller');



class GuideListsController extends AppController {


////////////////////////////////////////////////////////////

    public $components = array('Paginator');


////////////////////////////////////////////////////////////

    public function admin_index() {

    Configure::write('debug', 0);

        $this->Paginator->settings = array(



            'recursive' => 2,



            'order' => array(



                'GuideList.title' => 'ASC'



            ),



            'limit' => 100,



        );

        // echo "<pre>";
        // print_r($this->Paginator->paginate('GuideList')); die;

        $this->set('GuideList', $this->Paginator->paginate('GuideList'));



    }







////////////////////////////////////////////////////////////







    public function admin_view($id = null) {



        if (!$this->GuideList->exists($id)) {



            throw new NotFoundException('Invalid GuideList');



        }



        $options = array('conditions' => array('GuideList.id' => $id));



        $this->set('GuideList', $this->GuideList->find('first', $options));



    }







////////////////////////////////////////////////////////////







    public function admin_add($id = null) {



		$this->set('idx',$id);

        if ($this->request->is('post')) {

			$imageNamexx= [];
            
            $image = $this->request->data['GuideList']['image'];

             // $imageq = $this->request->data['GuideList']['image']['name'];

            if($image[0]['name'] !=''){

            $uploadFolder = "Addhotels";

            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            foreach ($this->request->data['GuideList']['image'] as $value){

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
               
                $this->request->data['GuideList']['image'] = $photo;

             }
            else{
                  $this->request->data['GuideList']['image'] = "";
            } 

            $this->GuideList->create();



            if ($this->GuideList->save($this->request->data)) {



                $this->Session->setFlash('The GuideList has been saved.');



                return $this->redirect(array('action' => 'index' ));

            } else {

                $this->Session->setFlash('The GuideList could not be saved. Please, try again.');


            }

        }

    }







////////////////////////////////////////////////////////////







    public function admin_edit($id = null) {

        if (!$this->GuideList->exists($id)) {
            throw new NotFoundException('Invalid GuideList');
        }

		$imagezz = $this->GuideList->find('first',array('conditions'=>array('GuideList.id'=>$id)));

		$imagexx = $imagezz['GuideList']['image'];
        $imgxx = explode(",",$imagexx);
		$this->set('imagexx',$imgxx);

        if ($this->request->is(array('post', 'put'))) {

            $imageNamexx= [];
            
			$image = $this->request->data['GuideList']['image'];

			 // $imageq = $this->request->data['GuideList']['image']['name'];

			if($image[0]['name'] !=''){

            $uploadFolder = "Addhotels";

            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            foreach ($this->request->data['GuideList']['image'] as $value){

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
               
                $this->request->data['GuideList']['image'] = $photo;


			 }else{



				 $imagex = $this->GuideList->find('first',array('conditions'=>array('GuideList.id'=>$id)));



				 //print_r($imagex);



				 $this->request->data['GuideList']['image'] = $imagex['GuideList']['image'];



				 



			 }



			



			



			



            if ($this->GuideList->save($this->request->data)) {



                $this->Session->setFlash('The GuideList has been saved.');



                return $this->redirect(array('action' => 'index'));



            } else {



                $this->Session->setFlash('The GuideList could not be saved. Please, try again.');



            }



        } else {



            $options = array('conditions' => array('GuideList.id' => $id));



            $this->request->data = $this->GuideList->find('first', $options);



        }



    }







////////////////////////////////////////////////////////////







    public function admin_delete($id = null) {



        $this->GuideList->id = $id;



        if (!$this->GuideList->exists()) {



            throw new NotFoundException('Invalid GuideList');



        }



        $this->request->onlyAllow('post', 'delete');



        if ($this->GuideList->delete()) {



            $this->Session->setFlash('The GuideList has been deleted.');



        } else {



            $this->Session->setFlash('The GuideList could not be deleted. Please, try again.');



        }



        return $this->redirect(array('action' => 'index'));



    }



	



////////////////////////////////////////////////////////////



}



