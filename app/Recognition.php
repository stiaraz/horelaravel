<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recognition extends Model
{
    protected $table = 'recognition';
    protected $primaryKey ='id'; 
    public $incrementing=true;
    public $timestamps = false;
    protected $fillable =[
    	'id',
    	'tempat',
    	'waktu',
        'nama',
    	'foto',
    	'status'
    ];
}
