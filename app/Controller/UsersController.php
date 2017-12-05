<?php

//ob_start();

//session_start();

App::uses('AppController', 'Controller');

App::uses('CakeEmail', 'Network/Email');


//App::import('mollie', 'mollie/examples');

class UsersController extends AppController {

////////////////////////////////////////////////////////////

	public function beforeFilter() {

		parent::beforeFilter();

		$this->Auth->allow('login', 'admin_add', 'api_login', 'api_registration', 'admin', 'admin_login', 'api_contact', 'api_forgetpwd', 'api_trackorder', 'api_addresslist', 'api_resetpwd', 'api_fblogin', 'walletipn', 'api_wallet', 'api_loginwork', 'api_ccresponse', 'api_ccresponsepickup', 'api_ccresponsewallet', 'ccresponse', 'emailverify', 'webverifyemail', 'api_verifyEmail');

	}

////////////////////////////////////////////////////////////

	public function admin_login() {
	   

		Configure::write("debug", 0);

		$this->layout = "admin2";

		// echo AuthComponent::password('admin');

		if ($this->request->is('post')) {
			$sesid = $this->Session->id();

			if ($this->Auth->login()) {

				$this->User->id = $this->Auth->user('id');

				$this->User->saveField('logins', $this->Auth->user('logins') + 1);

				$this->User->saveField('last_login', date('Y-m-d H:i:s'));

				$this->loadModel('Cart');

				if ($this->Auth->user('role') == 'admin') {

					$uploadURL = Router::url('/') . 'app/webroot/upload';

					$_SESSION['KCFINDER'] = array(

						'disabled' => false,

						'uploadURL' => $uploadURL,

						'uploadDir' => '',

					);

					return $this->redirect(array(

						'controller' => 'Users',

						'action' => 'admin_index',

						'manager' => false,

						'admin' => true,

					));

				} elseif ($this->Auth->user('role') == 'rest_admin') {

					$uploadURL = Router::url('/') . 'app/webroot/upload';

					$_SESSION['KCFINDER'] = array(

						'disabled' => false,

						'uploadURL' => $uploadURL,

						'uploadDir' => '',

					);

					return $this->redirect(array(

						'controller' => 'users',

						'action' => 'index',

						'manager' => false,

						'admin' => true,

					));

				} else {

					$this->Session->setFlash('Login is incorrect');

				}

			} else {

				$this->Session->setFlash('Login is incorrect');

			}

		}

	}

	public function login() {

		// print_r($_POST);exit;

		if ($this->request->is('post')) {

			//echo $this->request->data['User']['server'];exit;

			$sesid = $this->Session->id();

			if ($this->Auth->login()) {

				$this->User->id = $this->Auth->user('id');

				$this->User->saveField('logins', $this->Auth->user('logins') + 1);

				$this->User->saveField('last_login', date('Y-m-d H:i:s'));

				$this->loadModel('Cart');

				$updatesess = $this->Session->id();

				$this->Cart->updateAll(array('Cart.sessionid' => "'$updatesess'"), array('Cart.sessionid' => $sesid));

				if ($this->Auth->user('role') == 'customer') {

					return $this->redirect('http://' . $this->request->data['User']['server']);

				} elseif ($this->Auth->user('role') == 'admin') {

					$uploadURL = Router::url('/') . 'app/webroot/upload';

					$_SESSION['KCFINDER'] = array(

						'disabled' => false,

						'uploadURL' => $uploadURL,

						'uploadDir' => '',

					);

					return $this->redirect(array(

						'controller' => 'dashboards',

						'action' => 'dashboard',

						'manager' => false,

						'admin' => true,

					));

				} else {

					/* // echo "<script>alert('You have entered the wrong email or password')</script>";*/

					/*  //echo "<script>window.location.assign('http://rajdeep.crystalbiltech.com/dhdeals2/')</script>";*/

					$this->Session->setFlash('Login is incorrect', 'default', array(), 'loginIncorrect');

				}

			} else {

				/*//echo "<script>alert('You have entered the wrong email or password')</script>";*/

				/*  // echo "<script>window.location.assign('http://rajdeep.crystalbiltech.com/dhdeals2/')</script>";*/

				$this->Session->setFlash('Login is incorrect', 'default', array(), 'loginIncorrect');

			}

		} else {

			return $this->redirect(array('controller' => 'products', 'action' => 'index'));

		}

	}

////////////////////////////////////////////////////////////

	public function logout() {

		//$this->Session->setFlash('Good-Bye');

		$_SESSION['KCEDITOR']['disabled'] = true;

		unset($_SESSION['KCEDITOR']);

		return $this->redirect($this->Auth->logout());

	}

	public function admin_logout() {

		$this->Session->setFlash('Good-Bye');

		$_SESSION['KCEDITOR']['disabled'] = true;

		unset($_SESSION['KCEDITOR']);

		$this->Auth->logout();

		return $this->redirect('/admin');

	}

////////////////////////////////////////////////////////////

	public function customer_dashboard() {

	}

////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////

	public function admin_index() {

		Configure::write("debug", 0);

		$adminid = $this->Auth->user('id');

		$users = $this->User->find('first', array('conditions' => array('User.id' => $adminid), 'fields' => array('code')));

		$admincode = $users['User']['code'];

		if ($this->request->is("post")) {

			//  Array ( [User] => Array ( [search] => aaa ) )

			//  print_r($this->request->data);

			$keyword = $this->request->data['User']['search'];

			$users = $this->User->find('all', array('conditions' => array('User.username LIKE' => '%' . $keyword . '%', 'User.code' => $admincode, 'User.role' => 'customer')));

		} else {

			$this->Paginator = $this->Components->load('Paginator');

			if ($this->Auth->user('role') == 'admin') {

				$this->Paginator->settings = array(

					'User' => array(

						'recursive' => -1,

						'contain' => array(

						),

						'conditions' => array(

						),

						'order' => array(

							'Users.reservationname' => 'DESC',

						),

						'limit' => 20,

						'paramType' => 'querystring',

					),

				);

			} else {

				$this->Paginator->settings = array(

					'User' => array(

						'recursive' => -1,

						'conditions' => array('User.code' => $admincode, 'User.role' => 'customer',

						),

						'order' => array(

							'Users.reservationname' => 'DESC',

						),

						'limit' => 20,

						'paramType' => 'querystring',

					),

				);

			}

			$users = $this->Paginator->paginate();

		}

		$this->set(compact('users'));

		// $log = $this->User->getDataSource();

		// print_r($log); die;

		$this->set('title_for_layout', 'Users');

	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {

		$this->User->id = $id;

		if (!$this->User->exists()) {

			throw new NotFoundException('Invalid user');

		}

		$users = $this->User->find('all', array('conditions' => array('User.id' => $id)));

		$this->set('user', $users);

	}

	public function admin_chat($id = null) {

		$this->loadModel('Chat');

		$this->User->id = $id;

		$aid = $this->Auth->user('id');

		if (!$this->User->exists()) {

			throw new NotFoundException('Invalid user');

		}

		if (isset($_POST['submit'])) {

			$data['Chat']['msg'] = $_POST['message'];

			$data['Chat']['uid'] = $aid;

			$data['Chat']['aid'] = $id;

			$data['Chat']['sender'] = "rest_admin";

			$this->Chat->create();

			$this->Chat->save($data);

		}

		$users = $this->Chat->find('all', array('conditions' => array('uid' => array($id, $aid), 'aid' => array($aid, $id)), 'order' => 'Chat.id ASC'));

		//$log = $this->Chat->getDataSource();

		//print_r($users); die;

		$this->set('chat', $users);

	}

////////////////////////////////////////////////////////////

	public function admin_resadd() {

		if ($this->request->is('post')) {

			// debug($this->request->data);exit;

			if ($this->User->hasAny(array('User.username' => $this->request->data['User']['username']))) {

				$this->Session->setFlash(__('Username already exist!!!'));

				return $this->redirect(array('action' => 'resadd'));

			}

			$this->User->create();

			$resname = $this->request->data['User']['name'];

			if ($this->User->save($this->request->data)) {

				$this->loadModel('Restaurant');

				$uid = $this->User->getLastInsertID();

				$this->request->data['Restaurant']['status'] = 1;

				$this->request->data['Restaurant']['taxes'] = 0;

				$this->request->data['Restaurant']['user_id'] = $uid;

				$resname = $this->request->data['Restaurant']['name'] = $resname;

				if ($this->Restaurant->save($this->request->data)) {

					$id = $this->Restaurant->getLastInsertID();

					$this->loadModel('Tax');

					$this->request->data['Tax']['tax'] = 0;

					$this->request->data['Tax']['resid'] = $id;

					$this->Tax->save($this->request->data);

					return $this->redirect(array('controller' => 'restaurants', 'action' => 'edit/' . $id . '/' . $uid));

				}

			} else {

				$this->Session->setFlash('The user could not be saved. Please, try again.');

			}

		}

	}

	public function admin_add() {

		if ($this->request->is('post')) {

			$this->User->create();

			if ($this->User->hasAny(array('User.username' => $this->request->data['User']['username']))) {

				$this->Session->setFlash(__('Username already exist!!!'));

				return $this->redirect(array('action' => 'add'));

			}
			
			if ($this->User->hasAny(array('User.code' => $this->request->data['User']['code'],'User.role'=>'rest_admin'))) {

				$this->Session->setFlash(__('Rest Admin for this hotel  already exist!!!'));

				return $this->redirect(array('action' => 'index'));

			}


			if ($this->User->save($this->request->data)) {

				$this->Session->setFlash('The user has been saved');

				return $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash('The user could not be saved. Please, try again.');

			}

		}

	}
	
	public function index() {
   
   

	}

	public function add() {

		//echo '<pre>';print_r($_POST);die();

		if ($this->request->is('post')) {

			$this->User->create();

			if ($this->User->hasAny(array('User.username' => $this->request->data['User']['username']))) {

				$this->Session->setFlash(__('Email already exist!!!', 'flash_success'));

				echo "<script>alert('Email already exist!!!')</script>";

				echo "<script>window.location.assign('http://rajdeep.crystalbiltech.com/dhdeals2/')</script>";

			}

			if ($this->User->save($this->request->data)) {

				echo "<script>alert('You have successfully Registered')</script>";

				echo "<script>window.location.assign('http://rajdeep.crystalbiltech.com/dhdeals2/')</script>";

			} else {

				$this->Session->setFlash('The user could not be saved. Please, try again.');

			}

		}

	}

	public function adds() {

		Configure::write("debug", 0);

		if ($this->request->is('ajax')) {

			$usrData = $this->request->data;

			// echo "<pre>";

			$this->Session->write('user_data', $usrData);

			// print_r($_SESSION['']);

			$response['isSuccess'] = true;

			$response['msg'] = 'Data saved sucessfully';

		} else {

			$response['msg'] = 'Sorry please try again';

		}

		echo json_encode($response);

		exit;

	}

/*-------Email Verifcation for web-----------*/

	public function webverifyemail() {

		if ($this->request->is('post')) {

			$exist = $this->User->find("first", array('conditions' => array(

				"AND" => array(

					'User.email' => $this->request->data['email'],

					'User.verification_code' => $this->request->data['verification_code'],

					'User.active' => 0,

				),

			)));

			if ($exist) {

				//            print_r($this->request->data); exit;

				$updated = $this->User->updateAll(array('User.active' => 1, 'User.verification_code' => NULL),

					array('User.email' => $this->request->data['email'], 'User.verification_code' => $this->request->data['verification_code'], 'User.active' => 0)

				);

				$get_email = $this->request->data['email'];

				$getuserid = $this->User->find('first', array('conditions' => array('email' => $get_email)));

				$getuserid = $getuserid['User']['id'];

				$user = $this->User->findById($getuserid);

				$user = $user['User'];

				$this->Auth->login($user);

				echo "<script>alert('Email successfully verified')</script>";

				echo "<script>window.location='http://rajdeep.crystalbiltech.com/dhdeals2/'</script>";

			} else {

				echo "<script>alert('Please check your email Id or Verification code')</script>";

				echo "<script>window.location='http://rajdeep.crystalbiltech.com/dhdeals2/users/emailverify'</script>";

			}

		}

	}

//   public function api_forgetpwd() {

//         Configure::write("debug", 2);

//       //debug($this->request->data['User']);

//         $this->User->recursive = -1;

//         if (!empty($this->data)) {

//             if (empty($this->request->data['User']['uname'])) {

//                 $this->Session->setFlash('Please Provide Your Username that You used to Register with Us');

//             } else {

//                 $username = $this->request->data['User']['uname'];

//               // print_r($username);exit;

//                 $fu = $this->User->find('first', array('conditions' => array('User.username' => $username)));

//                 //print_r($username);exit;

//                 if ($fu['User']['username']) {

//                     if ($fu['User']['active'] == "1") {

//                         $key = Security::hash(CakeText::uuid(), 'sha512', true);

//                         $hash = sha1($fu['User']['username'] . rand(0, 100));

//                         $url = Router::url(array('controller' => 'Users', 'action' => 'reset'), true) . '/' . $key . '#' . $hash;

//                         $ms = "<p>Click the Link below to reset your password.</p><br /> " . $url;

//                         $fu['User']['tokenhash'] = $key;

//                         $this->User->id = $fu['User']['id'];

//                         if ($this->User->saveField('tokenhash', $fu['User']['tokenhash'])) {

//                             $l = new CakeEmail('smtp');

//                             $l->emailFormat('html')->template('default', 'default')->subject('Reset Your Password')

//                                     ->to($fu['User']['username'])->send($ms);

//                             $this->set('smtp_errors', "none");

//                             $this->Session->setFlash(__('Check Your Email To Reset your password', true));

//                             $this->redirect(array('controller' => 'Products', 'action' => 'index'));

//                         } else {

//                             $this->Session->setFlash("Error Generating Reset link");

//                         }

//                     } else {

//                         $this->Session->setFlash('This Account is not Active yet.Check Your mail to activate it');

//                     }

//                 } else {

//                     $this->Session->setFlash('Username does Not Exist');

//                 }

//             }

//         }

//     }

	public function reset($token = null) {

		configure::write('debug', 2);

		$this->User->recursive = -1;

		//print_r($_POST);

		if (!empty($token)) {

			$u = $this->User->findBytokenhash($token);

			if ($u) {

				@$this->User->id = $u['User']['id'];

				//print_r($this->User->id);//die();

				if ($this->request->is('post')) {

					//print_r($this->request->data);

					if (!empty($this->data)) {

						@$this->request->data['User']['password'] = $this->request->data['User']['pass'];

						if ($this->data['User']['password'] != $this->data['User']['password_confirm']) {

							$this->Session->setFlash("Both the passwords are not matching...");

							return;

						}

						$this->User->data = $this->data;

						//print_r($this->User->data);//die();

						$this->User->data['User']['email'] = $u['User']['email'];

						//print_r($this->User->data['User']['email']);//die();

						$new_hash = sha1($u['User']['email'] . rand(0, 100)); //created token

						$this->User->data['User']['tokenhash'] = $new_hash;

						$this->User->data['User']['username'] = $u['User']['username'];

						if ($this->User->validates(array('fieldList' => array('password', 'password_confirm')))) {

							//echo "hhhhhhhhhhhhhhhhhhhhhhhhhhhh";

							if ($this->User->saveField("password", $this->data['User']['password'])) {

								//echo "ddddddddddd";

								echo "<script>alert('Password Has been Updated')

						   </script>";

								echo "<script>window.location.assign('http://rajdeep.crystalbiltech.com/dhdeals2')

						   </script>";

								$this->Session->setFlash('Password Has been Updated');

								$this->redirect(array('controller' => 'Users', 'action' => 'login'));

							}

						} else {

							$this->set('errors', $this->User->invalidFields());

						}

					}

				}

			} else {

				$this->Session->setFlash('Token Corrupted, Please Retry.the reset link

                        <a style="cursor: pointer; color: rgb(0, 102, 0); text-decoration: none;

                        background: url("http://files.adbrite.com/mb/images/green-double-underline-006600.gif")

                        repeat-x scroll center bottom transparent; margin-bottom: -2px; padding-bottom: 2px;"

                        name="AdBriteInlineAd_work" id="AdBriteInlineAd_work" target="_top">work</a> only for once.');

			}

		} else {

			$this->Session->setFlash('Pls try again...');

			$this->redirect(array('controller' => 'pages', 'action' => 'login'));

		}

	}

////////////////////forgot password by rahul////////////////////////////////////////

	public function resetpwd($token = null) {

		configure::write('debug', 2);

		$this->User->recursive = -1;

		//print_r($_POST);

		if (!empty($token)) {

			$u = $this->User->findBytokenhash($token);

			if ($u) {

				@$this->User->id = $u['User']['id'];

				//print_r($this->User->id);//die();

				if ($this->request->is('post')) {

					//print_r($this->request->data);

					if (!empty($this->data)) {

						@$this->request->data['User']['password'] = $this->request->data['User']['pass'];

						if ($this->data['User']['password'] != $this->data['User']['password_confirm']) {

							$this->Session->setFlash("Both the passwords are not matching...");

							return;

						}

						$this->User->data = $this->data;

						//print_r($this->User->data);//die();

						$this->User->data['User']['email'] = $u['User']['email'];

						//print_r($this->User->data['User']['email']);//die();

						$new_hash = sha1($u['User']['email'] . rand(0, 100)); //created token

						$this->User->data['User']['tokenhash'] = $new_hash;

						$this->User->data['User']['username'] = $u['User']['username'];

						if ($this->User->validates(array('fieldList' => array('password', 'password_confirm')))) {

							//echo "hhhhhhhhhhhhhhhhhhhhhhhhhhhh";

							if ($this->User->saveField("password", $this->data['User']['password'])) {

								//echo "ddddddddddd";

								echo "<script>alert('Password Has been Updated')

						   </script>";

								echo "<script>window.location.assign('http://rajdeep.crystalbiltech.com/dhdeals2')

						   </script>";

								$this->Session->setFlash('Password Has been Updated');

								$this->redirect(array('controller' => 'Users', 'action' => 'login'));

							}

						} else {

							$this->set('errors', $this->User->invalidFields());

						}

					}

				}

			} else {

				$this->Session->setFlash('Token Corrupted, Please Retry.the reset link

                        <a style="cursor: pointer; color: rgb(0, 102, 0); text-decoration: none;

                        background: url("http://files.adbrite.com/mb/images/green-double-underline-006600.gif")

                        repeat-x scroll center bottom transparent; margin-bottom: -2px; padding-bottom: 2px;"

                        name="AdBriteInlineAd_work" id="AdBriteInlineAd_work" target="_top">work</a> only for once.');

			}

		} else {

			$this->Session->setFlash('Pls try again...');

			$this->redirect(array('controller' => 'pages', 'action' => 'login'));

		}

	}

	////////////////////////////////////////////////

	public function admin_edit($id = null) {

		Configure::write("debug", 0);

		$this->User->id = $id;

		if (!$this->User->exists()) {

			throw new NotFoundException('Invalid user');

		}

		// get saved page permissions

		$this->loadModel('Userpermission');

		$AuthPermission = $this->Userpermission->find('first', array('conditions' => array('Userpermission.user_id' => $id)));

		if ($AuthPermission) {

			$authorized_pages = unserialize($AuthPermission['Userpermission']['view_pages']);

			$this->set('authorized_pages', $authorized_pages);

		}

		if ($this->request->is('post') || $this->request->is('put')) {

			$view_pages = serialize($this->request->data['Userpermission']['view_pages']);

			$dataprm = array('user_id' => $id, 'view_pages' => $view_pages);

			if ($this->User->save($this->request->data)) {

				$cnt = $this->Userpermission->find('count', array('conditions' => array('Userpermission.user_id' => $id)));

				if ($cnt < 1) {

					$this->Userpermission->save($dataprm);

				} else {

					$this->Userpermission->updateAll(

						array('view_pages' => "'$view_pages'"), array('user_id' => $id)

					);

				}

				$this->Session->setFlash('The user has been saved');

				return $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash('The user could not be saved. Please, try again.');

			}

		} else {

			$this->request->data = $this->User->read(null, $id);

		}

	}

	public function edit($id = null) {

		// echo 'edit function';

		$id = $this->Auth->user('id');

		$this->User->id = $this->Auth->user('id');

		if (!$this->User->exists($id)) {

			return $this->redirect(array('action' => 'myaccount'));

		}

		if ($this->request->is('post') || $this->request->is('put')) {

			$email = $this->Auth->user('email');

			$username = $this->Auth->user('username');

			$this->request->data['User']['image'] = $this->request->data['User']['image'];

			$image = $this->request->data['User']['image'];

			if (($email == $this->request->data['User']['email']) && ($username == $this->request->data['User']['username'])) {

				$uploadpath = WWW_ROOT . 'profile_pic/';

				if ($this->User->save($this->request->data)) {

					$this->Session->setFlash(__('Your profile has been updated.'));

					return $this->redirect(array('action' => 'myaccount'));

				} else {

					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));

				}

			} else if ($this->User->hasAny(array('User.email' => $this->request->data['User']['email']))) {

				$this->Session->setFlash(__('Email already exist!'));

				return $this->redirect(array('action' => 'edit'));

			} else if ($this->User->hasAny(array('User.username' => $this->request->data['User']['username']))) {

				$this->Session->setFlash(__('Username already exist!'));

				return $this->redirect(array('action' => 'edit'));

			} else {

				if ($this->User->save($this->request->data)) {

					$this->Session->setFlash(__('Your profile has been updated.'));

					return $this->redirect(array('action' => 'myaccount'));

				} else {

					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));

				}

			}

		} else {

			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));

			$data = $this->request->data = $this->User->find('first', $options);

			$this->set('data', $data);

		}

	}

////////////////////////////////////////////////////////////

	public function admin_password($id = null) {

		$this->User->id = $id;

		if (!$this->User->exists()) {

			throw new NotFoundException('Invalid user');

		}

		if ($this->request->is('post') || $this->request->is('put')) {

			if ($this->User->save($this->request->data)) {

				$this->Session->setFlash('The user has been saved');

				$this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash('The user could not be saved. Please, try again.');

			}

		} else {

			$this->request->data = $this->User->read(null, $id);

		}

	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {

		if (!$this->request->is('post')) {

			throw new MethodNotAllowedException();

		}

		$this->User->id = $id;

		if (!$this->User->exists()) {

			throw new NotFoundException('Invalid user');
			$this->Session->setFlash('This user does not exists!! .');

		}

		if ($this->User->delete()) {

			$this->Session->setFlash('User is successfully deleted from the records!!');
			return $this->redirect(array('action' => 'index'));

		}

		$this->Session->setFlash('User is  not deleted please try again later!!!');

		return $this->redirect(array('action' => 'index'));

	}

////////////////////////////////////////////////////////////

	public function api_loginwork() {

		$postdata = file_get_contents("php://input");

		$redata = json_decode($postdata);

		ob_start();

		print_r($redata);

		$c = ob_get_clean();

		$fc = fopen('files' . DS . 'detail.txt', 'w');

		fwrite($fc, $c);

		fclose($fc);

		$this->layout = "ajax";

		$this->loadModel('User');

		$username = $redata->user->username;

		$password = $redata->user->password;

		$this->request->data['User']['username'] = $username;

		//$this->request->data['email'];

		$this->request->data['password'] = $password;

		if ($redata) {

			$check = $this->User->find('first', array('conditions' => array(

				"User.username" => $this->request->data['User']['username'],

			), 'fields' => array('username'), 'recursive' => '-1'));

			$this->request->data['User']['username'] = $check['User']['username'];

			$this->request->data['User']['password'] = $password;

			if (!$this->Auth->login()) {

				$response['isSucess'] = '1';

				$response['msg'] = 'User is not valid';

			} else {

				$user = $this->User->find('first', array('conditions' => array('id' => $this->Auth->user('id'))));

				$response['status'] = true;

				$response['msg'] = 'You have successfully logged in';

				$response['id'] = $user['User']['id'];

				$response['name'] = $user['User']['name'];

				$response['name'] = $user;

			}

		}

		echo json_encode($response);

		exit;

	}

	public function api_login() {

		Configure::write('debug', 0);
			ob_start();

		print_r($_POST);

		$c = ob_get_clean();

		$fc = fopen('files' . DS . 'detail.txt', 'w');

		fwrite($fc, $c);

		fclose($fc);
	//	exit;
		

		$this->layout = 'ajax';

		$this->request->data['User']['username'] = $this->request->data['email'];

		$pass = $this->request->data['password'];

		if ($this->request->is('post')) {
		    

			$check = $this->User->find('first', array('conditions' => array(

				"User.username" => $this->request->data['User']['username'],

			), 'fields' => array('username'), 'recursive' => '-1'));

			$this->request->data['User']['username'] = $check['User']['username'];

			$this->request->data['User']['password'] = $pass;

			if (!$this->Auth->login()) {

				$response['status'] = false;

				$response['msg'] = 'User is not valid';

			} else {

				$user = $this->User->find('first', array('conditions' => array('id' => $this->Auth->user('id'))));

				$response['status'] = true;

				$response['msg'] = 'You have successfully logged in';

				$response['id'] = $user['User']['id'];

				$response['reservationname'] = $user['User']['reservationname'];

				$response['username'] = $user['User']['username'];

				$response['email'] = $user['User']['email'];

				$response['code'] = $user['User']['code'];

				$response['roomnumber'] = $user['User']['roomnumber'];

				$response['role'] = $user['User']['role'];

				$response['chat_status'] = $user['User']['chat_status'];

			}

		}
//return $response;
	echo json_encode($response);

		exit;

	}
	
	
	public function api_ruballogins() {

		Configure::write("debug", 0);

	   	$this->request->data['User']['email'] = $this->request->data['email'];
		$pass = $this->request->data['password'];
	  
	    if ($this->request->is('post')) {           

	        $this->request->data['User']['password'] = $pass; 

	        $password = AuthComponent::password($pass);                
	      
	        $user = $this->User->find('first', array('conditions' => array('User.password' => $password, 'User.username' =>  $this->request->data['User']['email'])));

	        if($user){

	            $response['msg'] = 'User Successfully Login';
	            $response['userid'] =$user['User']['id'];
			
				$response['id'] = $user['User']['id'];

				$response['reservationname'] = $user['User']['reservationname'];

				$response['username'] = $user['User']['username'];

				$response['email'] = $user['User']['email'];

				$response['code'] = $user['User']['code'];

				$response['roomnumber'] = $user['User']['roomnumber'];

				$response['role'] = $user['User']['role'];

				$response['chat_status'] = $user['User']['chat_status'];

	            $response['status'] = true;

	        } else {

	           	$response['status'] = false;

				$response['msg'] = 'User is not valid';

	        }


	    } else {


		$response['status'] = false;
		$response['msg'] = 'User is not valid';

	    }



	    echo json_encode($response);



	    exit;

	}

	public function api_logins() {

		Configure::write("debug", 0);
	    //print_r($this->request->data);
	    $this->request->data['User']['email'] = $this->request->data['email'];
	    
	    $pass = $this->request->data['password'];

	    if ($this->request->is('post')) {           
	    	// echo "<pre>";
	    	// print_r($_POST);
	    	// die();
	        $this->request->data['User']['password'] = $pass; 
	        $password = AuthComponent::password($pass);                
	       
	        $check = $this->User->find('first', array('conditions' => array('User.password' => $password,'User.email' =>  $this->request->data['User']['email'])));

	        if($check){  
	             $response['msg'] = 'User Successfully Login';
	            $response['userid'] =$check['User']['id'];
			
				$response['id'] = $check['User']['id'];

				$response['reservationname'] = $check['User']['reservationname'];

				$response['username'] = $check['User']['username'];

				$response['email'] = $check['User']['email'];

				$response['code'] = $check['User']['code'];

				$response['roomnumber'] = $check['User']['roomnumber'];

				$response['role'] = $check['User']['role'];

				$response['chat_status'] = $check['User']['chat_status'];
				$response['password'] = $this->request->data['password'];
				$response['email'] = $this->request->data['email'];

	            $response['status'] = true;
	        } else {

	          $response['status'] = false;

				$response['msg'] = 'User is not valid';
				$response['password'] = $this->request->data['password'];
				$response['email'] = $this->request->data['email'];

	        }
	    } else {

	        $response['msg'] = 'Sorry Something Went Wrong!';
	        $response['status'] = false; 
	    }
	    echo json_encode($response);
	    exit;
	}


	public function api_registration() {

		Configure::write('debug', 0);

		$this->layout = 'ajax';

		ob_start();

		$this->request->data['User']['reservationname'] = $this->request->data['reservationname'];

		$this->request->data['User']['code'] = $this->request->data['code'];

		$this->request->data['User']['roomnumber'] = $this->request->data['roomnumber'];

		$this->request->data['User']['email'] = $this->request->data['email'];

		$this->request->data['User']['username'] = $this->request->data['username'];

		$this->request->data['User']['password'] = $this->request->data['password'];

		$this->request->data['User']['role'] = 'customer';

		if ($this->request->is('post')) {

			if ($this->User->hasAny(array('User.email' => $this->request->data['User']['email']))) {

				$response['msg'] = 'Email_id already exist';
				$response['email'] = $this->request->data['User']['email'];

			} else {

				$this->User->create();

				$savedata = $this->User->save($this->request->data);

				if ($savedata) {

					$user = $this->User->find('first', array('conditions' => array('id' => $this->User->getLastInsertID())));

					$response['id'] = $user['User']['id'];

					$response['reservationname'] = $user['User']['reservationname'];

					$response['username'] = $user['User']['username'];

					$response['email'] = $user['User']['email'];

					$response['code'] = $user['User']['code'];

					$response['roomnumber'] = $user['User']['roomnumber'];

					$response['role'] = $user['User']['role'];

					$response['chat_status'] = $user['User']['chat_status'];

					$response['status'] = true;

					$response['msg'] = 'Registration has been successful';

				}

			}

		} else {

			$response['msg'] = 'Sorry please try again';

		}

		echo json_encode($response);

		exit;

	}

	/*-------Email Verifcation-----------*/

	public function api_verifyEmail() {

		if ($this->request->is('post')) {

			$exist = $this->User->find("first", array('conditions' => array(

				"AND" => array(

					'User.email' => $this->request->data['email'],

					'User.verification_code' => $this->request->data['verification_code'],

					'User.active' => 0,

				),

			)));

			if ($exist) {

				//            print_r($this->request->data); exit;

				$updated = $this->User->updateAll(array('User.active' => 1, 'User.verification_code' => NULL),

					array('User.email' => $this->request->data['email'], 'User.verification_code' => $this->request->data['verification_code'], 'User.active' => 0)

				);

				if ($updated) {

					$user = $this->User->find('first', array('conditions' => array('User.email' => $this->request->data['email'])));

					$response['isSuccess'] = true;

					$response['msg'] = "Verified Successfully";

					$response['data'] = $user;

				} else {

					$response['isSuccess'] = false;

					$response['msg'] = "Please verify account with valid verification code. Unable to verify";

				}

			} else {

				$response['isSuccess'] = false;

				$response['msg'] = "Please verify account with valid verification code.";

			}

		} else {

			$response['isSuccess'] = false;

			$response['msg'] = "Only Post Method is allowed";

		}

		echo json_encode($response);

		exit;

	}

	public function api_chekdata() {

		configure::write('debug', 0);

		$this->layout = 'ajax';

		ob_start();

		var_dump($this->request->data);

		$c = ob_get_clean();

		$fc = fopen('files' . DS . 'detail.txt', 'w');

		fwrite($fc, $c);

		fclose($fc);

		exit;

	}

	public function api_logout() {

		configure::write('debug', 0);

		$this->layout = 'ajax';

		if ($this->request->is('post')) {

			$this->User->id = $this->request->data['User']['id'];

			$this->Auth->logout();

			$response['isSucess'] = 'true';

			$response['msg'] = "Logout Successfully";

		}

		$this->set('response', $response);

		$this->render('ajax');

	}

	public function api_editprofile() {

		configure::write('debug', 0);

		$postdata = file_get_contents("php://input");

		$redata = json_decode($postdata);

		ob_start();

		print_r($redata);

		$c = ob_get_clean();

		$fc = fopen('files' . DS . 'detail.txt', 'w');

		fwrite($fc, $c);

		fclose($fc);

		$this->User->recursive = 2;

		$this->layout = "ajax";

		if (!empty($redata)) {

			$id = $redata->user->id;

			$name = $redata->user->name;

			$phone = $redata->user->phone;

			$data = $this->User->updateAll(array('User.phone' => "'$phone'", 'User.name' => "'$name'"), array('User.id' => $id));

			if ($data) {

				$response['data'] = $redata;

				$response['error'] = 0;

			}

		}

		echo json_encode($response);

		exit;

	}

	public function api_user() {

		configure::write('debug', 0);

		$postdata = file_get_contents("php://input");

		$redata = json_decode($postdata);

		ob_start();

		print_r($redata);

		$c = ob_get_clean();

		$fc = fopen('files' . DS . 'detail.txt', 'w');

		fwrite($fc, $c);

		fclose($fc);

		$this->User->recursive = 2;

		$this->layout = "ajax";

		if (!empty($redata)) {

			$id = $redata->user->id;

			$data = $this->User->find('all', array('conditions' => array('User.id' => $id)));

			if ($data[0]['User']['image']) {

				$data[0]['User']['image'] = FULL_BASE_URL . $this->webroot . "files/profile_pic/" . $data[0]['User']['image'];

			} else {

				$data[0]['User']['image'] = FULL_BASE_URL . $this->webroot . "files/profile_pic/noimagefound.jpg";

			}

			if ($data) {

				$response['msg'] = 'Success';

				$response['data'] = $data;

			} else {

				$response['isSucess'] = 'false';

				$response['msg'] = 'Sorry There are no data';

			}

		}

		echo json_encode($response);

		exit;

	}

	public function api_alluser() {

		$this->layout = 'ajax';

		$resp = $this->User->find('all', array('conditions' => array(

			"User.status" => 1,

		), 'recursive' => '-1'));

		if ($resp) {

			$response['isSucess'] = 'true';

			$response['msg'] = 'Success';

			$response['data'] = $resp;

		} else {

			$response['isSucess'] = 'false';

			$response['msg'] = 'Sorry there are no data';

		}

		$this->set('response', $response);

		$this->render('ajax');

	}

	public function api_changepasswordwork() {

		Configure::write('debug', 0);

		$this->layout = "ajax";

		$postdata = file_get_contents("php://input");

		$redata = json_decode($postdata);

		$oldpassword = $redata->User->old_password;

		$newpassword = $redata->User->new_password;

		$username = $redata->User->username;

		$this->layout = "ajax";

		if ($this->request->is('post')) {

			$password = AuthComponent::password($oldpassword);

			$pass = $this->User->find('first', array('conditions' => array('AND' => array('User.password' => $password, 'User.username' => $username))));

			if ($pass) {

				$this->User->data['User']['password'] = $newpassword;

				$this->User->id = $pass['User']['id'];

				if ($this->User->exists()) {

					$pass['User']['password'] = $newpassword;

					if ($this->User->save()) {

						$this->User->id = $pass['User']['id'];

						$this->Auth->logout();

						$response['isSucess'] = 'true';

						$response['msg'] = "your password has been updated";

					}

				}

			} else {

				$response['isSucess'] = 'false';

				$response['msg'] = "Your old password did not match";

			}

		}

		echo json_encode($response);

		exit;

	}

	public function changepassword() {

		if ($this->request->is('post')) {

			$password = AuthComponent::password($this->data['User']['old_password']);

			$em = $this->Auth->user('username');

			$pass = $this->User->find('first', array('conditions' => array('AND' => array('User.password' => $password, 'User.username' => $em))));

			if ($pass) {

				if ($this->data['User']['new_password'] != $this->data['User']['cpassword']) {

					$this->Session->setFlash(__("New password and Confirm password field do not match"));

				} else {

					$this->User->data['User']['password'] = $this->data['User']['new_password'];

					$this->User->id = $pass['User']['id'];

					if ($this->User->exists()) {

						$pass['User']['password'] = $this->data['User']['new_password'];

						if ($this->User->save()) {

							echo "<script>alert('Your password has been updated')</script>";

							echo "<script>window.location.assign('http://rajdeep.crystalbiltech.com/dhdeals2/')</script>";

							//$this->Session->setFlash(__("Password Updated"));

							//$this->redirect(array('controller' => 'Products', 'action' => 'index'));

						}

					}

				}

			} else {

				$this->Session->setFlash(__("Your old password did not match."));

			}

		}

	}

	// public function api_resetpwd($token = null) {

	//     //echo $token;die("ddd");

	//    configure::write('debug', 0);

	//     $this->User->recursive = -1;

	//     if (!empty($token)) {

	//         $u = $this->User->findBytokenhash($token);

	//         //print_r($u);exit;

	//         if ($u) {

	//             $this->User->id = $u['User']['id'];

	//             if (!empty($this->data)) {

	//                $this->request->data['User']['password']=$this->request->data['User']['password1'];

	//                 if ($this->request->data['User']['password'] != $this->request->data['User']['password_confirm']) {

	//                     $this->Session->setFlash("Both the passwords are not matching...");

	//                     return;

	//                 }

	//                 $this->User->data = $this->data;

	//                 $this->User->data['User']['email'] = $u['User']['email'];

	//                  $this->User->data['User']['username'] = $u['User']['email'];

	//                 $new_hash = sha1($u['User']['email'] . rand(0, 100)); //created token

	//                 $this->User->data['User']['tokenhash'] = $new_hash;

	//                 if ($this->User->validates(array('fieldList' => array('password', 'password_confirm')))) {

	//                     if ($this->User->save($this->User->data)) {

	//                         echo "<script>alert('Password Has been Updated')</script>";

	//                         //$this->Session->setFlash('Password Has been Updated');

	//                         //return;

	//                     }

	//                 } else {

	//                     $this->set('errors', $this->User->invalidFields());

	//                 }

	//             }

	//         } else {

	//             $this->Session->setFlash('Token Corrupted, Please Retry.the reset link

	//                     <a style="cursor: pointer; color: rgb(0, 102, 0); text-decoration: none;

	//                     background: url("http://files.adbrite.com/mb/images/green-double-underline-006600.gif")

	//                     repeat-x scroll center bottom transparent; margin-bottom: -2px; padding-bottom: 2px;"

	//                     name="AdBriteInlineAd_work" id="AdBriteInlineAd_work" target="_top">work</a> only for once.');

	//         }

	//     } else {

	//         $this->Session->setFlash('Pls try again...');

	//         $this->redirect(array('controller' => 'pages', 'action' => 'login'));

	//     }

	// }

	public function api_changepassword() {

		configure::write('debug', 0);

		$this->layout = "ajax";

		if ($this->request->is('post')) {

			$password = AuthComponent::password($this->data['User']['old_password']);

			$em = $this->request->data['User']['email'];

			$pass = $this->User->find('first', array('conditions' => array('AND' => array('User.password' => $password, 'User.email' => $em))));

			if ($pass) {

				$this->User->data['User']['password'] = $this->data['User']['new_password'];

				$this->User->id = $pass['User']['id'];

				if ($this->User->exists()) {

					$pass['User']['password'] = $this->data['User']['new_password'];

					if ($this->User->save()) {

						$response['isSucess'] = 'false';

						$response['msg'] = "your password has been updated";

					}

				}

			} else {

				$response['isSucess'] = 'false';

				$response['msg'] = "Your old password did not match";

			}

		}

		$this->set('response', $response);

		$this->render('ajax');

	}

	public function api_forgetpwd() {
		configure::write('debug', 0);

		$username = $_POST['username'];

		$this->User->recursive = -1;

		$fu = $this->User->find('first', array('conditions' => array('User.username' => $username)));

		if ($fu['User']['email']) {

			$key = Security::hash(CakeText::uuid(), 'sha512', true);

			$hash = sha1($fu['User']['email'] . rand(0, 100));

			$url = Router::url(array('controller' => 'users', 'action' => 'api_resetpwd'), true) . '/' . $key . '#' . $hash;

			$ms = '<body><table width="500" border="0" cellpadding="10" cellspacing="0" style="margin: 0px auto; background: #f0f0f0; text-align: center"><tr style="background: #f0f0f0"><td style="text-align: center; padding-top: 20px; padding-bottom: 20px"> <img alt="img" style="height: 97px;" src="' . FULL_BASE_URL . $this->webroot . 'home/logo.png"/></td> </tr><tr><td> <h2>Welcome to The Hotel</h2> <p>Click on button to reset your password.</p> <p><a href="' . $url . '" style="background: #cb202d; padding:15px 20px; text-transform:uppercase; display:inline-block; color:#fff; border-radius: 4px; text-decoration:none; font-weight:500;" >Reset your password</a></p> <h3>Thank you</h2> </td> </tr></table> </body>';

			$fu['User']['reset_url'] = $key;

			$this->User->id = $fu['User']['id'];

			if ($this->User->saveField('reset_url', $fu['User']['reset_url'])) {

				$l = new CakeEmail('default');

				$l->emailFormat('html')->template('default', 'default')->subject('Reset Your Password')->from(array('info@rakesh.crystalbiltech.com' => 'Thehotel'))->to($fu['User']['email'])->send($ms);

				$response['isSucess'] = 'true';

				$response['msg'] = 'Check Your Email for reset your password';

			} else {

				$response['isSucess'] = 'false';

				$response['msg'] = 'Error Generating Reset link';

			}

		} else {

			$response['isSucess'] = 'false';

			$response['msg'] = 'Email ID does Not Exist';

		}

		echo json_encode($response);

		exit;

	}

	public function api_resetpwd($token = null) {

		configure::write('debug', 0);

		$this->User->recursive = -1;

		if (!empty($token)) {

			$u = $this->User->findByreset_url($token);

			if ($u) {

				$this->User->id = $u['User']['id'];

				if (!empty($this->data)) {

					$this->request->data['User']['password'] = $this->request->data['User']['password1'];

					if ($this->request->data['User']['password'] != $this->request->data['User']['password_confirm']) {

						$this->Session->setFlash("Both the passwords are not matching...");

						return;

					}

					$this->User->data = $this->data;

					$this->User->data['User']['email'] = $u['User']['email'];

					$this->User->data['User']['username'] = $u['User']['email'];

					$this->User->data['User']['reset_url'] = "ddd";

					if ($this->User->validates(array('fieldList' => array('password', 'password_confirm')))) {

						if ($this->User->save($this->User->data)) {

							$this->Session->setFlash('Password has been Updated.');

							return;

						}

					} else {

						$this->set('errors', $this->User->invalidFields());

					}

				}

			} else {

				$this->Session->setFlash('Token Corrupted, Please Retry.the reset link

                        <a style="cursor: pointer; color: rgb(0, 102, 0); text-decoration: none;

                        background: url("http://files.adbrite.com/mb/images/green-double-underline-006600.gif")

                        repeat-x scroll center bottom transparent; margin-bottom: -2px; padding-bottom: 2px;"

                        name="AdBriteInlineAd_work" id="AdBriteInlineAd_work" target="_top">work</a> only for once.');

			}

		} else {

			$this->Session->setFlash('Pls try again...');

			// $this->redirect(array('controller' => 'pages', 'action' => 'login'));

		}

	}

	public function admin_activate($id = null) {
		$this->User->id = $id;
		// echo $id;
		//die();
		if ($this->User->exists()) {
			$x = $this->User->save(array(
				'User' => array(
					'chat_status' => '1',
				),
			));
			$this->Session->setFlash(__("Chat Activated successfully."));
			$this->redirect($this->referer());
		} else {
			$this->Session->setFlash(__("Unable to activate."));
			$this->redirect($this->referer());
		}
	}

	public function admin_deactivate($id = null) {
		$this->User->id = $id;
		//exit;
		if ($this->User->exists()) {
			$x = $this->User->save(array(
				'User' => array(
					'chat_status' => '0',
				),
			));
			$this->Session->setFlash(__("Chat Deactivated successfully."));
			$this->redirect($this->referer());
		} else {
			$this->Session->setFlash(__("Unable to activate."));
			$this->redirect($this->referer());
		}
	}

	public function admin_questionnaires($id = null) {

		configure::write('debug', 0);
		$this->loadModel('Questionnaire');
		$this->loadModel('User');
		$this->loadModel('Addhotel');
		$this->loadModel('QuestionnairesAnswer');
		$this->loadModel('Rating');

		$this->User->id = $id;

		$aid = $this->Auth->user('id');

		if (!$this->User->exists()) {

			throw new NotFoundException('Invalid user');

		}

		$hotelcode = $this->User->find('all', array('conditions' => array('id' => $id)));
		$code = $hotelcode[0]['User']['code'];

		$hotcode = $this->Addhotel->find('all', array('conditions' => array('code' => $code)));
		$hotelid = $hotcode[0]['Addhotel']['id'];

		// $this->Questionnaire->recursive = 2;
		$questionnaires = $this->Questionnaire->query("SELECT * FROM `questionnaires` LEFT JOIN `questionnaires_answers` ON `questionnaires`.`id` = `questionnaires_answers`.`questionid` WHERE hotelid = $hotelid and userid = $id");
		
		$comment = $this->Rating->find('first', array('conditions' => array('Rating.userid'=>$id)));
        
		$this->set('question', $questionnaires);
		$this->set('comment', $comment);

	}
	
	public function api_usersdata(){
	    
	    configure::write('debug', 0);

		$postdata = file_get_contents("php://input");

		$redata = json_decode($postdata);

		if (!empty($redata)) {

			$id = $redata->user->id;
		
		    $data = $this->User->find('first', array('conditions' => array('User.id'=>$id)));
		    
		    $response['isSucess'] = '0';

			$response['data'] = $data;
		
		}else{
		     $response['isSucess'] = '1';

			$response['msg'] = "User doesnot exists.";
		}
		echo json_encode($response);

		exit;
	}
	
	public function api_restadmindata(){
	    
	    configure::write('debug', 0);

		$postdata = file_get_contents("php://input");

		$redata = json_decode($postdata);

		if (!empty($redata)) {

			$code = $redata->user->code;
		
		
		    $data = $this->User->find('first', array('conditions' => array('User.code'=>$code,'User.role'=>'rest_admin')));
		    
		    $response['isSucess'] = '0';

			$response['data'] = $data;
		
		}else{
		     $response['isSucess'] = '1';

			$response['msg'] = "User doesnot exists.";
		}
		echo json_encode($response);

		exit;
	}

}
