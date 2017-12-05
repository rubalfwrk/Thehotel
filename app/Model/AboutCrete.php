<?php

App::uses('AppModel', 'Model');

/**

 * AboutCrete Model

 *

 * 

 */

class AboutCrete extends AppModel {
  
  public $useTable = 'about_cretes'; 

  public $hasMany = array(
        'CreteDetail' => array(
            'className' => 'CreteDetail',
            'foreignKey' => 'creteid',
            'dependent' => true,
        )
    );

}

