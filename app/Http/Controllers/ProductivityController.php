<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductivityModal;
use App;

class ProductivityController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Calcutta");
    }
    public function index(Request $r)
    {
        $plist=ProductivityModal::orderBy('created_at','desc')->get();
        return view('vendar.productivitylist',compact('plist'));
    }
    public function productstore(Request $r)
    {
        $check_team=ProductivityModal::where('p_email',$r->email)->get();
        if(count($check_team)>0)
        {
         return response()->json(['code'=>200,'msg'=>'Email Already exists'], 200);
     }else{
        $post = ProductivityModal::Create(
            ['role' => 'vendor','p_name' => $r->name,'p_email' => $r->email,'p_password' =>$r->password]);
        return response()->json(['code'=>200, 'message'=>'Save Successfully.','data' => $post], 200);
    }
}
public function productedit($id)
{
    $post = ProductivityModal::where('p_id',$id)->first();

    return response()->json($post);
}
public function productupdate(Request $r)
{ 
        $post = ProductivityModal::where('p_id',$r->p_id)->update(
            ['p_id' => $r->p_id,'p_name' => $r->p_name,'p_email' => $r->p_email,'p_password' =>$r->p_password]);
        // print_r($post);
        return response()->json(['code'=>200, 'message'=>' Save Successfully.','data' => $post], 200);
}
public function productdestroy($id)
{
    $pdelete= ProductivityModal::where('p_id',$id)->delete();
    return redirect()->back()->with('employeedelete','Successfully Delete');
}
public function pinactive(Request $r)
{ 
    $post = ProductivityModal::where('p_id',$r->id)->update(
        ['access' => $r->access]);
    return response()->json(['code'=>200, 'message'=>'','data' => $post], 200);
}
}
