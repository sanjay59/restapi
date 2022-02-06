<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventModal;
use App\Models\DocumentModel;

use App;

class EventController extends Controller
{
    public function index(Request $r)
    {
     if(!$r->session()->get('admin_id'))
     {
        return redirect('/');
    }else{
        $eventlist=EventModal::orderBy('date','desc')->get();
        return view('eventlist',compact('eventlist'));
    }
}
public function eventsave(Request $request)
{
    $type=request('type');
    $name=request('name');
    $date=request('date');
    $reg= new App\Models\EventModal;
    $reg->type=$type;
    $reg->name=$name;
    $reg->date=$date;
    $check_evtname=EventModal::where('name',$name)->get();
    if(count($check_evtname)>0)
    {
        return redirect()->back()->with('msg','Event already exists.')->withInput();
    }
    $created=$reg->save();
    return redirect('event-list');
}
public function updateevent(Request $r, $id)
{
    $contact = EventModal::find($id);
    $contact->type = $r->get('type');
    $contact->name = $r->get('name');
    $contact->date = $r->get('date');
    $created=$contact->save();
    return redirect('event-list')->with('empdata', 'Update Successfully');

}
public function eventcomplete(Request $r)
{ 
    $post = EventModal::where('id',$r->id)->update(
        ['status' => $r->status]);
    return response()->json(['code'=>200, 'message'=>'','data' => $post], 200);
}
public function deleteevent($id)
{
    $deldoc= DocumentModel::where('event_id',$id)->get();
    // foreach($deldoc as $docf){
    //     if(file_exists(public_path('/assets/document/'.$docf->file))){
    //         unlink(public_path('/assets/document/'.$docf->file));
    //     }
    // }
    $devt= EventModal::find($id)->delete();
    $deldocr= DocumentModel::where('event_id',$id)->delete();

    return redirect()->back()->with('delevt','Event Delete Successfully');
}
}
