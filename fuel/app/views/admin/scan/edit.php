<h2>Editing Scan</h2>
<br>

<?php echo render('admin/scan/_form'); ?>
<p>
	<?php echo Html::anchor('admin/scan/view/'.$scan->id, 'View'); ?> |
	<?php echo Html::anchor('admin/scan', 'Back'); ?></p>
