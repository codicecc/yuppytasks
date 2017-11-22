<?php

namespace Fuel\Migrations;

class Create_scans
{
	public function up()
	{
		\DBUtil::create_table('scans', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'customer_id' => array('constraint' => 11, 'type' => 'int'),
			'slot_number' => array('constraint' => 11, 'type' => 'int'),
			'note' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('scans');
	}
}