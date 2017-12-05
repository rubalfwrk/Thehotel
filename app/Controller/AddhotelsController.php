<?php



/**
* 
 */

App::uses('AppController', 'Controller');

App::uses('CakeEmail', 'Network/Email');



class AddhotelsController extends AppController {

////////////////////////////////////////////////////////////

    public function beforeFilter() {

        parent::beforeFilter();
        $this->Auth->allow(array('api_hotelcode','api_abouthotel','api_groupname','api_service','api_facilitielist','api_facilitie','api_accommodation','api_socialmedia','api_contact','api_questionnaire','api_questionnaires_answers','admin_about','api_hotelbackground'));
    }

////////////////////////////////////////////////////////////

    public function admin_hoteladd() {

        Configure::write("debug", 0);
        
        if ($this->request->data['AddHotel']['code']) {
            
            $this->loadModel('AddHotel');
            $data['AddHotel']['hotelname'] = $this->request->data['AddHotel']['hotel name'];
             $data['AddHotel']['hotelname_greek'] = $this->request->data['AddHotel']['hotelname_greek'];
            $data['AddHotel']['code'] = $this->request->data['AddHotel']['code'];
            $data['AddHotel']['groupname'] = $this->request->data['AddHotel']['group name'];
             $data['AddHotel']['groupname_greek'] = $this->request->data['AddHotel']['groupname_greek'];
            $data['AddHotel']['description'] = $this->request->data['AddHotel']['description'];
             $data['AddHotel']['description_greek'] = $this->request->data['AddHotel']['description_greek'];

            // print_r($this->request->data); die;
            $this->AddHotel->create();
            $this->AddHotel->save($data);

            if ($this->AddHotel->save($data)) {

            $id = $this->AddHotel->getLastInsertID();

            if($id!=""){
               
                if(count($this->request->data['About']['about'])>0){
                     $this->loadModel('About');

                    $uploadFolder = "Addhotels";
                    
                    $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;
                    
                    for($k=0;$k<count($this->request->data['About']['about']);$k++){

                        $all =array();
                        $all['About']['hotelid'] = $id;

                            $image1 = $this->request->data['About']['about'][$k];
                            
                             if ($image1['error'] == 0) {
                                
                                $imageName1 = $image1['name'];
                                if (file_exists($uploadPath . DS . $imageName1)) {
                                    $imageName1 = date('His') . $imageName1;
                                }

                                $full_image_path1 = $uploadPath . DS . $imageName1;
                                move_uploaded_file($image1['tmp_name'], $full_image_path1);                            
                                $all['About']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/" .$imageName1;

                                $this->About->create();
                                $this->About->save($all);
                            }
                    }

                } 

                if(count($this->request->data['Service']['title'])>0){
                     $this->loadModel('Service');
       
                    for($k=0;$k<count($this->request->data['Service']['title']);$k++){

                        if(($this->request->data['Service']['title'][$k]!="") &&  ($this->request->data['Service']['description'][$k]!="")){
                            $new =array();
                            $new['Service']['hotelid'] = $id;
                            $new['Service']['title'] = $this->request->data['Service']['title'][$k];
                            $new['Service']['title_greek'] = $this->request->data['Service']['title_greek'][$k];
                            $new['Service']['description'] = $this->request->data['Service']['description'][$k];
                            $new['Service']['description_greek'] = $this->request->data['Service']['description_greek'][$k];

                            $this->Service->create();
                            $this->Service->save($new);                       
                        }                

                    }
                }

                if(count($this->request->data['Facilitie']['title'])>0){
                  
                    $this->loadModel('Facilitie');
                    $uploadFolder = "Addhotels";
                    
                    $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;

                    for($k=0;$k<count($this->request->data['Facilitie']['title']);$k++){

                        if(($this->request->data['Facilitie']['title'][$k]!="") &&  ($this->request->data['Facilitie']['description'][$k]!="")){
                            $new =array();
                            $new['Facilitie']['hotelid'] = $id;
                            $new['Facilitie']['category'] = $this->request->data['Facilitie']['category'][$k];
                            $new['Facilitie']['title'] = $this->request->data['Facilitie']['title'][$k];
                            $new['Facilitie']['description'] = $this->request->data['Facilitie']['description'][$k];
                            $new['Facilitie']['category_greek'] = $this->request->data['Facilitie']['category_greek'][$k];
                            $new['Facilitie']['title_greek'] = $this->request->data['Facilitie']['title_greek'][$k];
                            $new['Facilitie']['description_greek'] = $this->request->data['Facilitie']['description_greek'][$k];

                            $new['Facilitie']['image'] = $this->request->data['Facilitie']['image'][$k];
                            if ($image1['error'] == 0) {
                                
                                $imageName1 = $image1['name'];
                            }
                            if (file_exists($uploadPath . DS . $imageName1)) {
                                    $imageName1 = date('His') . $imageName1;
                            }
                            $full_image_path1 = $uploadPath . DS . $imageName1;
                                move_uploaded_file($image1['tmp_name'], $full_image_path1);                            
                            $new['Facilitie']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/" .$imageName1;

                            $this->Facilitie->create();
                            $this->Facilitie->save($new);  

                        }                

                    }
                }

                if(count($this->request->data['Accommodation']['title'])>0){
                  
                    $this->loadModel('Accommodation');
                    $uploadFolder = "Addhotels";
                    
                    $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;

                    for($k=0;$k<count($this->request->data['Accommodation']['title']);$k++){

                        if(($this->request->data['Accommodation']['title'][$k]!="") && ($this->request->data['Accommodation']['description'][$k]!="")){
                            $new =array();
                            $new['Accommodation']['hotelid'] = $id;
                            $new['Accommodation']['title'] = $this->request->data['Accommodation']['title'][$k];
                            $new['Accommodation']['description'] = $this->request->data['Accommodation']['description'][$k];
                             $new['Accommodation']['title_greek'] = $this->request->data['Accommodation']['title_greek'][$k];
                            $new['Accommodation']['description_greek'] = $this->request->data['Accommodation']['description_greek'][$k];
                            $new['Accommodation']['image'] = $this->request->data['Accommodation']['image'][$k];
                            if ($image1['error'] == 0) {
                                
                                $imageName1 = $image1['name'];
                            }
                            if (file_exists($uploadPath . DS . $imageName1)) {
                                    $imageName1 = date('His') . $imageName1;
                            }
                            $full_image_path1 = $uploadPath . DS . $imageName1;
                                move_uploaded_file($image1['tmp_name'], $full_image_path1);                            
                            $new['Accommodation']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/" .$imageName1;

                            $this->Accommodation->create();
                            $this->Accommodation->save($new);  

                        }                

                    }
                }

                if(count($this->request->data['Questionnaire']['category'])>0){
                  
                    $this->loadModel('Questionnaire');
                    
                    for($k=0;$k<count($this->request->data['Questionnaire']['category']);$k++){

                        if(($this->request->data['Questionnaire']['category'][$k]!="") && ($this->request->data['Questionnaire']['question'][$k]!="")){
                            $new =array();
                            $new['Questionnaire']['hotelid'] = $id;
                            $new['Questionnaire']['category'] = $this->request->data['Questionnaire']['category'][$k];
                            $new['Questionnaire']['question'] = $this->request->data['Questionnaire']['question'][$k];
                            $new['Questionnaire']['category_greek'] = $this->request->data['Questionnaire']['category_greek'][$k];
                            $new['Questionnaire']['question_greek'] = $this->request->data['Questionnaire']['question_greek'][$k];
                            $this->Questionnaire->create();
                            $this->Questionnaire->save($new);  
                            // $log = $this->Questionnaire->getDataSource();
                            // print_r($log); die;
                        }                

                    }
                }

                if(count($this->request->data['Social']['title'])>0){
                  
                    $this->loadModel('Social');                   

                    for($k=0;$k<count($this->request->data['Social']['title']);$k++){

                        if(($this->request->data['Social']['title'][$k]!="") && ($this->request->data['Social']['link'][$k]!="")){
                            $new =array();
                            $new['Social']['hotelid'] = $id;
                            $new['Social']['title'] = $this->request->data['Social']['title'][$k];
                            $new['Social']['title_greek'] = $this->request->data['Social']['title_greek'][$k];
                            $new['Social']['link_greek'] = $this->request->data['Social']['link_greek'][$k];

                            $this->Social->create();
                            $this->Social->save($new);  

                        }                

                    }
                }


                if($this->request->data['AddHotel']['contactus']){
                    $this->loadModel('Contact');

                $data['Contact']['hotelid'] = $id;
                $data['Contact']['info'] = $this->request->data['AddHotel']['contactus'];

                $this->Contact->create();
                $this->Contact->save($data);
                }

                if(count($this->request->data['UsefulNumber']['title'])>0){ 
                  
                    $this->loadModel('UsefulNumber');
                    $uploadFolder = "Addhotels";
                    
                    $uploadPath = WWW_ROOT . '/files/' . $uploadFolder;

                    for($k=0;$k<count($this->request->data['UsefulNumber']['title']);$k++){

                        if(($this->request->data['UsefulNumber']['title'][$k]!="") && ($this->request->data['UsefulNumber']['number'][$k]!="")){
                            $new =array();
                            $new['UsefulNumber']['hotelid'] = $id;
                            $new['UsefulNumber']['title'] = $this->request->data['UsefulNumber']['title'][$k];
                            $new['UsefulNumber']['title_greek'] = $this->request->data['UsefulNumber']['title_greek'][$k];
                            $new['UsefulNumber']['number'] = $this->request->data['UsefulNumber']['number'][$k];

                            // $new['UsefulNumber']['image'] = $this->request->data['UsefulNumber']['image'][$k];
                            // if ($image1['error'] == 0) {
                                
                            //     $imageName1 = $image1['name'];
                            // }
                            // if (file_exists($uploadPath . DS . $imageName1)) {
                            //         $imageName1 = date('His') . $imageName1;
                            // }
                            // $full_image_path1 = $uploadPath . DS . $imageName1;
                            //     move_uploaded_file($image1['tmp_name'], $full_image_path1);                            
                            // $new['UsefulNumber']['image'] = FULL_BASE_URL . $this->webroot . "files/Addhotels/" .$imageName1;

                            $this->UsefulNumber->create();
                            $this->UsefulNumber->save($new);  

                        }                

                    }
                }
                              
            }              
        }  
        return $this->redirect(array('controller' => 'hotels', 'action' => 'hotel'));
        $this->Session->setFlash('Saved Successfully');
    }
    }

    public function api_hotelcode(){

        Configure::write('debug',0);
        $this->loadModel('AddHotel');
            
            $check = $this->AddHotel->find('all', array('fields' => array('AddHotel.code')));
            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Hotel Code';

        echo json_encode($response);
        exit;
    }

    public function api_hotelbackground(){

        Configure::write('debug',0);
        $this->loadModel('Background');
            
            $check = $this->Background->find('first', array('conditions' => array('Background.hotelid' => $this->request->data['id'])));
            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Background of hotel';

        echo json_encode($response);
        exit;
    }

	public function api_hotelinfo(){

		Configure::write('debug',0);
		$this->loadModel('AddHotel');

		$postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);

        $this->request->data['AddHotel']['code'] = $redata->AddHotel->code;

        if ($this->request->is('post')) {
        	
			$check = $this->AddHotel->find('first', array('conditions' => array(
                    "AddHotel.code" => $this->request->data['AddHotel']['code']
                )));
			$response['result'] = $check;
		    $response['status'] = true;
            $response['msg'] = 'Hotel Info';

		} else {
			
		   $response['status'] = False;
           $response['msg'] = 'Code doesnot exists.';	

		}

		echo json_encode($response);
        exit;
	}

	public function api_abouthotel(){

		Configure::write('debug',0);
		$this->loadModel('About');

		$postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['About']['hotelid'] = $redata->AddHotel->id;

        if ($this->request->is('post')) {
        	 
			$check = $this->About->find('all', array(
			'joins' => array(
			    array(
			        'table' => 'addhotels',
			        'alias' => 'addhotels',
			        'type' => 'INNER',
			        'conditions' => array(
			            'addhotels.id = About.hotelid'
			        )
			    )
			),
			'conditions' => array(
			    'About.hotelid' => $this->request->data['About']['hotelid']
			),
			'fields' => array('addhotels.*', 'About.*')
			));

			// $log = $this->About->getDataSource();

			$response['result'] = $check;
		    $response['status'] = true;
            $response['msg'] = 'About Hotel';

		} else {
			
		   $response['status'] = False;
           $response['msg'] = 'Info doesnot exists.';	

		}

		echo json_encode($response);
        exit;
	}

    public function api_groupname(){

        Configure::write('debug',0);
        $this->loadModel('AddHotel');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
         $this->request->data['AddHotel']['groupname'] = $redata->AddHotel->groupname;
       // $this->request->data['AddHotel']['groupname'] = "Group Hotels";

        if ($this->request->is('post')) {

            $check = $this->AddHotel->find('all', array('conditions' => array(
                    "AddHotel.groupname" => $this->request->data['AddHotel']['groupname']
                ),'fields' => array('AddHotel.hotelname','AddHotel.hotelname_greek','AddHotel.id','(SELECT  image FROM  `abouts` WHERE hotelid = AddHotel.id LIMIT 1) as image'))); 

            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Hotels Name';

        } else {
            
          $response['status'] = False;
          $response['msg'] = 'Hotels doesnot exists.';   

        }

        echo json_encode($response);
        exit;
    }

    public function api_service(){

        Configure::write('debug',0);
        $this->loadModel('Service');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['Service']['hotelid'] = $redata->Service->id;

        if ($this->request->is('post')) {

            $check = $this->Service->find('all', array('conditions' => array(
                    "Service.hotelid" => $this->request->data['Service']['hotelid']
                ),'order'=>array('Service.id'=>'ASC')));
            //$log = $this->About->getDataSource();
            //print_r($log); die;
            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Hotels Services';

        } else {
            
           $response['status'] = False;
           $response['msg'] = 'Hotels Services doesnot exists.';   

        }

        echo json_encode($response);
        exit;
    }


    public function api_facilitielist(){

        Configure::write('debug', 0);
        $this->loadModel('Facilitie');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['Facilitie']['hotelid'] = $redata->Facilitie->id;
        if ($this->request->is('post')) {

            $check = $this->Facilitie->find('all', array('conditions' => array(
                    "Facilitie.hotelid" => $this->request->data['Facilitie']['hotelid']
                ),'fields' => array('`Facilitie`.`category`','`Facilitie`.`category_greek`','`Facilitie`.`image`'),'group' => '`Facilitie`.`category`','order'=>array('Facilitie.id'=>'ASC')));

            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Hotels Facilities';
            // $log = $this->Facilitie->getDataSource();
            // print_r($log); die;
        } else {
            
            $response['status'] = False;
            $response['msg'] = 'Hotels Facilities doesnot exists.';   

        }

        echo json_encode($response);
        exit;
    }

    public function api_facilitie(){

        Configure::write('debug', 0);
        $this->loadModel('Facilitie');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['Facilitie']['hotelid'] = $redata->Facilitie->id;
        $this->request->data['Facilitie']['category'] = $redata->Facilitie->category;

        if ($this->request->is('post')) {

            $check = $this->Facilitie->find('all', array('conditions' => array(
                    "Facilitie.hotelid" => $this->request->data['Facilitie']['hotelid'],"Facilitie.category" => $this->request->data['Facilitie']['category']
                )));

            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Hotels Facilities';
            // $log = $this->Facilitie->getDataSource();
            // print_r($log); die;
        } else {
            
            $response['status'] = False;
            $response['msg'] = 'Hotels Facilities doesnot exists.';   

        }

        echo json_encode($response);
        exit;
    }

    public function api_accommodation(){

        Configure::write('debug', 0);
        $this->loadModel('Accommodation');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['Accommodation']['hotelid'] = $redata->Accommodation->id;
       
        if ($this->request->is('post')) {

            $check = $this->Accommodation->find('all', array('conditions' => array(
                    "Accommodation.hotelid" => $this->request->data['Accommodation']['hotelid']
                ),'order'=>array('Accommodation.id'=>'ASC')));
            
            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Hotels Accommodations';

        } else {
            
            $response['status'] = False;
            $response['msg'] = 'Hotels Accommodations doesnot exists.';   

        }

        echo json_encode($response);
        exit;
    }

    public function api_usefulnumbers(){

        Configure::write('debug', 0);
        $this->loadModel('UsefulNumber');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['UsefulNumber']['hotelid'] = $redata->UsefulNumber->id;
        if ($this->request->is('post')) {

            $check = $this->UsefulNumber->find('all', array('conditions' => array(
                    "UsefulNumber.hotelid" => $this->request->data['UsefulNumber']['hotelid']
                )));

            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Hotel Useful Numbers';

        } else {
            
            $response['status'] = False;
            $response['msg'] = 'Hotel Useful Numbers doesnot exists.';   

        }

        echo json_encode($response);
        exit;
    }

    public function api_socialmedia(){

        Configure::write('debug', 0);
        $this->loadModel('Social');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['Social']['hotelid'] = $redata->Social->id;
        if ($this->request->is('post')) {

            $check = $this->Social->find('all', array('conditions' => array(
                    "Social.hotelid" => $this->request->data['Social']['hotelid']
                )));

            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Hotels Social Media';

        } else {
            
            $response['status'] = False;
            $response['msg'] = 'Hotels Social Media doesnot exists.';   

        }

        echo json_encode($response);
        exit;
    }

    public function api_contact(){

        Configure::write('debug', 0);
        $this->loadModel('Contact');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['Contact']['hotelid'] = $redata->Contact->id;
        if ($this->request->is('post')) {

            $check = $this->Contact->find('all', array('conditions' => array(
                    "Contact.hotelid" => $this->request->data['Contact']['hotelid']
                )));

            $response['result'] = $check;
            $response['status'] = true;
            $response['msg'] = 'Hotels Contact';

        } else {
            
            $response['status'] = False;
            $response['msg'] = 'Hotels Contact doesnot exists.';   

        }

        echo json_encode($response);
        exit;
    }

    public function api_questionnaire(){

        Configure::write('debug', 0);
        $this->loadModel('Questionnaire');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        
        $this->request->data['Questionnaire']['hotelid'] = $redata->Questionnaire->id;
        if ($this->request->is('post')) {

            $check = $this->Questionnaire->find('all', array('conditions' => array(
                    "Questionnaire.hotelid" => $this->request->data['Questionnaire']['hotelid']
                )));
            $sendarray =array();
          

            for($i=0;$i<count($check);$i++){
                $sendarray[$check[$i]['Questionnaire']['category']][] = $check[$i]['Questionnaire'];
            } 

            $ml =array();

            $counter = 0;

            foreach ($sendarray as $key => $val) {
                $ml[$counter]['category']= $key;
                $ml[$counter]['category_greek']= $key;
                $ml[$counter]['value']= $val;
                
                $counter++;           
            }
            // echo "<pre>";
            // print_r($ml);
            // print_r($sendarray);
            // die;
            $response['result'] = $ml;
            $response['status'] = true;
            $response['msg'] = 'Hotels Questionnaire';

        } else {
            
            $response['status'] = False;
            $response['msg'] = 'Hotels Questionnaire doesnot exists.';   

        }

        echo json_encode($response);
        exit;
    }

    public function api_questionnaires_answers(){

        Configure::write('debug', 0);
        $this->loadModel('QuestionnairesAnswer');

        $postdata = file_get_contents("php://input");
        $redata = json_decode($postdata);
        if ($redata) {
            
            $this->loadModel('QuestionnairesAnswer');
            $this->loadModel('Rating');
		$result = array();
            $result = $redata->QuestionnairesAnswer->result;
            
            $data['QuestionnairesAnswer']['userid'] = $redata->QuestionnairesAnswer->userid;
            $stor['Rating']['rating'] = $redata->QuestionnairesAnswer->rating;
            $stor['Rating']['comments'] = $redata->QuestionnairesAnswer->comments;
            $stor['Rating']['userid']  = $redata->QuestionnairesAnswer->userid;

           	$check = $this->QuestionnairesAnswer->find('all', array('conditions' => array(
                    "QuestionnairesAnswer.userid" => $data['QuestionnairesAnswer']['userid'])));
           	if(empty($check)){
            foreach ($result as $arra) {

        	$data['QuestionnairesAnswer']['userid'] = $data['QuestionnairesAnswer']['userid'];
        	$data['QuestionnairesAnswer']['questionid'] = $arra->id;
        	$data['QuestionnairesAnswer']['answer'] = $arra->value;

            $this->QuestionnairesAnswer->create();
          	$this->QuestionnairesAnswer->save($data);

            }
		$checkrating = $this->Rating->find('all', array('conditions' => array(
                    "Rating.userid" => $data['QuestionnairesAnswer']['userid'])));
                    
                    if(empty($checkrating)){

            	$this->Rating->create();
          	$this->Rating->save($stor);
            		} else {
		$this->Rating->deleteAll(array('Rating.userid' => $data['QuestionnairesAnswer']['userid']), false);
            	$this->Rating->userid =	$data['QuestionnairesAnswer']['userid'];
            	$this->Rating->save($stor);
            		}
            $response['status'] = true;
            $response['msg'] = 'Questionnaires Answer';
        	
        	} else {
		$this->QuestionnairesAnswer->deleteAll(array('QuestionnairesAnswer.userid' => $data['QuestionnairesAnswer']['userid']), false);
				
        	foreach ($result as $arra) {
            	$data['QuestionnairesAnswer']['userid'] = $data['QuestionnairesAnswer']['userid'];
            	$data['QuestionnairesAnswer']['questionid'] = $arra->id;
            	$data['QuestionnairesAnswer']['answer'] = $arra->value;
            	$this->QuestionnairesAnswer->create();
                $this->QuestionnairesAnswer->save($data);
            	}
          
	     $checkrating = $this->Rating->find('all', array('conditions' => array(
                    "Rating.userid" => $data['QuestionnairesAnswer']['userid'])));
                   
                    if(empty($checkrating)){   
		
            	$this->Rating->create();
          	$this->Rating->save($stor);
            		} else {
			$this->Rating->deleteAll(array('Rating.userid' => $data['QuestionnairesAnswer']['userid']), false);
            	$this->Rating->userid =	$data['QuestionnairesAnswer']['userid'];
            	$this->Rating->save($stor);
            		}
           
            $response['status'] = true;
            $response['msg'] = 'Questionnaires Answer';

        	}

        } else {
            
            $response['status'] = False;
            $response['msg'] = 'No answers.';   

        }

        echo json_encode($response);
        exit;
    }


    /* Hotel Edit */

    public function admin_edithotel($id=null){
        Configure::write("debug",1);
        
        $this->loadModel('Addhotel');
        $this->loadModel('About');
        $this->loadModel('Service');
        $this->loadModel('Facilitie');
        $this->loadModel('Accommodation');
        $this->loadModel('Questionnaire');
        $this->loadModel('Social');
        $this->loadModel('Contact');
        if(isset($this->request->data['AddHotel']['hotel name'])){
            // echo "<pre>";
            // print_r($_POST);
            // die();
        }
        
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
            throw new NotFoundException('Invalid Hotel');
        }
    }


    public function admin_about($id=null){

        Configure::write('debug',2);
        $this->loadModel('About');

        $about = $this->About->find('all',array('conditions' => array('About.hotelid' => $id)));
        $this->set('about', $about);

        echo json_encode($response);
        exit;
    }

    public function admin_addhotelinfo($id=null){

        Configure::write("debug", 0);
        $this->loadModel('Addhotel');
        $this->loadModel('Hotel');

        if (!$this->Addhotel->exists($id)) {
            throw new NotFoundException(__('Invalid hotel'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Addhotel->save($this->request->data)) {
                return $this->flash(__('The hotel has been saved.'));
            }
        } else {
            $options = array('conditions' => array('Addhotel.id' => $id));
            $this->request->data = $this->Addhotel->find('first', $options);

        }

    }

}