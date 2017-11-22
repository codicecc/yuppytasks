<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Customer', 'customer_id', array('class'=>'control-label')); ?>

			<?php
			$select_box = \Presenter::forge('admin/customer/selector');
			echo $select_box;
			?>
				<?php //echo Form::input('customer_id', Input::post('customer_id', isset($scan) ? $scan->customer_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Customer id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Slot number', 'slot_number', array('class'=>'control-label')); ?>

			<?php	$aslot_number=array();for($i=0;$i<20;$i++){array_push($aslot_number,$i);} ?>
			<?php echo Form::select('slot_number', Input::post('slot_number', isset($scan) ? $scan->slot_number : 1), $aslot_number, array('class' => 'span3 col-md-4 form-control')); ?>

				<?php //echo $scan->slot_number ;//echo Form::input('slot_number', Input::post('slot_number', isset($scan) ? $scan->slot_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Slot number')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Note', 'note', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('note', Input::post('note', isset($scan) ? $scan->note : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Note')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>
