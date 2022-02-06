<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\VenderService;


class VserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        date_default_timezone_set("Asia/Calcutta");
    }
    public function index(Request $r)
    {
       if(!$r->session()->get('admin_id'))
       {
        return redirect('/');
    }else{
        $vcategorylist=VenderService::orderBy('name')->get();
        return view('vendar.venderservice',compact('vcategorylist'));
    }
}
public function vservicestore(Request $r)
{
    $check_category=VenderService::where('name',$r->name)->get();

    if(count($check_category)>0)
    {
     return response()->json(['code'=>200,'msg'=>'Vendor Category name already exists'], 200);
 }else{
    $post = VenderService::updateOrCreate(['id' => $r->id],['name' => $r->name]);
    return response()->json(['code'=>200, 'message'=>'Vendor Category Save Successfully.','data' => $post], 200);
}
}
public function vendorcatedit($id)
{
    $post = VenderService::find($id);

    return response()->json($post);
}
public function vendarcatupdate(Request $r)
{ 
    $post = VenderService::updateOrCreate(['id' => $r->id],['name' => $r->name]);
    return response()->json(['code'=>200, 'message'=>'Vendor Category Save Successfully.','data' => $post], 200);
}
public function vendorcatdestroy($id)
{
   $categorylist=VenderService::find($id)->delete();
   return redirect()->back()->with('catmsg','Vendor Successfully Delete');
}
}
