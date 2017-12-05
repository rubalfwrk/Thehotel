<?php

App::uses('AppModel', 'Model');

/**

 * GuideData Model

 *

 * 

 */

class GuideData extends AppModel {
  
  public $useTable = 'guide_datas'; 

   	public $hasMany = array(
        'GuideBeache' => array(
            'className' => 'GuideBeache',
            'foreignKey' => 'guidedataid',
        )
    );

    public $belongsTo = array(
        'GuideCrete' => array(
            'className' => 'GuideCrete',
            'foreignKey' => 'guidecreteid',
        )
    );

}

