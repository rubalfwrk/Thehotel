<?php

App::uses('AppModel', 'Model');

/**

 * GreekWord Model

 *

 * 

 */

class GreekWord extends AppModel {
  
  public $useTable = 'greek_words';

  public $hasMany = array(
        'GreekDescription' => array(
            'className' => 'GreekDescription',
            'foreignKey' => 'greekwordsid',
            'dependent' => true,
        )
    );
}

