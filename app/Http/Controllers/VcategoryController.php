<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\VenderCategory;


class VcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
       if(!$r->session()->get('admin_id'))
       {
        return redirect('/');
    }else{
        $vcategorylist=VenderCategory::orderBy('name')->get();
        return view('vendar.vendarcategory',compact('vcategorylist'));
    }
}
public function vcategorystore(Request $r)
{
    $check_category=VenderCategory::where('name',$r->name)->get();

    if(count($check_category)>0)
    {
     return response()->json(['code'=>200,'msg'=>'Vendor Category name already exists'], 200);
 }else{
    $post = VenderCategory::updateOrCreate(['id' => $r->id],['name' => $r->name]);
    return response()->json(['code'=>200, 'message'=>'Vendor Category Save Successfully.','data' => $post], 200);
}
}
public function vendorcatedit($id)
{
    $post = VenderCategory::find($id);

    return response()->json($post);
}
public function vendarcatupdate(Request $r)
{ 
    $post = VenderCategory::updateOrCreate(['id' => $r->id],['name' => $r->name]);
    return response()->json(['code'=>200, 'message'=>'Vendor Category Save Successfully.','data' => $post], 200);
}
public function vendorcatdestroy($id)
{
   $categorylist=VenderCategory::find($id)->delete();
   return redirect()->back()->with('catmsg','Vendor Successfully Delete');
}
}
