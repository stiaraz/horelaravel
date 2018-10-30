<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absen';
    protected $primaryKey ='no'; 

    protected $fillable =[
    	'no',
    	'id',
        'tanggal',
    ];
}
