<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Jam;
use App\Event;
use App\Booking;
use App\Payment;
use App\History;
use App\Gallery;
use App\Message;
use App\Lapangan;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Lapangan::all();

        return view('index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('about');
    }

    public function gallery()
    {
        $gallery = Gallery::orderBy('created_at', 'desc')->paginate(6);

        return view('galeri')->with('gallery', $gallery);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function payment()
    {
        if(!empty(Auth()->user()->booking)) {
            if (!empty(Auth()->user()->booking->payment)) {
                $id = Auth()->user()->id;
                $booking = Booking::where('user_id', '=', $id)->first();
                if ($booking->payment->active === '1' || $booking->payment->status === 'Waiting') {
                    $payment = Payment::where('booking_id', '=', $booking->id)
                                ->first();
                    $count_P = Payment::where('booking_id', '=', $booking->id)
                                ->where('status', '=', 'Belum Membayar')
                                ->count();        
                    return view('payment',compact('payment', 'booking', 'count_P'));
                }
            }
            return redirect('/home');
        }
        return redirect('/home')->with('error','Silahkan booking terlebih dahulu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lapanganView($slug)
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        // echo $currentDate; die();
        $lapangan = Lapangan::where('slug','=', $slug)->first();
        $booking = Booking::where('lapangan_id', $lapangan->id)->where('tanggal_main', $currentDate)->get();
        $get = Lapangan::where('slug', '<>', $slug)->get();
        

        $data = [];
        if ($booking != null) {
            foreach ($booking as $key) {
                array_push($data,$key->waktu_mulai);
            }
        }

        $jam = Jam::whereIn('time', $data)->get();
        $jam2 = Jam::whereNotIn('time', $data)->get();

        return view('lapangan',compact('lapangan','get','jam','jam2','booking'));

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function paymentStore(Request $request, $id)
    {
        $payment = Payment::find($id);
        if ($request->hasFile('struk')) {
            $file = $request->file('struk');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('img/upload');
            $file->move($destinationPath, $fileName);
            $payment->struk = $fileName;
        }
        $payment->status = 'Waiting';
        $payment->active = '0';
        $payment->save();

        return redirect('/payment')->with('success', 'Data Uploaded Successfully!! Terima Kasih telah menyewa tempat kami!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function paymentExpired($id)
    {
        $booking = Booking::find($id);
        $booking->delete();

        return redirect('/payment')->with('error', 'You failed loser!!');
    }

    public function history()
    {
        $Id = Auth()->user()->id;
        $count_B = Booking::where('user_id', $Id)->where('status', '<>', 'Unpaid')->count();
        $booking = Booking::where('user_id', $Id)->where('status', '<>', 'Unpaid')->first();
        $history = History::where('user_id', $Id)->where('active', '=', '0')->orderBy('created_at', 'desc')->get();
        $count_H = History::where('user_id', $Id)->where('active', '=', '0')->count();

        return view('history', compact('count_H','count_B','booking','history'));

    }

    public function historyUpdate($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'Started';
        $booking->save();

        return redirect('/history')->with('success', 'Waktu bermain mulai!!');
    }

    public function historyDelete($id)
    {
        $booking = Booking::find($id);
        if (!empty($booking)) {
            $history = History::where('user_id', $booking->user_id)->where('active', '=', '1')->first();
            $history->active = '0';
            $history->save();
        }
        $booking->delete();


        return redirect('/history')->with('error', 'Waktu bermain telah berakhir!!');
    }

    public function event()
    {
        $event = Event::orderBy('created_at', 'desc')->paginate(6);

        return view('event')->with('event', $event);
    }

    public function messageStore(Request $request){
        $message = new Message;

        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();

        return redirect()->back()->with('success', 'Your message is include!!');
    }
}
