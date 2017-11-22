<?php
class Controller_Admin_Scan extends Controller_Admin
{

	public function action_index()
	{
		$data['scans'] = Model_Scan::find('all');
		$this->template->title = "Scans";
		$this->template->content = View::forge('admin/scan/index', $data);

	}

	public function action_view($id = null)
	{
		$data['scan'] = Model_Scan::find($id);

		$this->template->title = "Scan";
		$this->template->content = View::forge('admin/scan/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Scan::validate('create');

			if ($val->run())
			{
				$scan = Model_Scan::forge(array(
					'customer_id' => Input::post('customer_id'),
					'slot_number' => Input::post('slot_number'),
					'note' => Input::post('note'),
				));

				if ($scan and $scan->save())
				{
					Session::set_flash('success', e('Added scan #'.$scan->id.'.'));

					Response::redirect('admin/scan');
				}

				else
				{
					Session::set_flash('error', e('Could not save scan.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Scans";
		$this->template->content = View::forge('admin/scan/create');

	}

	public function action_edit($id = null)
	{
		$scan = Model_Scan::find($id);
		$val = Model_Scan::validate('edit');

		if ($val->run())
		{
			$scan->customer_id = Input::post('customer_id');
			$scan->slot_number = Input::post('slot_number');
			$scan->note = Input::post('note');

			if ($scan->save())
			{
				Session::set_flash('success', e('Updated scan #' . $id));

				Response::redirect('admin/scan');
			}

			else
			{
				Session::set_flash('error', e('Could not update scan #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$scan->customer_id = $val->validated('customer_id');
				$scan->slot_number = $val->validated('slot_number');
				$scan->note = $val->validated('note');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('scan', $scan, false);
		}

		$this->template->title = "Scans";
		$this->template->content = View::forge('admin/scan/edit');

	}

	public function action_delete($id = null)
	{
		if ($scan = Model_Scan::find($id))
		{
			$scan->delete();

			Session::set_flash('success', e('Deleted scan #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete scan #'.$id));
		}

		Response::redirect('admin/scan');

	}

}
