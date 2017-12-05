<?php

App::uses('AppController', 'Controller');

class CreteExtrasController extends AppController {

////////////////////////////////////////////////////////////



    public $components = array('Paginator');

////////////////////////////////////////////////////////////


    public function admin_index() {

	Configure::write('debug', 0);


        $this->Paginator->settings = array(

            'recursive' => -1,

            'order' => array(

                'CreteExtra.title' => 'ASC'

            ),

            'limit' => 100,

        );



        $this->set('CreteExtra', $this->Paginator->paginate('CreteExtra'));

    }

 

////////////////////////////////////////////////////////////



    public function admin_view($id = null,$title = null) {

		Configure::write('debug', 0);

       /* if (!$this->CreteDetail->exists($id)) {

            throw new NotFoundException('Invalid CreteDetail');

        }*/

        $this->loadModel('CreteDetail');
		$this->loadModel('GuideShopping');

        $options = array('conditions' => array('GuideShopping.creteextraid' => $id));

        $this->set('CreteDetail', $this->GuideShopping->find('all', $options));

		 $this->set('title', $title);

       /* $options = array('conditions' => array('CreteExtra.id' => $id));

        $this->set('CreteExtra', $this->CreteExtra->find('first', $options));*/

    }



////////////////////////////////////////////////////////////



    public function admin_add() {

		Configure::write('debug', 0);

        if ($this->request->is('post')) {

			//print_r($_POST);exit;

			$image = $this->request->data['CreteExtra']['image'];

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

                $this->request->data['CreteExtra']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/".$imageName;

                move_uploaded_file($image['tmp_name'], $full_image_path);

               

            } else{
                $this->request->data['CreteExtra']['image'] = "";
            }
            $info['title'] = $this->request->data['CreteExtra']['title'];
            $info['title_greek'] = $this->request->data['CreteExtra']['title_greek'];
            $info['image'] = $this->request->data['CreteExtra']['image'];

            $this->CreteExtra->create();
             if ($this->CreteExtra->save($info)) {

			if($this->request->data['CreteExtra']['Sub_category']){
			//////////SECOUND IMAGE///////////
			           

			$lastinsertedid =  $this->CreteExtra->getLastInsertID();


			if($lastinsertedid){

			$this->loadModel('GuideShopping');

			

			$this->request->data['GuideShopping']['creteextraid']=$lastinsertedid;

			$this->request->data['GuideShopping']['title']=$this->request->data['CreteExtra']['Sub_category'];
			$this->request->data['GuideShopping']['title_greek']=$this->request->data['CreteExtra']['Sub_category_greek'];

			if($this->request->data['CreteExtra']['Sub_category_image']){

			$imageNamexx= [];
            
            $image = $this->request->data['CreteExtra']['Sub_category_image'];

            if($image){

            $uploadFolder = "Addhotels";

            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            foreach ($this->request->data['CreteExtra']['Sub_category_image'] as $value){

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
               
                $this->request->data['GuideShopping']['image'] = $photo;

             }else{
                $this->request->data['GuideShopping']['image'] = "";
            }

        }
          

			$this->request->data['GuideShopping']['latitude']=$this->request->data['CreteExtra']['latitude'];

			$this->request->data['GuideShopping']['longitude']=$this->request->data['CreteExtra']['longitude'];

			$this->request->data['GuideShopping']['description']=$this->request->data['CreteExtra']['description'];
			$this->request->data['GuideShopping']['description_greek']=$this->request->data['CreteExtra']['description_greek'];

			$this->GuideShopping->create();

            $this->GuideShopping->save($this->request->data);

			}

		    }

            $this->Session->setFlash('The CreteExtra has been saved.');

            return $this->redirect(array('action' => 'index'));

            } else {

                $this->Session->setFlash('The CreteExtra could not be saved. Please, try again.');

            }

        }

		

		

    }



////////////////////////////////////////////////////////////







	public function admin_addshop($id=Null) {

		Configure::write('debug', 0);

		$this->loadModel('GuideShopping');

		$this->set('idx',$id);

		/*$GuideCretelist = $this->GuideCrete->find('list');

		$this->set('GuideCretelist',$GuideCretelist);*/

		//print_r($this->request->is('post'));

        if ($this->request->is('post')) {



			//print_r($_POST);exit;

			 $image = $this->request->data['GuideShopping']['image'];

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

                $this->request->data['GuideShopping']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/".$imageName;

                move_uploaded_file($image['tmp_name'], $full_image_path);

               

            } 

			$this->request->data['GuideShopping']['creteextraid']=$id;

            $this->GuideShopping->create();

            if ($this->GuideShopping->save($this->request->data)) {

		

                $this->Session->setFlash('The GuideShopping has been saved.');

                return $this->redirect(array('action' => 'view/'.$id));

                // return $this->redirect(array('action' => 'index'));

            } else {

                $this->Session->setFlash('The GuideShopping could not be saved. Please, try again.');

            }

        }

    } 



////////////////////////////////////////////////////////////

    public function admin_edit($id = null) {

        if (!$this->CreteExtra->exists($id)) {

            throw new NotFoundException('Invalid CreteExtra');

        }

		

		$imagezz = $this->CreteExtra->find('first',array('conditions'=>array('CreteExtra.id'=>$id)));

		$imagexx = $imagezz['CreteExtra']['image'];

		$this->set('imagexx',$imagexx);

        if ($this->request->is(array('post', 'put'))) {

			

			//print_r($_POST);exit;

			 $imageq = $this->request->data['CreteExtra']['image']['name'];

			 $image = $this->request->data['CreteExtra']['image'];

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

                $this->request->data['CreteExtra']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/".$imageName;

                move_uploaded_file($image['tmp_name'], $full_image_path);

               

            } 

			 }else{

				 $imagex = $this->CreteExtra->find('first',array('conditions'=>array('CreteExtra.id'=>$id)));

				 //print_r($imagex);

				 $this->request->data['CreteExtra']['image'] = $imagex['CreteExtra']['image'];

				 

			 }

			

			

			

            if ($this->CreteExtra->save($this->request->data)) {

                $this->Session->setFlash('The CreteExtra has been saved.');

                return $this->redirect(array('action' => 'index'));

            } else {

                $this->Session->setFlash('The CreteExtra could not be saved. Please, try again.');

            }

        } else {

            $options = array('conditions' => array('CreteExtra.id' => $id));

            $this->request->data = $this->CreteExtra->find('first', $options);

        }

    }

    public function admin_editsub($id = null) {
    	$this->loadModel('GuideShopping');
        if (!$this->GuideShopping->exists($id)) {

            throw new NotFoundException('Invalid GuideShopping');

        }	

		$imagezz = $this->GuideShopping->find('first',array('conditions'=>array('GuideShopping.id'=>$id)));

        $imagexx = $imagezz['GuideShopping']['image'];

		$idx = $imagezz['GuideShopping']['creteextraid'];

		$imgxx = explode(",",$imagexx);
        $this->set('imagexx',$imgxx);

        if ($this->request->data) {
            
			$imageNamexx= [];
            
            $image = $this->request->data['GuideShopping']['image'];

            if($image[0]['name'] != ''){

            $uploadFolder = "Addhotels";

            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
            foreach ($this->request->data['GuideShopping']['image'] as $value){

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
               
                $this->request->data['GuideShopping']['image'] = $photo;


             }else{
                
				 $imagex = $this->GuideShopping->find('first',array('conditions'=>array('GuideShopping.id'=>$id)));
                 
				 $this->request->data['GuideShopping']['image'] = $imagex['GuideShopping']['image'];

			 }


            if ($this->GuideShopping->save($this->request->data)) {

                $this->Session->setFlash('The GuideShopping has been saved.');

                return $this->redirect(array('action' => 'view/'.$idx));

            } else {

                $this->Session->setFlash('The GuideShopping could not be saved. Please, try again.');

            }

        } else {

            $options = array('conditions' => array('GuideShopping.id' => $id));

            $this->request->data = $this->GuideShopping->find('first', $options);

        }

    }



////////////////////////////////////////////////////////////



    public function admin_delete($id = null) {

        $this->CreteExtra->id = $id;

        if (!$this->CreteExtra->exists()) {

            throw new NotFoundException('Invalid CreteExtra');

        }

        $this->request->onlyAllow('post', 'delete');

        if ($this->CreteExtra->delete()) {

            $this->Session->setFlash('The CreteExtra has been deleted.');

        } else {

            $this->Session->setFlash('The CreteExtra could not be deleted. Please, try again.');

        }

        return $this->redirect(array('action' => 'index'));

    }

    public function admin_subdelete($id = null) {

         $this->loadModel('GuideShopping');


        $this->GuideShopping->id = $id;

        if (!$this->GuideShopping->exists()) {

            throw new NotFoundException('Invalid GuideCrete');

        }

        $this->request->onlyAllow('post', 'delete');

        if ($this->GuideShopping->delete()) {

            $this->Session->setFlash('The Crete Extra has been deleted.');

        } else {

            $this->Session->setFlash('The Crete Extra could not be deleted. Please, try again.');
        }

        return $this->redirect(array('action' => 'index'));

    }

	

////////////////////////////////////////////////////////////



}

