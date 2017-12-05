<?php

App::uses('AppModel', 'Model');

/**

 * GuideList Model

 *

 * 

 */

class GuideList extends AppModel {
  
  public $useTable = 'guide_lists'; 

  public $hasMany = array(
        'GuideVillage' => array(
            'className' => 'GuideVillage',
            'foreignKey' => 'guidelistid',
            'dependent' => true,
        ),
        'GuideSightseeing' => array(
            'className' => 'GuideSightseeing',
            'foreignKey' => 'guidelistid',
            'dependent' => true,
        )
    );

    public $belongsTo = array(
        'GuideCrete' => array(
            'className' => 'GuideCrete',
            'foreignKey' => 'guidecreteid',
        )
    );

}

