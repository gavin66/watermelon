<?php

namespace App\Http\Controllers;

use App\Model\File;

use App\Http\Requests;
use RedisManager;

class APIController extends Controller {
    //
    public function thumbsUp() {
        $count = RedisManager::command('incr', [ 'watermelon_thumbs_up_count' ]);

        return [ 'count' => $count ];
    }

    public function getTags() {

        return RedisManager::command('GET', [ 'watermelon_tags' ]);

    }

    public function getCategories() {

        return RedisManager::command('GET', [ 'watermelon_categories' ]);

    }

    public function getFiles(){

        $all = File::all()->toJson();

        return $all;

    }

}
