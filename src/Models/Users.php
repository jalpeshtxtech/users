<?php

namespace Jalpeshtxtech\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
// use App\Traits\ColumnFillable;

class Users extends Model
{
    use Notifiable;
    // use ColumnFillable;

    protected $fillable = [
        'category_name',
        'description'
    ];

    protected $guarded = [];
    protected $table = 'users';
}
