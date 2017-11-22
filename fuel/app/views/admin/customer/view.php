<h2>Viewing #<?php echo $customer->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $customer->name; ?></p>
<p>
	<strong>Note:</strong>
	<?php echo $customer->note; ?></p>

<?php echo Html::anchor('admin/customer/edit/'.$customer->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/customer', 'Back'); ?>