<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model {
    use SoftDeletes;

    protected $table = 'files';

    protected $guarded = [ 'id' ];

    protected $dateFormat = 'Y-m-d H:i:s';

}
