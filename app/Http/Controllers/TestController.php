<?php namespace App\Http\Controllers;

use RedisGo;
class TestController extends Controller {


	public function index(){
		$v = RedisGo::get('hello');

		return $v;
	}



}
