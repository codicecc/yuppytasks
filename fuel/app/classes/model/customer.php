<?php
class Model_Customer extends \Orm\Model{

	protected static $_has_many = array("scan");

	protected static $_properties = array(
		'id',
		'name',
		'note',
		'closed',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required');
		//$val->add_field('note', 'Note', 'required');

		return $val;
	}

}
