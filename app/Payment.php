<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $guarded = [];

    public function booking()
    {
        return $this->belongsTo(Booking::class);        
    }
}
