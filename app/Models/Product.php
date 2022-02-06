<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
     protected $table='tbl_product';
    protected $fillable=['p_user_id','v_id', 'pcat_id', 'p_service', 'p_price', 'payment_term','p_file','p_remark'];

}
