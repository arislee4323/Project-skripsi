<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
   protected $table ='admins';
    protected $fillable =['name','full_name','username','jam_buka','jam_tutup','jenis_kelamin','daftar_harga','alamat','date','email','number','user_id'];

    
public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
