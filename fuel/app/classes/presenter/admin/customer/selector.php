<?php
class Presenter_Admin_Customer_Selector extends \Presenter{
	public function view(){
		$this->customers = Model_Customer::find('all',
			array('where' => array(
					array('closed',0)
			),
			'order_by' => 'name'));
	}
}
