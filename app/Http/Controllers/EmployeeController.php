<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeModal;
use App\Models\AdminModal;
use App\Models\EventModal;
use App\Models\AddCategory;
use App\Models\DocumentModel;
use App\Models\Product;
use App\Models\ProductivityModal;
use App\Models\VenderCategory;
use App\Models\VenderService;
use App\Models\Vendor;
use App;
use DB;
use Session;

class EmployeeController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Calcutta");
    }
    public function index(Request $r)
    {
     if($r->session()->get('admin_id'))
     {
        return redirect('employee-list');
    }else{
        return view('adminlogin');
    }
}
public function dashboard(Request $r)
{
 if($r->session()->get('admin_id'))
 {
    $empcount=EmployeeModal::count();
    $catcount=AddCategory::count();
    $evtcount=EventModal::count();
    $doccount=DocumentModel::count();
   // print_r(allusers());die();
    $latestdoclist =DB::table('tbl_document')
    ->join('tbl_event', 'tbl_document.event_id', '=', 'tbl_event.id')
    ->select('tbl_document.id','tbl_document.file','tbl_document.created_at','tbl_event.name as evtname')->orderby('tbl_document.created_at','desc')->paginate(5);
    return view('dashboard',compact('empcount','catcount','evtcount','doccount','latestdoclist'));
}else{
    return view('adminlogin');
}
}
public function allproduct(Request $r)
{
    if($r->session()->get('admin_id'))
    {
        
       $company_name=$r->get('company_name');
       $service=$r->get('service');
       $event=$r->get('event');
       $p_name=$r->session()->get('p_name');
       $p_id=$r->session()->get('p_id');
       $capsule=array('p_name'=>$p_name,'p_id'=>$p_id);
       $cat=VenderCategory::orderBy('name')->get();
       $getevent=EventModal::orderby('name')->get();
       $getservice=VenderService::orderby('name')->get();
       $getvendor=Vendor::orderby('company_name')->get();
       $getproduct=DB::table('tbl_product')->
       leftjoin('tbl_vendor', 'tbl_product.v_id', '=', 'tbl_vendor.id')->
       leftjoin('tbl_vcat', 'tbl_product.pcat_id', '=', 'tbl_vcat.id')->
       leftjoin('tbl_vservice', 'tbl_product.p_service', '=', 'tbl_vservice.id')->
       leftjoin('tbl_event', 'tbl_vendor.evt_id', '=', 'tbl_event.id')->
       select('tbl_product.id','tbl_product.p_file','tbl_event.name as evtname','tbl_vcat.name','tbl_vservice.name as psname','tbl_product.p_price','tbl_product.status','tbl_product.p_service','tbl_vendor.company_name','tbl_vendor.city','tbl_vendor.contact_no','tbl_product.pcat_id')->where('tbl_product.status',1)->where('tbl_vendor.company_name','like','%'.$company_name.'%')->where('tbl_vservice.name','like','%'.$service.'%')->where('tbl_event.name','like','%'.$event.'%')->get();
       return view('vendar.products',compact('cat','getproduct','getevent','getservice','getvendor','company_name','event','service'))->with($capsule);
   }else{
    return redirect('/');
}
}
public function productsdetail(Request $r,$id)
{
    if($r->session()->get('admin_id'))
    {

        $p_name=$r->session()->get('p_name');
        $p_id=$r->session()->get('p_id');
        $capsule=array('p_name'=>$p_name,'p_id'=>$p_id);
        $cat=VenderCategory::orderBy('name')->get();
        $getevent=EventModal::orderby('name')->get();
        $getservice=VenderService::orderby('name')->get();
        $getvendor=Vendor::orderby('company_name')->get();
        $getpd=DB::table('tbl_product')->
        leftjoin('tbl_vendor', 'tbl_product.v_id', '=', 'tbl_vendor.id')->
        leftjoin('tbl_vcat', 'tbl_product.pcat_id', '=', 'tbl_vcat.id')->
        leftjoin('tbl_vservice', 'tbl_product.p_service', '=', 'tbl_vservice.id')->
        leftjoin('tbl_event', 'tbl_vendor.evt_id', '=', 'tbl_event.id')->
        select('tbl_product.id','tbl_product.p_file','tbl_product.payment_term','tbl_product.status','tbl_event.name as evtname','tbl_vcat.name','tbl_vservice.name as psname','tbl_product.p_price','tbl_product.p_service','tbl_vendor.*')->where('tbl_product.status',1)->where('tbl_product.id','like',$id)->first();
            // print_r($getproduct);die();
        return view('products_detail',compact('cat','getpd','getevent','getservice','getvendor'))->with($capsule);
    }else{
        return redirect('/');
    }
}
public function store(Request $request)
{
    $name=request('name');
    $email=request('email');
    $password=request('password');
    $reg= new App\Models\EmployeeModal;
    $reg->name=$name;
    $reg->email=$email;
    $reg->password=$password;
    $check_email=App\Models\EmployeeModal::where('email',$email)->get();

    if(count($check_email)>0)
    {
        return redirect()->back()->with('msg','employee Already exists.')->withInput();

    }
    $created=$reg->save();
    return redirect('employee-list');
}
public function store2(Request $r)
{
    $teamrole=$r->role;
        // print_r($teamrole);die();
    $check_team=EmployeeModal::where('email',$r->email)->get();
    $check_admin=AdminModal::where('email',$r->email)->get();
    if($teamrole=="team"){
        if(count($check_team)>0)
        {
           return response()->json(['code'=>200,'msg'=>'Email Already exists'], 200);
       }else{
        $post = EmployeeModal::Create(
            ['role' => $r->role,'name' => $r->name,'email' => $r->email,'password' =>$r->password]);
        return response()->json(['code'=>200, 'message'=>'Employee Save Successfully.','data' => $post], 200);
    }}else{
     if(count($check_admin)>0)
     {
       return response()->json(['code'=>200,'msg'=>'Email Already exists'], 200);
   }else{
    $post = AdminModal::Create(
        ['role' => $r->role,'name' => $r->name,'email' => $r->email,'password' =>$r->password]);
    return response()->json(['code'=>200, 'message'=>'Employee Save Successfully.','data' => $post], 200);
}
}
}
public function show(Request $r)
{
    if(!$r->session()->get('admin_id'))
    {
        return redirect('/');
    }else{
        // $employeelist=EmployeeModal::all();
        $employeelist=DB::table('tbl_employee')
        ->leftjoin('tbl_document', 'tbl_employee.id', '=', 'tbl_document.tm_id')
        ->select('tbl_document.tm_id','tbl_employee.name','tbl_employee.email','tbl_employee.id','tbl_employee.access','tbl_employee.password', DB::raw('count(tbl_document.tm_id) as totaldoc'))
        ->groupBy('tbl_document.tm_id','tbl_employee.name','tbl_employee.id','tbl_employee.email','tbl_employee.access','tbl_employee.password')
        ->orderBy('totaldoc','desc')->get();
            // print_r($employeelist);die();
        $adminlist=AdminModal::all();
        return view('employeelist',compact('employeelist','adminlist'));
    }
}
public function showreview(Request $r)
{
    if(!$r->session()->get('admin_id'))
    {
        return redirect('/');
    }else{
        // $reviewlist=DocumentModel::where('status',0)->get();
        $reviewlist =DB::table('tbl_document')
        ->join('tbl_category', 'tbl_document.cat_id', '=', 'tbl_category.id')
        ->join('tbl_event', 'tbl_document.event_id', '=', 'tbl_event.id')
        ->join('tbl_employee', 'tbl_document.tm_id', '=', 'tbl_employee.id')
        ->select('tbl_document.id','tbl_employee.name as tmname','tbl_document.name as docname','tbl_document.created_at','tbl_document.file','tbl_category.name as catname', 'tbl_event.name as evtname')
        ->orderBy('tbl_document.created_at','desc')->where('tbl_document.status',0)->get();
                // print($reviewlist);die();
        return view('review',compact('reviewlist'));
    }
}
public function documentshow(Request $r)
{
    if(!$r->session()->get('admin_id'))
    {
        return redirect('/');
    }else{
        $category=AddCategory::orderBy('name')->get();
        $doccount=DocumentModel::count();
        $doclist =DB::table('tbl_document')
        ->join('tbl_event', 'tbl_document.event_id', '=', 'tbl_event.id')
        ->join('tbl_category', 'tbl_document.cat_id', '=', 'tbl_category.id')
        ->select('tbl_document.id','tbl_document.file','tbl_event.name as evtname','tbl_category.name as catname')
        ->paginate(20);
        return view('documentlist',compact('doclist','doccount','category'));
    }
}
public function documentslideshow(Request $r,$id)
{
    if(!$r->session()->get('admin_id'))
    {
        return redirect('/');
    }else{
        // $post =DB::table('tbl_document')
        // ->join('tbl_event', 'tbl_document.event_id', '=', 'tbl_event.id')
        // ->join('tbl_category', 'tbl_document.cat_id', '=', 'tbl_category.id')
        // ->select('tbl_document.id','tbl_document.file','tbl_event.name as evtname','tbl_category.name as catname')
        // ->where('tbl_document.id',$id)->first();
        // $test='test';
     $post = DocumentModel::where('id', $id)->first();
     $previous = DocumentModel::where('id', '<', $id)->max('id');
     $next = DocumentModel::where('id', '>', $id)->min('id');
     if (empty($next)) { 
         $nfile = DocumentModel::first();
         $pfile = DocumentModel::first();
         $prevfile = $pfile->file; 
         $pfext = substr($prevfile, strpos($prevfile, ".") + 1);
         $data = $nfile->file; 
         $nfext = substr($data, strpos($data, ".") + 1); 
         $currentfile = $post->file; 
         $cfext = substr($currentfile, strpos($currentfile, ".") + 1);
         return response()->json(['filename'=>$data, 'next'=>$next, 'previous'=>$previous,'nfext'=>$nfext,'pfext'=>$pfext]);
     }else{ 
        $nfile = DocumentModel::where('id', $next)->first();
        // print_r($previous);
        if (empty($previous)){
            $pfile = DocumentModel::first();
        }else{
            $pfile = DocumentModel::where('id', $previous)->first();        
        }
        $data = $nfile->file; 
        $prevfile = $pfile->file; 
        $pfext = substr($prevfile, strpos($prevfile, ".") + 1);
        $nfext = substr($data, strpos($data, ".") + 1);
        return response()->json(['filename'=>$data, 'next'=>$next, 'previous'=>$previous,'nfext'=>$nfext,'pfext'=>$pfext]);
    } 
}
}
public function search(Request $r)
{
   $name=$r->get('name');
   $catname=$r->get('catname');
   $category=AddCategory::orderBy('name')->get();
   $doclist =DB::table('tbl_document')
   ->join('tbl_event', 'tbl_document.event_id', '=', 'tbl_event.id')
   ->join('tbl_category', 'tbl_document.cat_id', '=', 'tbl_category.id')
   ->select('tbl_document.id','tbl_document.file','tbl_event.name as evtname','tbl_category.name as catname')->where('tbl_event.name','LIKE','%'.$name.'%')->where('tbl_category.name','LIKE','%'.$catname.'%')->get();
   $doccount =DB::table('tbl_document')
   ->join('tbl_event', 'tbl_document.event_id', '=', 'tbl_event.id')
   ->join('tbl_category', 'tbl_document.cat_id', '=', 'tbl_category.id')
   ->select('tbl_document.id','tbl_document.file','tbl_event.name as evtname','tbl_category.name as catname')
   ->where('tbl_event.name','LIKE','%'.$name.'%')->where('tbl_category.name','LIKE','%'.$catname.'%')->count();
        // print_r($data);die();
        // if($doclist && $doccount){
   return view('documentlistsearch',compact('doclist','doccount','name','catname','category'));
        // }
}
public function documentshowcwise(Request $r,$id)
{
    if(!$r->session()->get('admin_id'))
    {
        return redirect('/');
    }else{
        // print_r($id);die();
     $doccount=DocumentModel::where('cat_id',$id)->where('status',1)->count();
     $catn=AddCategory::where('id',$id)->first();
     $catname=$catn->name;
     $cwiselist =DB::table('tbl_document')
     ->join('tbl_event', 'tbl_document.event_id', '=', 'tbl_event.id')
     ->select('tbl_document.id','tbl_document.file','tbl_event.name as evtname')
     ->where('tbl_document.status',1)->where('tbl_document.cat_id',$id)->get();
     return view('cwisedocumentlist',compact('cwiselist','doccount','catname'));
 }
}
public function documentshowtmwise(Request $r,$id)
{
    if(!$r->session()->get('admin_id'))
    {
        return redirect('/');
    }else{
        $doccount=DocumentModel::where('tm_id',$id)->where('status',1)->count();
        $teamn=EmployeeModal::where('id',$id)->first();
        $teamname=$teamn->name;
        // print_r($doccount);die();
        $tmwiselist =DB::table('tbl_document')
        ->join('tbl_event', 'tbl_document.event_id', '=', 'tbl_event.id')
        ->select('tbl_document.id','tbl_document.file','tbl_event.name as evtname')
        ->where('tbl_document.status',1)->where('tbl_document.tm_id',$id)->get();

        return view('tmwisedocumentlist',compact('tmwiselist','doccount','teamname'));
    }
}
public function documentshowewise(Request $r,$id)
{
    if(!$r->session()->get('admin_id'))
    {
        return redirect('/');
    }else{
        // print_r($id);die();
        $doccount=DocumentModel::where('event_id',$id)->where('status',1)->count();
        $evtn=EventModal::where('id',$id)->first();
        $evtname=$evtn->name;
        $ewiselist=DB::table('tbl_document')
        ->join('tbl_event', 'tbl_document.event_id', '=', 'tbl_event.id')
        ->select('tbl_document.id','tbl_document.file','tbl_event.name as evtname')
        ->where('tbl_document.status',1)->where('tbl_document.event_id',$id)->get();
        return view('ewisedocumentlist',compact('ewiselist','doccount','evtname'));
    }
}

public function check_employee(Request $r)
{
   $role=$r->role;
   $email=$r->email;
   $password=$r->password;
   $employee= EmployeeModal::where('email',$email)->where('password',$password)->get();
   if(count($employee)>0){
       $useraccess= EmployeeModal::where('email',$email)->first();
   // print_r($useraccess->access);die();
       if($useraccess->access==2){
        $r->session()->put('name',$employee[0]->name);
        $r->session()->put('id', $employee[0]->id);
        $id=$r->session()->get('id');
        $name=$r->session()->get('name');
        $data['table']=EmployeeModal::where('id','=',$id)
        ->update(['status'=>1]);
        return redirect('document-manager');
    }else{
        return redirect()->back()->with('checkuser','Your Account is Inactive')->withInput();
    }
}
else{
    return redirect()->back()->with('check','Login detail is incorrect')->withInput();
}
}
public function check_admin(Request $r)
{
   $role=$r->role;
   $email=$r->email;
   $password=$r->password;
   $admin= DB::table('admin')->where('email',$email)->where('password',$password)->get();

   if(count($admin)>0){
    $r->session()->put('name',$admin[0]->name);
    $r->session()->put('admin_id', $admin[0]->admin_id);
    $admin_id=$r->session()->get('admin_id');
    return redirect('dashboard');
}
else{
    return redirect()->back()->with('check','Login detail is incoorect')->withInput();
}
}

public function edit($id)
{
    $post = EmployeeModal::find($id);

    return response()->json($post);
}
// public function update(Request $r, $id)
// {
//     $contact = EmployeeModal::find($id);
//     $contact->name = $r->get('name');
//     $contact->email = $r->get('email');
//     $contact->password = $r->get('password');
//     $created=$contact->save();
//     return redirect('employee-list')->with('empdata', 'Update Successfully');
// }
public function documentedit($id)
{
    $post = DocumentModel::find($id);

    return response()->json($post);
}
public function approved(Request $r)
{ 
    $post = DocumentModel::where('id',$r->id)->update(
        ['status' => $r->status]);
    return response()->json(['code'=>200, 'message'=>'','data' => $post], 200);
}
public function rejectdocument($id)
{
    $rejdoc= DocumentModel::find($id)->first();
    if(file_exists(public_path('/assets/document/'.$rejdoc->file))){
        unlink(public_path('/assets/document/'.$rejdoc->file));
    }
    $aaa= DocumentModel::find($id)->delete();

    return redirect()->back()->with('rejdoc','Document File Delete Successfully');
}
public function productapproved(Request $r)
{ 
    $post = Product::where('id',$r->id)->update(
        ['status' => $r->status]);
    return response()->json(['code'=>200, 'message'=>'','data' => $post], 200);
}
public function productrejectdocument($id)
{
    $rejdoc= Product::where('id',$id)->first();
    // print_r($id);
    // print_r($rejdoc->id);
    // print_r($rejdoc->p_file);die();
    if(file_exists(public_path('/assets/product/'.$rejdoc->p_file))){
        unlink(public_path('/assets/product/'.$rejdoc->p_file));
    }
    $aaa= Product::find($id)->delete();

    return redirect()->back()->with('rejdoc','Product Review Delete Successfully');
}
public function userinactive(Request $r)
{ 
    $post = EmployeeModal::where('id',$r->id)->update(
        ['access' => $r->access]);
    return response()->json(['code'=>200, 'message'=>'','data' => $post], 200);
}

public function update(Request $r)
{ 
    $teamrole=$r->role;
    // print_r($teamrole);die();
    if($teamrole=='team'){
        $post = EmployeeModal::where('id',$r->id)->update(
            ['id' => $r->id,'name' => $r->name,'email' => $r->email,'password' =>$r->password]);
        return response()->json(['code'=>200, 'message'=>'Employee Save Successfully.','data' => $post], 200);
    }else{
       $post = AdminModal::where('id',$r->id)->update(
        ['id' => $r->id,'name' => $r->name,'email' => $r->email,'password' =>$r->password]);
       return response()->json(['code'=>200, 'message'=>'Employee Save Successfully.','data' => $post], 200);  }
   }
public function logout(Request $r)
{
    $r->session()->forget('admin_id');
    return redirect('/')->with('logout','Successfully Logout');
}
public function destroy($id)
{
    $employeedelete= EmployeeModal::find($id)->delete();
    return redirect()->back()->with('employeedelete','Successfully Delete');
}

public function deletedocument($id)
{
    $rejdoc= DocumentModel::find($id);
    // print_r($rejdoc->id);
    // print_r($rejdoc->file);die();
    if(file_exists(public_path('/assets/document/'.$rejdoc->file))){
        unlink(public_path('/assets/document/'.$rejdoc->file));
    }
    $aaa= DocumentModel::find($id)->delete();

    return redirect()->back()->with('rejdoc','Document File Delete Successfully');
}
}
