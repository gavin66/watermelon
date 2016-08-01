<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Administrator
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Administrator whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Administrator whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Administrator whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Administrator wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Administrator whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Administrator whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Administrator whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Administrator whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Administrator extends Model {
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
