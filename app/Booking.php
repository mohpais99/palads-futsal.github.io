<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['user_id','lapangan_id','nama_pemesan','tanggal_main','waktu_mulai','waktu_akhir','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function getStatus()
    {
        if ($this->status === 'Incoming') {
            return 'badge-warning';
        } elseif ($this->status === 'Started') {
            return 'badge-success';
        }
    }
}
