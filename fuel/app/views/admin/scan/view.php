<h2>Viewing #<?php echo $scan->id; ?></h2>

<p>
	<strong>Customer:</strong>
	<?php echo $scan->customer->name; ?></p>
<p>
	<strong>Slot number:</strong>
	<?php echo $scan->slot_number; ?></p>
	<p>
		<strong>Created at:</strong>
		<?php echo Date::forge($scan->created_at)->format("%d/%m/%Y  %H:%M");; ?></p>
<p>
	<strong>Note:</strong>
	<?php echo $scan->note; ?></p>

<?php echo Html::anchor('admin/scan/edit/'.$scan->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/scan', 'Back'); ?>
