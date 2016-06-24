<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2016/1/7
 * Time: 16:14
 */

namespace App\Services;

use App\Contracts\TestContract;
class TestService implements TestContract{
    public function callMe($controller){
        dd('Call Me From TestServiceProvider In '.$controller);
    }
}