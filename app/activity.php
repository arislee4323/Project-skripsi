<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    //
    protected $table ='activities';
    protected $fillable =['name','admin_id'];
}
