<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\user;

class Professor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'firstname',
        'lastname',
        'gender',
        'avatar',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
