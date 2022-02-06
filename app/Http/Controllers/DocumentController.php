<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddCategory;
use App\Models\EventModal;
use App\Models\EmployeeModal;
use App\Models\DocumentModel;
use App;
use DB;

class DocumentController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Calcutta");
    }
    public function emplogin(Request $r)
    {
     if($r->session()->get('id')){
        return redirect('document-manager');
    }
    // elseif($r->session()->get('admin_id')){
    //     return redirect('employee-list');
    // }
    elseif($r->session()->get('p_id')){
        return redirect('product-search');
    }else{
        return view('employeelogin');
    }
}
public function index(Request $r)
{
    if($r->session()->get('id')){
        $name=$r->session()->get('name');
        $id=$r->session()->get('id');
        $category=AddCategory::orderBy('name')->get();
        $event=EventModal::orderBy('name')->get();
        $latest5=DB::table('tbl_document')
       ->join('tbl_event', 'tbl_document.event_id', '=', 'tbl_event.id')
       ->join('tbl_employee', 'tbl_document.tm_id', '=', 'tbl_employee.id')
       ->select('tbl_document.*','tbl_event.name as evtname','tbl_employee.name as teamname')
       ->latest('tbl_document.created_at','desc')->take(4)->get();
        $countdocteam=DB::table('tbl_employee')
            ->join('tbl_document', 'tbl_employee.id', '=', 'tbl_document.tm_id')
            ->select('tbl_document.tm_id','tbl_employee.name', DB::raw('count(tbl_document.tm_id) as totaldoc'))
            ->groupBy('tbl_document.tm_id','tbl_employee.name',)
            ->orderBy('totaldoc','desc')->take(10)->get();
         // print_r($countdocteam);die();
    $capsule=array('name'=>$name,'id'=>$id);
        return view('documentmanager',compact('name','event','category','latest5','countdocteam'))->with($capsule);
    }else{
        return redirect('/');
    }
}
public function storedocument(Request $request)
{
    $tm_id=$request->session()->get('id');
    $cat_id=request('cat_id');
    $event_id=request('event_id');
    $name=request('name');
    $doc= new App\Models\DocumentModel;
    if($request->hasFile('file')){
        $file2=$request->file('file');
        $ext2=$file2->extension();
        $docfile=time()."1.".$ext2;
        $file2->move(public_path('/assets/document'),$docfile);
        $doc->file=$docfile;
    }
    $doc->tm_id=$tm_id;
    $doc->cat_id=$cat_id;
    $doc->event_id=$event_id;
    $doc->name=$name;
    // print_r($doc);die();
    $created=$doc->save();
    return redirect()->back()->with('docmsg','Uploaded Successfully');
}
public function employeelogout(Request $r)
{
    $r->session()->forget('id');
    return redirect('/')->with('logout','Successfully Logout');
}

public function getData(Request $r)
{
    $a=1
    $data=User::with('userhobies')->where('like','%',$a)->get();
} 
}
