<?php
 namespace App\Http\Controllers;
use App\Models\DocumentModel; 
use DB;


function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}
   
function imgpath()
{
    return url('/');
}
function allusers()
{
    $data=DB::table('tbl_document')
    ->join('tbl_event', 'tbl_document.event_id', '=', 'tbl_event.id')
    ->select('tbl_document.id','tbl_document.file','tbl_document.created_at','tbl_event.name as evtname')->orderby('tbl_document.created_at','desc')->paginate(5);;
    return $data;
}