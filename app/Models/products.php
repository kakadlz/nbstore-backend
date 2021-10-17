<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class products extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='products';

    protected $fillable=[
        'name',
        'type',
        'description',
        'price',
        'slug',
        'quantity',
    ];

    public function product_galleries(){
        return $this->hasMany(product_galleries::class,'product_id');

    }
}
