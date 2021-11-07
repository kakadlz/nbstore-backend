<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product_galleries extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='product_galleries';

    protected $fillable=[
        'product_id',
        'photo',
        'is_default',
    ];

    public function products(){
        return $this->belongsTo(products::class,'product_id','id');

    }
    public function getPhotoAttribute($value){

        return url('storage/'.$value);
    }
}
