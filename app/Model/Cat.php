<?php
App::uses('AppModel', 'Model');
/**
 * Alergy Model
 *
 */
class Cat extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'cats';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'rest_type';
}
