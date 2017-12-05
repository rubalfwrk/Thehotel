<?php

/**

 * 

 */

App::uses('AppController', 'Controller');

App::uses('CakeEmail', 'Network/Email');



class HotelsController extends AppController {

////////////////////////////////////////////////////////////

    public function beforeFilter() {

        parent::beforeFilter();
        $this->Auth->allow('admin_view','admin_about','admin_add','admin_deleteabout');
    }

////////////////////////////////////////////////////////////

    public function admin_hotel() {

        Configure::write("debug", 0);
       
        $this->loadModel('Addhotel');
        $this->loadModel('User');

        $hotelinfo = $this->Addhotel->find('all');
        $adminid = $this->Auth->user('id');

        $users = $this->User->find('first', array('conditions' => array('User.id' => $adminid)));
               
        $this->set('users',$hotelinfo);
        $this->set('admincode',$users);
        
        
    }

    public function admin_view($id = null) {
        
        Configure::write("debug",0);
        
        $this->loadModel('Addhotel');
        $this->loadModel('About');
        $this->loadModel('Service');
        $this->loadModel('Facilitie');
        $this->loadModel('Accommodation');
        $this->loadModel('Questionnaire');
        $this->loadModel('Social');
        $this->loadModel('Contact');

        
        $hotel = $this->Addhotel->find('all',array('conditions' => array('Addhotel.id' => $id)));
        $this->set('hotel', $hotel);
        $about = $this->About->find('all',array('conditions' => array('About.hotelid' => $id)));
        $this->set('about', $about);
        $service = $this->Service->find('all',array('conditions' => array('Service.hotelid' => $id)));
        $this->set('service', $service);
        $facilitie = $this->Facilitie->find('all',array('conditions' => array('Facilitie.hotelid' => $id)));
        $this->set('facilitie', $facilitie);
        $accommodation = $this->Accommodation->find('all',array('conditions' => array('Accommodation.hotelid' => $id)));
        $this->set('accommodation', $accommodation);
        $social = $this->Social->find('all',array('conditions' => array('Social.hotelid' => $id)));
        $this->set('social', $social);
        $questionnaire = $this->Questionnaire->find('all',array('conditions' => array('Questionnaire.hotelid' => $id)));
        $this->set('questionnaire', $questionnaire);
        $contact = $this->Contact->find('all',array('conditions' => array('Contact.hotelid' => $id)));
        $this->set('contact', $contact);
 
        $this->Addhotel->id = $id;
        if (!$this->Addhotel->exists()) {
            throw new NotFoundException('Invalid user');
        }
        
    }

    public function admin_edit($id = null) {
        
        Configure::write("debug", 0);
        $this->loadModel('Addhotel');

        if (!$this->Addhotel->exists($id)) {
            throw new NotFoundException(__('Invalid hotel'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Addhotel->save($this->request->data)) {
                return $this->flash(__('The hotel has been saved.'), array('action' => 'hotel'));
            }
        } else {
            $options = array('conditions' => array('Addhotel.id' => $id));
            $this->request->data = $this->Addhotel->find('first', $options);
             // $log = $this->Addhotel->getDataSource();
             // print_r($log); die;
        }
        // $users = $this->Addhotel->User->find('list');
        // $this->set(compact('users'));
    }

    public function admin_delete($id = null) {

        Configure::write("debug", 2);

        $this->loadModel('Addhotel');
        $this->loadModel('About');
        $this->loadModel('Service');
        $this->loadModel('Facilitie');
        $this->loadModel('Accommodation');
        $this->loadModel('Social');
        $this->loadModel('Contact');
        $this->loadModel('Questionnaire');

        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        // $this->Addhotel->id = $id;
        $this->About->query("DELETE FROM abouts WHERE hotelid = '".$id."' ");
        $this->Addhotel->query("DELETE FROM addhotels WHERE id = '".$id."' ");
        $this->Service->query("DELETE FROM services WHERE hotelid = '".$id."' ");
        $this->Facilitie->query("DELETE FROM facilities WHERE hotelid = '".$id."' ");
        $this->Accommodation->query("DELETE FROM accommodations WHERE hotelid = '".$id."' ");
        $this->Social->query("DELETE FROM socials WHERE hotelid = '".$id."' ");     
        $this->Contact->query("DELETE FROM contacts WHERE hotelid = '".$id."' ");     
        $this->Questionnaire->query("DELETE FROM questionnaires WHERE hotelid = '".$id."' ");     

        // if (!$this->Addhotel->exists()) {
        //     throw new NotFoundException('Invalid Id');
        // }
        
        $this->Session->setFlash('Hotel deleted');
        return $this->redirect(array('action' => 'hotel'));
    }

    public function admin_about($id=null){

        Configure::write('debug',0);
        $this->loadModel('Addhotel');
        $this->loadModel('About');

         $hotel = $this->Addhotel->find('all',array('conditions' => array('Addhotel.id' => $id)));
        $this->set('hotel', $hotel);
        $about = $this->About->find('all',array('conditions' => array('About.hotelid' => $id)));
        $this->set('abt', $about);
    }

    


    public function admin_add($id = null) {

        // echo $id;
        // die();

        $this->set('idx',$id);

        if ($this->request->is('post')) {
        $this->loadModel('About');


             $image = $this->request->data['About']['image'];

            $uploadFolder = "Addhotels";

            //full path to upload folder

            $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;

            //check if there wasn't errors uploading file on serwer

            if ($image['error'] == 0) {  

                $imageName = $image['name'];

                if (file_exists($uploadPath . DS . $imageName)) {

                    $imageName = date('His') . $imageName;

                }

                $full_image_path = $uploadPath . DS . $imageName;

                $this->request->data['About']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/".$imageName;

                move_uploaded_file($image['tmp_name'], $full_image_path);

               

            } 

            

            $this->About->create();

            if ($this->About->save($this->request->data)) {

                $this->Session->setFlash('The About has been saved.');

                return $this->redirect(array('action' => 'about',$id));
                // return $this->redirect($this->referer());

                // return $this->redirect(array('action' => 'index'));

            } else {

                $this->Session->setFlash('The About could not be saved. Please, try again.');

            }

        }

    }

    public function admin_deleteabout($hotelid=null,$id= null){
        $this->loadModel('About');

        $this->About->id = $id;
        if (!$this->About->exists()) {

            throw new NotFoundException('Invalid About');

        }

        $this->request->onlyAllow('post', 'delete');

        if ($this->About->delete()) {

            $this->Session->setFlash('The About has been deleted.');

        } else {

            $this->Session->setFlash('The About could not be deleted. Please, try again.');

        }

        return $this->redirect(array('action' => 'admin_about',$hotelid));


    }
}