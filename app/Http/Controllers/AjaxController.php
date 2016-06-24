<?php namespace
App\Http\Controllers;

use App\blog_content;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AjaxController extends Controller {

	/*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

//    use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
//    public function __construct(Guard $auth, Registrar $registrar)
//    {
//        $this->auth = $auth;
//        $this->registrar = $registrar;
//
//        $this->middleware('guest', ['except' => 'getLogout']);
//    }

	public function postSaveImage(Request $request){
		$file = $request->file('file');
		if($file->isValid()){
			$destinationPath = './upload/summernote/'.date('Y-m').'/';
			$filename = uniqid().'.'.$file->guessClientExtension();
			$file->move($destinationPath,$filename);
			echo substr($destinationPath.$filename, 1);
		}else{
			echo 'error';
		}
	}

	public function postSaveContent(Request $request){
		$blog_content = new blog_content();
		$return_data = array();

		$content = $request->input('content');

		$blog_content->content = $content;
		$blog_content->title = '标题';
		$blog_content->status = '状态';

		$is = $blog_content->save();

		if($is){
			$return_data['is_success'] = 1;
		}else{
			$return_data['is_success'] = 0;
		}

		echo json_encode($return_data);
	}

	public function  getPage(){
		return view('test');
	}

	public function postTest(){
		echo 'im gavin';
	}

}
