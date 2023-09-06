<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
  protected  $table ='cart';

  protected $fillable = [
    'product_id',
    'user_id',
    'qty',
    'total_amount',
  ];

public function product_detail(){

    return $this->belongsTo(productmodel::class,'product_id','id');
}



}
