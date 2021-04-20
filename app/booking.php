<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    //
    protected $table = 'bookings';
    protected $fillable = ['pesan','admin_id'];

    public function user(){
    	return $this->belongsTO(User::class);
    }
}
