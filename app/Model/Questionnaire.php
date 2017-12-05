<?php

App::uses('AppModel', 'Model');

/**

 * Questionnaire Model

 *

 */

class Questionnaire extends AppModel {
  
  public $useTable = 'questionnaires'; 
	public $hasMany = array(
        'QuestionnairesAnswer' => array(
            'className' => 'QuestionnairesAnswer',
            'foreignKey' => 'questionid',
            'dependent' => true,
        )
    );

}


