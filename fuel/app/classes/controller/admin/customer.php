<?php
class Controller_Admin_Customer extends Controller_Admin
{

	public function action_index(){
		$query=Model_Customer::query();
		if(Input::get()){
			foreach(Input::get() as $l => $v){
				if($l=="closed"){
					$query->where('closed',$v);
				}
			}
		}
		$data['customers']=$query->get();
		$this->template->title = "Customers";
		$this->template->content = View::forge('admin/customer/index', $data);

	}

	public function action_view($id = null)
	{
		$data['customer'] = Model_Customer::find($id);

		$this->template->title = "Customer";
		$this->template->content = View::forge('admin/customer/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Customer::validate('create');

			if ($val->run())
			{
				$customer = Model_Customer::forge(array(
					'name' => Input::post('name'),
					'note' => Input::post('note'),
					'closed' => intval(Input::post('closed')),
				));

				if ($customer and $customer->save())
				{
					Session::set_flash('success', e('Added customer #'.$customer->id.'.'));

					Response::redirect('admin/customer');
				}

				else
				{
					Session::set_flash('error', e('Could not save customer.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Customers";
		$this->template->content = View::forge('admin/customer/create');

	}

	public function action_edit($id = null)
	{
		$customer = Model_Customer::find($id);
		$val = Model_Customer::validate('edit');

		if ($val->run())
		{
			$customer->name = Input::post('name');
			$customer->note = Input::post('note');
			$customer->closed = intval(Input::post('closed'));

			if ($customer->save())
			{
				Session::set_flash('success', e('Updated customer #' . $id));

				Response::redirect('admin/customer');
			}

			else
			{
				Session::set_flash('error', e('Could not update customer #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$customer->name = $val->validated('name');
				$customer->note = $val->validated('note');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('customer', $customer, false);
		}

		$this->template->title = "Customers";
		$this->template->content = View::forge('admin/customer/edit');

	}

	public function action_delete($id = null)
	{
		if ($customer = Model_Customer::find($id))
		{
			$customer->delete();

			Session::set_flash('success', e('Deleted customer #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete customer #'.$id));
		}

		Response::redirect('admin/customer');

	}

}
