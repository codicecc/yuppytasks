<h2>Editing Customer</h2>
<br>

<?php echo render('admin/customer/_form'); ?>
<p>
	<?php echo Html::anchor('admin/customer/view/'.$customer->id, 'View'); ?> |
	<?php echo Html::anchor('admin/customer', 'Back'); ?></p>
