<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recognition extends Model
{
    protected $table = 'Recognition';
    protected $primaryKey ='id'; 
    public $incrementing=true;
    protected $fillable =[
    	'id',
    	'tempat',
    	'waktu',
        'nama',
    	'foto',
    	'status'
    ];
}
