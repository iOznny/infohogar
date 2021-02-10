<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users_Properties;

class Property extends Model
{
    use HasFactory;

    public function users_properties(){
        return $this->hasMany('App\Users_Properties');
    }
}
