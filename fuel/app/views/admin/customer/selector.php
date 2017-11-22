<?php
$options = array();
foreach ($customers as $customer) {
	$options[$customer->id] = $customer->name;
}
echo Form::select('customer_id', isset($scan)?$scan->customer->id:Input::get('customer_id'), $options,array("class"=>"form-control"));
