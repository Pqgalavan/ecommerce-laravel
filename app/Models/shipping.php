<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    use HasFactory;
    protected $table = 'shipping';

    protected $fillable = [

        'name',
        'address',
        'city',
        'state',
        'zip_code',
        'phone_number',
        'email',
        'order_id',
        'user_id',

    ];


public function get_user(){

    return $this->belongsTo(order::class,'order_id','order_id');
}
}
