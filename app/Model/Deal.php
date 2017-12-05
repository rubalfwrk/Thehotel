<?php
App::uses('AppModel', 'Model');
class Deal extends AppModel {
//public $displayField = 'title';
    public $belongsTo = array(
        'Restaurant' => array(
            'className' => 'Restaurant',
            'foreignKey' => 'rid',
             'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
        )
        );
}
