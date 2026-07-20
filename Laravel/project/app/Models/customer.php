<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    //if table rule not follow then add manualy

    //public $table="users";
    //public $primarykey="cust_id";
    
    //public $timestamps=false;  not required now created_at & updated_at
    
    
    use HasFactory;
}
