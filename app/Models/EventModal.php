<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventModal extends Model
{
    use HasFactory;
    protected $table='tbl_event';
    protected $fillable=['name','date','type'];
}
