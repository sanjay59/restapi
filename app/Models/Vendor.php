<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table='tbl_vendor';
    protected $fillable=['evt_id','p_id','vcat_id', 'company_name', 'contact_no', 'email', 'mobile_no', 'city', 'country', 'website', 'gst_no', 'pan_no', 'address'];
    }
