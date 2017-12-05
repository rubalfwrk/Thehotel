<?php







/**
 * 
 */



App::uses('AppController', 'Controller');



App::uses('CakeEmail', 'Network/Email');







class ChatsController extends AppController {



////////////////////////////////////////////////////////////

	public $components = array('Paginator');

    public function beforeFilter() {



        parent::beforeFilter();

        $this->Auth->allow('api_chat','api_readchat','api_chatview','api_buyerreadmsg','admin_msg');

    }



    public function admin_index(){

    	

    }

	

  	public function api_chat(){

		configure::write('debug', 0);

		// $this->layout = "ajax";

        $postdata = file_get_contents("php://input");
        

        $redata = json_decode($postdata);

		if($redata){

		$this->request->data['Chat']['uid'] = $redata->chat->uid;  

		$this->request->data['Chat']['aid'] = $redata->chat->aid;

		$this->request->data['Chat']['name'] = $redata->chat->name;

		$this->request->data['Chat']['msg'] = $redata->chat->msg;

		// $this->request->data['Chat']['image'] = $redata->chat->image;

		$this->request->data['Chat']['sender'] = $redata->chat->sender;





		if($redata->chat->image){



			$img1 = base64_decode($redata->chat->image);

        	$im1 = imagecreatefromstring($img1);



            $image1 = "1" . time() . ".png";

            imagepng($im1, WWW_ROOT . "files" . DS . "chat_pic" . DS . $image1);

            imagedestroy($im1);

	

		 	$this->request->data['Chat']['image'] = $image1;

		 	$datax = $this->Chat->save($this->request->data);

		 } else {

		 $this->request->data['Chat']['image'] = '';

		 $datax = $this->Chat->save($this->request->data);

		 }

		 

  		if ($datax) {

            $response['isSuccess'] = "true";

            $response['data'] = "msg successfully submited";

        } else {

            $response['isSuccess'] = "false";

            $response['msg'] = "Error try again";

        }

	}		

        echo json_encode($response);

        exit;		

	}





	public function api_readchat(){

		configure::write('debug', 0);

		$this->layout = "ajax";

        $postdata = file_get_contents("php://input");

        $redata = json_decode($postdata);		

		$chat_id = $redata->chat->chat_id;// = 92; 

		$type = $redata->chat->type;//='Customer'; 

		if($type=='Customer'){					

		$data = $this->Chat->updateAll(

		array('aread' => 1),

		array('id' => $chat_id)

		);	

		}else{

		$data = $this->Chat->updateAll(

		array('uread' => 1),

		array('id' => $chat_id)

		);	

		}

		if($data){

			$response['isSuccess'] = "true";

			$response['msg'] = "read chat";

		}

		else {

            $response['isSuccess'] = "false";

            $response['data'] = "try again";

		}

        echo json_encode($response);

        exit;

	}



	public function api_chatview(){

		configure::write('debug', 0);

		$postdata = file_get_contents("php://input");

        $redata = json_decode($postdata);

		

		$uid = $redata->chat->uid;//  = 13; 

	$aid = $redata->chat->aid;//  = 53;     

		$chat = $this->Chat->find('all',array('conditions' => array
              (
                  'OR' => array('AND' =>
                    array(
                        'Chat.uid' => $uid,
                        'Chat.aid' => $aid
                    ), array('AND' =>
                    array(
                        'Chat.uid' => $aid,
                        'Chat.aid' => $uid
                        )
                  ))
                 
              ),'order'=>'Chat.id ASC'));

		

		

		foreach ($chat as $res) {

                if ($res['Chat']['image']) {

                    $res['Chat']['image'] = FULL_BASE_URL . $this->webroot . 'files/chat_pic/' . $res['Chat']['image'];

                } 

                $res1[] = $res;

            }

			

			

		if ($res1) {

            $response['isSuccess'] = "true";

            $response['data'] = $res1;

        } else {

            $response['isSuccess'] = "false";

            $response['msg'] = "Error try again";

        }		

        echo json_encode($response);

        exit;

	}



	public function api_buyerreadmsg(){

		configure::write('debug', 0);

		$this->layout = "ajax";

        $postdata = file_get_contents("php://input");

        $redata = json_decode($postdata);		

		$uid = $redata->chat->uid; 

		$sender = $redata->chat->sender;

					

		$getresult = $this->Chat->find('all',array('conditions'=>array('AND' =>array('uid'=>$uid,'uread'=>0,'sender'=>$sender))));

		$count = count($getresult);		

		//print_r($getresult);

		//exit;

		if($getresult){

			$response['isSuccess'] = "true";

			$response['data'] = $getresult;

			$response['count'] = $count;

		}

		else {

            $response['isSuccess'] = "false";

            $response['data'] = "try again";

		}

        echo json_encode($response);

        exit;

	}

	

	

	

	 public function admin_msg() {

		    Configure::write("debug", 0);

			$this->loadModel('User');
			$this->loadModel('Chat');

		    $adminid = $this->Auth->user('id');

            $usersx = $this->User->find('first', array('conditions' => array('User.id' => $adminid),'fields' => array('code')));

            $admincode = $usersx['User']['code'];

		 $this->Paginator = $this->Components->load('Paginator');

		    $this->Paginator->settings = array(

                'User' => array(

                    'recursive' => -1,

                    'conditions' => array('User.code' => $admincode,'User.role' => 'customer'

                    ),

                    'order' => array(

                        'User.reservationname' => 'DESC'

                    ),

                    'limit' => 20,

                    'paramType' => 'querystring',

                )

            );  
   

          $users = $this->Paginator->paginate('User');

          $this->set(compact('users'));		

          $adminid = $this->Auth->user('id');
       		if ($_POST['box']) {


       		$box = $_POST['box'];
       		
       		for ($i=0; $i < count($box); $i++) { 
       			
       			if($box[$i] != 0){
       			$aid = $box[$i];
       			$data['Chat']['msg'] = $_POST['data']['chat']['msg'];
	            $data['Chat']['sender'] = 'rest_admin';
	            $data['Chat']['uid'] = $adminid;
	            $data['Chat']['aid'] = $aid;
	            
	            $this->Chat->create();
	            $this->Chat->save($data);

       			}
       		}
       		

            $this->Session->setFlash('The chat has been saved.');

            return $this->redirect($this->referer());

        }	

    }

}

