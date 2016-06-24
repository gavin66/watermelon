<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 16/6/22
 * Time: 14:12
 */

namespace App\Services;

use App\Contracts\TimedExecute as TimedExecuteContract;


class TimedExecute implements TimedExecuteContract {

    public function synchronizeTag() {
        // TODO: Implement synchronizeTag() method.

        return 'hello syn';
    }

    public function synchronizeCategory() {
        // TODO: Implement synchronizeCategory() method.
    }
}