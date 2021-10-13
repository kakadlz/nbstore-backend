<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
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

    public function galleries(){
        // return $this->hasMany(productgalleries::class,'products_id');

    }
}
