<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table ='shops';
    protected $fillable=[
        'nombre',
        'descripcion',
        'address',
        'city',
        'lat',
        'lng',
    ];
}
