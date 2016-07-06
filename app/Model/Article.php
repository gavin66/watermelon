<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model {
	use SoftDeletes;

	protected $table = 'articles';

	protected $guarded = ['id'];

	protected $dateFormat = 'Y-m-d H:i:s';

//	protected $hidden = [];


}
