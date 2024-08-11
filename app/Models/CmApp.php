<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmApp extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'created_at',
    ];


    //its hidden because we don't want to show it in the response
    protected $hidden = [

        'updated_at',
    ];
}
