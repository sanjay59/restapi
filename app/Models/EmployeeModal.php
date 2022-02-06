<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModal extends Model
{
    use HasFactory;
    protected $table='tbl_employee';
    protected $fillable=['name','email','password','role','status','access'];

}
