<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;
use App\Models\AddCategory;

class CategoryController extends Controller
{
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
            // $categorylist=AddCategory::orderBy('name')->get();
            $categorylist=DB::table('tbl_category')
            ->leftjoin('tbl_document', 'tbl_category.id', '=', 'tbl_document.cat_id')
            ->select('tbl_document.cat_id','tbl_category.id','tbl_category.name', DB::raw('count(tbl_document.cat_id) as totaldoccwise'))
            ->groupBy('tbl_document.cat_id','tbl_category.name','tbl_category.id')
            ->orderBy('name')->get();
            // print_r($employeelist);die();
            return view('categorylist',compact('categorylist'));
        }
    }
    public function categorystore(Request $r)
    {
        $check_category=AddCategory::where('name',$r->name)->get();

        if(count($check_category)>0)
        {
           return response()->json(['code'=>200,'msg'=>'Category name already exists'], 200);
       }else{
        $post = AddCategory::updateOrCreate(['id' => $r->id],['name' => $r->name]);
        return response()->json(['code'=>200, 'message'=>'Category Save Successfully.','data' => $post], 200);
    }
}
public function edit($id)
{
    $post = AddCategory::find($id);

    return response()->json($post);
}
public function update(Request $r)
{ 
    $post = AddCategory::updateOrCreate(['id' => $r->id],['name' => $r->name]);
    return response()->json(['code'=>200, 'message'=>'Category Save Successfully.','data' => $post], 200);
}
public function destroy($id)
{
 $categorylist=AddCategory::find($id)->delete();
 return redirect()->back()->with('catmsg','Successfully Delete');
}
}
