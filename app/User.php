<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function history()
    {
        return $this->hasOne(History::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }

    public function getpay()
    {
        if (!empty($this->booking->payment)) {
            $booking = Booking::where('status', '<>', 'Incoming')
                                ->where('user_id', $this->id)
                                ->first();
            $getPay = Payment::where('booking_id', $booking->id)
                    ->count();
            return $getPay;
        }
    }

    public function getHistory()
    {
        if (!empty($this->history)) {
            $history = History::where(['user_id'=> $this->id])->count();
            return $history;
        }
    }
}
