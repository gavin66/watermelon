<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Comment
 *
 * @property integer $id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Comment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Comment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Comment extends Model {

	//

}
