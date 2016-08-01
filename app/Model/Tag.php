<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Model\Tag
 *
 * @property integer $id
 * @property string $name
 * @property string $desc
 * @property integer $num
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Tag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Tag whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Tag whereDesc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Tag whereNum($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Tag whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tag extends Model {
    use SoftDeletes;

    protected $table = 'tags';

    protected $guarded = ['id'];

}
