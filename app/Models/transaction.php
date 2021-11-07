<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaction extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='transaction';

    protected $fillable=[
        'uuid',
        'name',
        'email',
        'number',
        'address',
        'transaction_total',
        'transaction_status',
    ];
    public function details(){
        return $this->hasMany(transaction_details::class,'transactions_id');
    }
}
