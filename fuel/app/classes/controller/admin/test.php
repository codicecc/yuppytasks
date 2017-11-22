<?php
class Controller_Admin_Test extends Controller_Rest{

    public function get_list(){
      if (Auth::check()):
        return $this->response(array(
            'foo' => Input::get('foo'),
            'baz' => array(
                1, 50, 219
            ),
            'empty' => null
        ));
      endif;
    }
}
