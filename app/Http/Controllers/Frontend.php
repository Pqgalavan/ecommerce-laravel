<?php

namespace App\Http\Controllers;

use App\Models\catogeries;
use App\Models\productmodel;

// use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request ;
use Illuminate\Routing\Controller as BaseController;
// use Illuminate\Support\Facades\Request as FacadesRequest;

class Frontend extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


public function getitem(){
    $product = productmodel::all();
    return view('user.index',compact('product'));

}

public function get_cat(){
    $cat = catogeries::all();
    return view('user.cat',compact('cat'));
}
public function getcatproduct($id){


    $cat = productmodel::where('cate_id', $id)->get();
    return view('user.allcat',compact('cat'));

}
public function getproductdetail($id){

    $product = productmodel::where('id',$id)->get();

    return view('user.productdetail',compact('product') );
}



}
