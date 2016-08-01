<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Model\File
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $thumbnail_url
 * @property string $absolute_path
 * @property integer $size
 * @property string $type
 * @property string $title
 * @property string $desc
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\File whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\File whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\File whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\File whereThumbnailUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\File whereAbsolutePath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\File whereSize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\File whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\File whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\File whereDesc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\File whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\File whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\File whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class File extends Model {
    use SoftDeletes;

    protected $table = 'files';

    protected $guarded = [ 'id' ];

    protected $dateFormat = 'Y-m-d H:i:s';

}
