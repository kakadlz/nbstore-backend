<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaction_details extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='transaction_details';

    protected $fillable=[
        'pruducts_id',
        'transactions_id',
    ];
    protected $hidden = [

    ];

    public function transaction(){
        return $this->belongsTo(transaction::class,'transactions_id');
    }

    public function products(){
        return $this->belongsTo(products::class,'products_id');
    }
}
