<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = [];

    public function items(){
        return $this->hasMany(Item::class);
    }
}
