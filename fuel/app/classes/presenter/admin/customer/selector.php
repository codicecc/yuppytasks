<?php
class Presenter_Admin_Customer_Selector extends \Presenter{
	public function view(){
		$this->customers = Model_Customer::find('all', array('order_by' => 'name'));
	}
}
