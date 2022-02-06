<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentModel extends Model
{
    use HasFactory;
     protected $table='tbl_document';
    protected $fillable=['tm_id','cat_id','event_id','name','file'];
}
