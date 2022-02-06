<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenderCategory extends Model
{
    use HasFactory;
    protected $table='tbl_vcat';
    protected $fillable=['name'];
}
