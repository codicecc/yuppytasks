<h2>Listing Scans</h2>
<br>
<?php if ($scans): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Customer</th>
			<th>Slot number</th>
			<th>Created at</th>
			<!--<th>Note</th>-->
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($scans as $item): ?>		<tr>

			<td><?php echo Model_Customer::find($item->customer_id)->name; ?></td>
			<td><?php echo $item->slot_number; ?></td>
			<td><?php echo Date::forge($item->scansCreated_at)->format("%d/%m/%Y  %H:%M"); ?></td>
			<td><?php //echo $item->note; ?></td>
			<?php
				if(!isset($archive)):
			?>
			<td>
				<?php echo Html::anchor('admin/scan/view/'.$item->scansId, 'View'); ?> |
				<?php echo Html::anchor('admin/scan/edit/'.$item->scansId, 'Edit'); ?> |
				<?php echo Html::anchor('admin/scan/delete/'.$item->scansId, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
			<?php
				endif;
			?>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Scans.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/scan/create', 'Add new Scan', array('class' => 'btn btn-success')); ?>

</p>
