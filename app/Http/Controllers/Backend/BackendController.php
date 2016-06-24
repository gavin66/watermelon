<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\User;
use Illuminate\Http\Request;

class BackendController extends Controller {

    protected $user;

	public function __construct(){
        $this->user = \Request::user();
    }

    public function index(Request $request){

        return view('backend.index',['user'=>$this->user]);
    }




}
