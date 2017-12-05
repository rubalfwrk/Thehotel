<?php

App::uses('AppModel', 'Model');

/**

 * GuideVillage Model

 *

 * 

 */

class GuideVillage extends AppModel {
  
  public $useTable = 'guide_villages'; 

  public $belongsTo = array(
        'GuideList' => array(
            'className' => 'GuideList',
            'foreignKey' => 'guidelistid',
        )
    );

}

