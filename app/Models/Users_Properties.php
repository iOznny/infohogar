<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Property;

class Users_Properties extends Model
{
    use HasFactory;

    public $table = 'users_properties';

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function properties(){
        return $this->belongsTo('App\Property');
    }
}
