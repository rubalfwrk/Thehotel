<?php

App::uses('AppModel', 'Model');

/**

 * UsefulNumber Model

 *

 */

class UsefulNumber extends AppModel {
  
  public $useTable = 'useful_numbers'; 

  public $hasMany = array(
        'UsefulData' => array(
            'className' => 'UsefulData',
            'foreignKey' => 'usefulnumberid',
            'dependent' => true,
        )
    );

}

