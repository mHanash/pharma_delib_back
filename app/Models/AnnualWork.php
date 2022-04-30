<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnnualWork extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        
    ];

    public function students(){
        return $this->belongsTo(Student::class);
    }
}
