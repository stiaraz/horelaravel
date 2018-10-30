<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListAnggota extends Model
{
    protected $table = 'listanggota';
    protected $primaryKey ='id'; 

    protected $fillable =[
    	'no',
    	'id',
        'nama',
    ];
}
