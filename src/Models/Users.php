<?php

namespace Jalpeshtxtech\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
// use App\Traits\ColumnFillable;

class Users extends Model
{
    use Notifiable;
    
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'alt_email',
        'phone',
        'status',
        'profile_image' 
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt password when it is updated.
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
