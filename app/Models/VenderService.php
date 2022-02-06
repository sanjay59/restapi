<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenderService extends Model
{
    use HasFactory;
    protected $table='tbl_vservice';
    protected $fillable=['name'];
}
