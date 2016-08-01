<?php namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * App\Model\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable {
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'email', 'password' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'password', 'remember_token' ];

}
