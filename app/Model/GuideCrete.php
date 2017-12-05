<?php

App::uses('AppModel', 'Model');

/**

 * GuideCrete Model

 *

 * 

 */

class GuideCrete extends AppModel {
  
  public $useTable = 'guide_cretes'; 

  public $hasMany = array(
        'GuideList' => array(
            'className' => 'GuideList',
            'foreignKey' => 'guidecreteid',
            'dependent' => true,
        ),
        'GuideData' => array(
            'className' => 'GuideData',
            'foreignKey' => 'guidecreteid',
        )
    );

}

