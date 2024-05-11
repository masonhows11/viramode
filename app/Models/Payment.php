<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected  $fillable = [
        'user_id',
        'order_id',
        'amount',
        'status',
        'type',
        'bank_ref_number',
        'paymentable_id',
        'paymentable_type'
    ];



    public function user(){

        return $this->belongsTo(User::class);
    }

    public function paymentable(){

        return $this->morphTo();
    }


    public function confirm($track_id)
    {
      $this->status = 1;
      $this->bank_ref_number = $track_id;
      $this->save();
    }

    public function confirmFailed()
    {
      $this->status = 2;
      $this->save();
    }

    
}
