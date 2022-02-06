<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\ProductivityModal;
use App\Models\VenderCategory;
use App\Models\VenderService;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\EventModal;
use Session;
use DB;

class VendorController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Calcutta");
    }
    public function index(Request $r)
    {
        if($r->session()->get('p_id'))
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
            return view('vendar.productsearch',compact('cat','getproduct','getevent','getservice','getvendor','company_name','event','service'))->with($capsule);
        }else{
            return redirect('/');
        }
    }

 public function productdetail(Request $r,$id)
    {
        if($r->session()->get('p_id'))
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
            return view('vendar.productdetail',compact('cat','getpd','getevent','getservice','getvendor'))->with($capsule);
        }else{
            return redirect('/');
        }
    }
 public function preview(Request $r)
    {
        if($r->session()->get('admin_id'))
        {
            $p_name=$r->session()->get('p_name');
            $p_id=$r->session()->get('p_id');
            $capsule=array('p_name'=>$p_name,'p_id'=>$p_id);
            $cat=VenderCategory::orderBy('name')->get();
            $getproduct=DB::table('tbl_product')->
            leftjoin('tbl_vendor', 'tbl_product.v_id', '=', 'tbl_vendor.id')->
            leftjoin('tbl_vcat', 'tbl_product.pcat_id', '=', 'tbl_vcat.id')->
            leftjoin('tbl_vservice', 'tbl_product.p_service', '=', 'tbl_vservice.id')->
            leftjoin('tbl_event', 'tbl_vendor.evt_id', '=', 'tbl_event.id')->
            leftjoin('tbl_productivity', 'tbl_product.p_user_id', '=', 'tbl_productivity.p_id')->
            select('tbl_productivity.p_name','tbl_product.id','tbl_product.status','tbl_product.p_file','tbl_event.name as evtname','tbl_vcat.name','tbl_vservice.name as psname','tbl_product.p_price','tbl_product.p_service','tbl_vendor.company_name','tbl_vendor.city','tbl_vendor.contact_no','tbl_product.pcat_id')->where('tbl_product.status',0)->get();
            return view('vendar.preview',compact('cat','getproduct'))->with($capsule);
        }else{
            return redirect('/');
        }
    }

 public function addvendor(Request $r)
 {
    if($r->session()->get('p_id'))
    {
        $p_name=$r->session()->get('p_name');
        $p_id=$r->session()->get('p_id');
        $capsule=array('p_name'=>$p_name,'p_id'=>$p_id);
        $cat=VenderCategory::orderBy('name')->get();
        $getevent=EventModal::orderBy('name')->get();
        $v_id=Vendor::orderBy('company_name')->get();
        return view('vendar.addvendor',compact('cat','v_id','getevent'))->with($capsule);
    }else{
        return redirect('/');
    }
}
public function addproduct(Request $r)
{
    if($r->session()->get('p_id'))
    {
        $p_name=$r->session()->get('p_name');
        $p_id=$r->session()->get('p_id');
        $capsule=array('p_name'=>$p_name,'p_id'=>$p_id);
        $vs_id=VenderService::orderBy('name')->get();
        $cat_id=VenderCategory::orderBy('name')->get();
            // $cat_id=DB::table('tbl_vendor')->join('tbl_vcat', 'tbl_vendor.vcat_id', '=', 'tbl_vcat.id')->select('tbl_vendor.vcat_id','tbl_vendor.id','tbl_vendor.company_name','tbl_vcat.name')->groupBy('tbl_vendor.vcat_id','tbl_vendor.id','tbl_vendor.company_name','tbl_vcat.name')->get();
        $v_id=Vendor::orderBy('company_name')->get();
            // $v_id=Vendor::groupBy('company_name')->select('*',DB::raw('count(*) as total'))->get();
        return view('vendar.addproduct',compact('vs_id','cat_id','v_id'))->with($capsule);
    }else{
        return redirect('/');
    }
}
public function getcategory(Request $r,$id)
{ 
    $post = Vendor::where('vcat_id',$id)->select('id','company_name')->get();
    $postcount = Vendor::where('vcat_id',$id)->count();
    if(!empty($post)){
        return response()->json(['code'=>200, 'message'=>'','data' => $post,'postcount'=>$postcount], 200);
    }else{
        return response()->json(['code'=>200, 'message'=>'Not Found'], 200);

    }
}
public function checkcompany(Request $r,$id)
{ 
    $post = Vendor::where('vcat_id',$id)->select('id','company_name')->first();
        // print_r($post);die();
    if(!empty($post)){
        return response()->json(['code'=>200, 'message'=>'','company_name'=>$post->company_name], 200);
    }else{
        return response()->json(['code'=>200, 'message'=>'Company Not Found'], 200);

    }
}
public function checkemail(Request $r,$email)
{ 
    $checkemail = Vendor::where('email',$email)->select('id','email')->first();
    if(!empty($checkemail)){
        return response()->json(['code'=>200, 'email'=>$checkemail->email], 200);
    }else{
        return response()->json(['code'=>200, 'message'=>'Emil Not Found'], 200);

    }
}
public function checkpan(Request $r,$pan_no)
{ 
    $checkpan_no = Vendor::where('pan_no',$pan_no)->select('id','pan_no')->first();
    if(!empty($checkpan_no)){
        return response()->json(['code'=>200, 'pan_no'=>$checkpan_no->pan_no], 200);
    }else{
        return response()->json(['code'=>200, 'message'=>'Pan No Not Found'], 200);

    }
}
public function check_productuser(Request $r)
{
 $role=$r->role;
 $email=$r->email;
 $password=$r->password;
 $employee= ProductivityModal::where('p_email',$email)->where('p_password',$password)->get();
 if(count($employee)>0){
     $useraccess= ProductivityModal::where('p_email',$email)->first();
     if($useraccess->access==1){
        $r->session()->put('p_name',$employee[0]->p_name);
        $r->session()->put('p_id', $employee[0]->p_id);
        $p_id=$r->session()->get('p_id');
        $p_name=$r->session()->get('p_name');
        $data['table']=ProductivityModal::where('p_id','=',$p_id)
        ->update(['status'=>1]);
        return redirect('product-search');
    }else{
        return redirect()->back()->with('checkuser','Your Account is Inactive')->withInput();
    }
}
else{
    return redirect()->back()->with('check','Login detail is incorrect')->withInput();
}
}
public function storevender(Request $request)
{
    $p_id=$request->session()->get('p_id');
    $evt_id=request('evt_id');
    $vcat_id=request('vcat_id');
    $company_name=request('company_name');
    $contact_no=request('contact_no');
    $mobile_no=request('mobile_no');
    $email=request('email');
    $city=request('city');
    $country=request('country');
    $website=request('website');
    $gst_no=request('gst_no');
    $pan_no=request('pan_no');
    $address=request('address');

    $vadd= new App\Models\Vendor;

    $vadd->evt_id=$evt_id;
    $vadd->p_id=$p_id;
    $vadd->vcat_id=$vcat_id;
    $vadd->company_name=$company_name;
    $vadd->contact_no=$contact_no;
    $vadd->mobile_no=$mobile_no;
    $vadd->email=$email;
    $vadd->city=$city;
    $vadd->country=$country;
    $vadd->website=$website;
    $vadd->gst_no=$gst_no;
    $vadd->pan_no=$pan_no;
    $vadd->address=$address;
    // print_r($doc);die();
    $check_pan=App\Models\Vendor::where('pan_no',$pan_no)->get();
    $check_email=App\Models\Vendor::where('email',$email)->get();
    $check_company=Vendor::where('vcat_id',$vcat_id)->where('company_name',$company_name)->get();
    // print_r(count($check_company));die();
    if(count($check_company)==0){
        if(count($check_pan)>0)
        {
            return redirect()->back()->with('checkpan','Pan No. Already exists.')->withInput();  
        }elseif(count($check_email)>0)
        {
            return redirect()->back()->with('checkemail','Email Already exists.')->withInput();  
        }else{
            $created=$vadd->save();
            return redirect('add-product')->with('addmsg','Vendor add successfully. Please add product data');
        }
    }else{
        return redirect()->back()->with('checkcom','This category company is already exist.')->withInput();  
    }
}
public function storeproduct(Request $request)
{
    $this->validate($request,[
         'p_price'=>'required',
         'p_remark'=>'required',
         'image'=>'required|mimes:jpeg,jpg,png|max:800',
      ]);
    
    $p_id=$request->session()->get('p_id');
    $v_id=request('v_id');
    $pcat_id=request('pcat_id');
    $p_service=request('p_service');
    $p_price=request('p_price');
    $payment_term=request('payment_term');
    $p_remark=request('p_remark');
    $vadd= new App\Models\Product;

    $vadd->p_user_id=$p_id;
    $vadd->v_id=$v_id;
    $vadd->pcat_id=$pcat_id;
    $vadd->p_service=$p_service;
    $vadd->p_price=$p_price;
    $vadd->payment_term=$payment_term;
    $vadd->p_remark=$p_remark;
    // print_r($doc);die();
    if($vadd){
        if($request->hasFile('image')){
        $file2=$request->file('image');
        $ext2=$file2->extension();
        $docfile=time()."1.".$ext2;
        $file2->move(public_path('/assets/product'),$docfile);
        $vadd->p_file=$docfile;
    }
    $created=$vadd->save();
    return redirect('product-search')->with('addmsg','Product Add Successfully');
}else{
    return redirect()->back()->withInput();
}
}

public function storevender2(Request $r)
{
    $check_category=Vendor::where('pan_no','12212')->get();
    // print_r($r->session()->get('p_id'));
    // print_r($r->vcat_id);
    // print_r($r->company_name);die();
    // print_r($check_category);die();
    if(count($check_category)>0)
    {
     return response()->json(['code'=>200,'msg'=>'Pan No. Already exists.'], 200);
 }else{
    $post =Vendor::updateOrCreate(['p_id'=>$r->session()->get('p_id')],['vcat_id'=>$r->vcat_id],['company_name'=>$r->company_name],['contact_no'=>$r->contact_no],['mobile_no'=>$r->mobile_no],['email'=>$r->email],['city'=>$r->city],['country'=>$r->country],['website'=>$r->website],['gst_no'=>$r->gst_no],['pan_no'=>$r->pan_no],['address'=>$r->address]);
    return response()->json(['code'=>200, 'message'=>'Add Successfully','data' => $post], 200);
}
}
public function productlogout(Request $r)
{
    $r->session()->forget('p_id');
    return redirect('/')->with('logout','Successfully Logout');
}
}
