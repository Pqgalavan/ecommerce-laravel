<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
  protected  $table ='orders';

  protected $fillable = [
    'product_id',

    'qty',
    'amount',
    'total_amount',
    'order_id',
  ];

  public function get_product(){

    return $this->belongsTo(productmodel::class,'product_id','id');
}


}
