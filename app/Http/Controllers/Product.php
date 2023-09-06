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

class Product extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



public function add(){
    $catogeries =  catogeries::all();
    return view('admin.product.add',compact('catogeries'));

}

public function insert(Request  $request){
    $product = new productmodel();
    if($request->hasFile('image')){
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() .'.'.$ext;
        $product->image = $filename;
        $file->move('uploads/product',$filename);
    }


    $product->cate_id = $request->input('cate');
    $product->name = $request->input('name');
    $product->slug = $request->input('slug');
   $product->small_description = $request->input('smalldescription');
   $product->description = $request->input('description');
   $product->original_price = $request->input('originalprice');
   $product->selling_price = $request->input('sellingprice');

   $product->qty = $request->input('qty');
   $product->tax = $request->input('tax');
   $product->status=  $request->input('status')==true? '1' : '0';

   $product->trending = $request->input('trending');
   $product->meta_title= $request->input('meta_title');
   $product->meta_keywords = $request->input('meta_descrip');
   $product->meta_description = $request->input('meta_keywords');

    // $product->popular = $request->input('popular')==true? '1' : '0';
    // $product->meta_title = $request->input('meta_title');
    // $product->meta_keywords = $request->input('meta_keywords');
    // $product->meta_descrip = $request->input('meta_descrip');
    $product->save();
    return redirect('/dashboard')->with('status',"Product Added Successfully");

}


public function getproduct(){
    $product = productmodel::all();

    return view('admin.product.viewproduct',compact('product'));
}


}
