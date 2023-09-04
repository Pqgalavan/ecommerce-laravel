<?php

namespace App\Http\Controllers;

use App\Models\catogeries;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request ;
use Illuminate\Routing\Controller as BaseController;
// use Illuminate\Support\Facades\Request as FacadesRequest;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;





//     public function insert(Request $request){
//         dd($request->input());
//         // $catogeries = new catogeries();
//         // if($request->hasFile('image')){
//         //     $file = $request->file('image');
//         //     $ext = $file->getClientOriginalExtension();
//         //     $filename = time() .'.'.$ext;
//         //     $catogeries->image = $filename;
//         // }


//         // $catogeries->name = $request->input('name');
//         // $catogeries->slug = $request->input('slug');
//         // $catogeries->description = $request->input('description');
//         // $catogeries->status = $request->input('status');
//         // $catogeries->popular = $request->input('popular');
//         // $catogeries->meta_title = $request->input('meta_title');
//         // $catogeries->meta_keywords = $request->input('meta_keywords');
//         // $catogeries->meta_descrip = $request->input('meta_descrip');
//         // $catogeries->save();
//         // return redirect('/dashboard')->with('status',"Catogeries Added Successfully");
//     }
// }

public function showdata(Request $request){
    $catogeries = new catogeries();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'.$ext;
            $catogeries->image = $filename;
            $file->move('uploads/catogery',$filename);
        }


        $catogeries->name = $request->input('name');
        $catogeries->slug = $request->input('slug');
        $catogeries->description = $request->input('description');
        $catogeries->status = $request->input('status')==true? '1' : '0';
        $catogeries->popular = $request->input('popular')==true? '1' : '0';
        $catogeries->meta_title = $request->input('meta_title');
        $catogeries->meta_keywords = $request->input('meta_keywords');
        $catogeries->meta_descrip = $request->input('meta_descrip');
        $catogeries->save();
        return redirect('/dashboard')->with('status',"Catogeries Added Successfully");
}

public function viewcat(){

   $catogeries =  catogeries::all();
   return view('admin.view',compact('catogeries'));

}


public function editcat($id){

    $editcat = catogeries::find($id);

    return view('admin.editcatogeries',compact('editcat'));

}

public function dltcat($id){
    $deletecat = catogeries::find($id);

    $deletecat->delete();
    return view('admin.view')->with('status','Data Deleted Sucessfully');


}


}
