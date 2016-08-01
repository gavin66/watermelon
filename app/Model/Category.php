<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Model\Category
 *
 * @property integer $id
 * @property string $name
 * @property string $desc
 * @property integer $num
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Category whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Category whereDesc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Category whereNum($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model {
    use SoftDeletes;

    protected $table = 'categories';

    protected $guarded = ['id'];


}
