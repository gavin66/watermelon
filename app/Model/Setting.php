<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Setting
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property string $desc
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Setting whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Setting whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Setting whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Setting whereDesc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Setting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Setting extends Model {
    protected $table = 'settings';


    //

}
