<?php



/**

 * Application level Controller

 *

 * This file is application-wide controller file. You can put all

 * application-wide controller-related methods here.

 *

 * PHP 5

 *

 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)

 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)

 *

 * Licensed under The MIT License

 * Redistributions of files must retain the above copyright notice.

 *

 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)

 * @link          http://cakephp.org CakePHP(tm) Project

 * @package       app.Controller

 * @since         CakePHP(tm) v 0.2.9

 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)

 */

App::uses('Controller', 'Controller');

App::uses('HttpSocket', 'Network/Http');

$HttpSocket = new HttpSocket();



/**

 * Application Controller

 *

 * Add your application-wide methods in the class below, your controllers

 * will inherit them.

 *

 * @package       app.Controller

 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller

 */

class AppController extends Controller {

	

	public $newbaseurl;



////////////////////////////////////////////////////////////

    public $components = array(

        'Session',

        'Auth',

        'RequestHandler',

        'Ctrl',

    );

    public $distance = 100;

    public $helpers = array('Html');



////////////////////////////////////////////////////////////


    public function beforeFilter() {            

		$this->newbaseurl = $this->baseurl();

        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => true);

        $this->Auth->authorize = array('Controller');

        $this->Auth->authenticate = array(

            'Form' => array(

                'userModel' => 'User',

                'fields' => array(

                    'username' => 'username',

                    'password' => 'password'

                )

            )

        );

        if (isset($this->request->params['admin']) && ($this->request->params['prefix'] == 'admin')) {



            if ($this->Session->check('Auth.User')) {

                $this->set('authUser', $this->Auth->user());

                $loggedin = $this->Session->read('Auth.User');

                $this->set(compact('loggedin'));

                $this->layout = 'adminLte';

            }

        } elseif (isset($this->request->params['customer']) && ($this->request->params['prefix'] == 'customer')) {

            if ($this->Session->check('Auth.User')) {

                $this->set('authUser', $this->Auth->user());

                $loggedin = $this->Session->read('Auth.User');

                $this->set(compact('loggedin'));

                $this->layout = 'customer';

            }

        } else {

            $this->Auth->allow();

        }

		$this->loadModel('Social');

		$social = $this->Social->find('all');

		$this->set('social',$social);

                

        $user_id = $this->Auth->user('id');

        $this->set("loggeduser", $user_id);

        $this->set("loggedusername", $this->Auth->user('reservationname'));

        $user_role = $this->Auth->user('role');

        $this->set("loggeduserrole", $this->Auth->user('role'));

        

        $this->set("loggeduserlogo", $this->Auth->user('image'));

        $cr = $this->Ctrl->getList();

        $this->set('controllerLists', $cr);

        $this->set('base_url',Router::fullbaseUrl().'/dhdeals2');

		

	$this->searchCat();	

        

    }

     public function baseurl(){

        return Router::fullbaseUrl().'/dhdeals2';

    }

////////////////////////////////////////////////////////////

    public function isAuthorized($user) {

        if (($this->params['prefix'] === 'admin') && ($user['role'] != 'admin') && ($user['role'] != 'rest_admin')) {

            echo '<a href="' . $this->webroot . '/users/logout">Logout</a><br />';

            die('Invalid request for ' . $user['role'] . ' user.');

        }

        if (($this->params['prefix'] === 'customer') && ($user['role'] != 'customer')) {

            echo '<a href="' . $this->webroot . '/users/logout">Logout</a><br />';

            die('Invalid request for ' . $user['role'] . ' user.');

        }



        if ($this->Auth->user('role') == 'rest_admin') {

            $authorized_pages = $this->Ctrl->getList();


            $resadmin_access_controller = array('users','hotels');


            if (in_array($this->params['controller'], $contrl_a)) {

                $unAuthorized = "Unauthorized Access";

                $this->set(compact('unAuthorized'));

                $this->set("authorized_pages", $authorized_pages);

                $this->render('/Pages/unauthorized');

            }

        }



        if ($this->Auth->user('role') == 'admin') {

            $this->loadModel('Userpermission');

            $AuthPermission = $this->Userpermission->find('first', array('conditions' => array('Userpermission.user_id' => $this->Auth->user('id'))));

            //print_r($AuthPermission);

            if ($AuthPermission) {

                $authorized_pages = unserialize($AuthPermission['Userpermission']['view_pages']);

            }

        }



        return true;

    }



////////////////////////////////////////////////////////////

    public function admin_switch($field = null, $id = null) {

        $this->autoRender = false;

        $model = $this->modelClass;

        if ($this->$model && $field && $id) {

            $field = $this->$model->escapeField($field);

            return $this->$model->updateAll(array($field => '1 -' . $field), array($this->$model->escapeField() => $id));

        }

        if (!$this->RequestHandler->isAjax()) {

            return $this->redirect($this->referer());

        }

    }


////////////////////////////////////////////////////////////

    public function admin_editable() {

        $model = $this->modelClass;

        $id = trim($this->request->data['pk']);

        $field = trim($this->request->data['name']);

        $value = trim($this->request->data['value']);

        $data[$model]['id'] = $id;

        $data[$model][$field] = $value;

        $this->$model->save($data, false);

        $this->autoRender = false;

    }



///////////////////////////////////////////////////////////

    public function admin_tagschanger() {

        $value = '';

        asort($this->request->data['value']);

        foreach ($this->request->data['value'] as $k => $v) {

            $value .= $v . ', ';

        }

        $value = trim($value);

        $value = rtrim($value, ',');

        $this->Product->id = $this->request->data['pk'];

        $s = $this->Product->saveField('tags', $value, false);

        $this->autoRender = false;

    }



    

   public function userdata(){

       

       $this->loadModel('User');

       //$user_id = $this->Auth->user('id');

       $data = $this->User->find('all');

       $this->set('userdata1',$data);

       

   }

   

   

   public function searchCat(){

       //$cates = $this->params['url']['categories']; 

          //$catedis = $this->params['url']['distance'];

          // $lat = $this->params['url']['lat'];

          // $long = $this->params['url']['long'];

          // $cats = $this->params['url']['cats'];

       // $catsAll = $this->params['url']['catsAll'];

        $this->loadModel('Restaurant');

          $this->loadModel('Favrest');

      $this->loadModel('Cat');

        $res_type = $this->Cat->find('all');

       // print_r($res_type);exit;

        $this->set('res_types',$res_type);

         $favs = $this->Restaurant->find('all');

        foreach($favs as $fav){

            $resIDS[] = $fav['Restaurant']['id']; 

            $hits[] = $fav['Restaurant']['hits'];

        } 

        if(isset($cates) && isset($catedis)){

        if($cates!='all' && $catedis!='all'){

            $this->Restaurant->recursive=1;

            $map = $this->Restaurant->find('all', array(

                "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,Cat.*"),

                'conditions' => array('AND' => array('Restaurant.id' => $resIDS, 'Restaurant.catid' => $cates)))); 

          $cnt = count($map);

                for($i = 0; $i < $cnt; $i++){                  

                  if($map[$i][0]['distance'] < $catedis){            

                } else {

                    unset($map[$i]); 

                }

               }

        }elseif($cates == 'all' && $catedis != 'all'){  

        $this->Restaurant->recursive=1;

            $map = $this->Restaurant->find('all', array(

                "fields" => array("get_distance_in_miles_between_geo_locations($lat,$long,Restaurant.latitude,Restaurant.longitude) as distance", "Restaurant.*,Cat.*")

                )); 

             $cnt = count($map);

                for($i = 0; $i < $cnt; $i++){

                  if($map[$i][0]['distance'] < $catedis){

                } else {

                    unset($map[$i]); 

                }

               } 

        }

        elseif($cates != 'all' && $catedis == 'all'){ 

            $this->Restaurant->recursive=1;

        $map = $this->Restaurant->find('all', array('conditions' => array('AND' => array('Restaurant.id' => $resIDS, 'Restaurant.catid' => $cates))));  

        }else{

            $this->Restaurant->recursive=1;

             $map = $this->Restaurant->find('all');

        }

    }elseif(isset($cats)){

            if($cats != ''){

                $this->Restaurant->recursive=1;

             $map = $this->Restaurant->find('all', array('conditions' => array('AND' => array('Restaurant.id' => $resIDS,'Restaurant.catid' => $cats))));    

            }

    }elseif( isset($catsAll)){

            if($catsAll!=''){

                $this->Restaurant->recursive=1;

                $map = $this->Restaurant->find('all');

            }

    }else{

        

    $this->Restaurant->recursive = 1;

        $map = $this->Restaurant->find('all');

    }

    $this->set('maps',$map);

   }

}