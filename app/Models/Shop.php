<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded  = ['id'];
    protected $appends = ['full_name'];

    public function getFullnameAttribute()
    {
        $full_name = $this->first_name .' '.$this->last_name;
        return $full_name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
