<?php

App::uses('AppModel', 'Model');

/**

 * CreteDetail Model

 *

 * 

 */

class CreteDetail extends AppModel {
  
  public $useTable = 'crete_details'; 

  public $hasMany = array(
        'Gastronomy' => array(
            'className' => 'Gastronomy',
            'foreignKey' => 'cretedetailid',
            'dependent' => true,
        )
    );

}

