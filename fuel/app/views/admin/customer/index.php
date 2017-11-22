<h2>Listing Customers</h2>
<br>
<?php if ($customers): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Note</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($customers as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->note; ?></td>
			<td>
				<?php echo Html::anchor('admin/customer/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/customer/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/customer/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Customers.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/customer/create', 'Add new Customer', array('class' => 'btn btn-success')); ?>

</p>
