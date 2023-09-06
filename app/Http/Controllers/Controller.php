<?php

namespace App\Http\Controllers;

use App\Models\catogeries;
// use Facade\FlareClient\Stacktrace\File;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Http\File ;
use Illuminate\Support\Facades\File;
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
    return redirect('/view_catogeries')->with('status','Data Deleted Sucessfully');


}
public function edited(Request $request , $id){


    $updatecat = catogeries::find($id);


    if($request->hasFile('image')){
        $path = 'uploads/catogery'.$updatecat->image;
        if(File::exists($path)){

            File::delete($path);
        }
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() .'.'.$ext;

        $file->move('uploads/catogery',$filename);
        $updatecat->image = $filename;
    }




    $updatecat->name = $request->input('name');
    $updatecat->slug = $request->input('slug');
    $updatecat->description = $request->input('description');
    $updatecat->status = $request->input('status')==true? '1' : '0';
    $updatecat->popular = $request->input('popular')==true? '1' : '0';
    $updatecat->meta_title = $request->input('meta_title');
    $updatecat->meta_keywords = $request->input('meta_keywords');
    $updatecat->meta_descrip = $request->input('meta_descrip');
    $updatecat->save();
    return redirect('/dashboard')->with('status',"Catogeries Updated Successfully");

}


}
