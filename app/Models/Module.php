<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function type()
    {
        return $this->hasOne(PageType::class,'id','page_type');
    }
}
