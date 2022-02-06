<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductivityModal extends Model
{
    use HasFactory;
    protected $table='tbl_productivity';
    protected $fillable=['p_name','p_email','p_password','role','status','access'];

}
