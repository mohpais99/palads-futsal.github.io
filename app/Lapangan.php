<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $table = 'lapangans';
    protected $guarded = [];

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }

    public function history()
    {
        return $this->hasOne(History::class);
    }

}
