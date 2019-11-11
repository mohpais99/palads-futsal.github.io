<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Event;
use App\Payment;
use App\Booking;
use App\Message;
use App\History;
use App\Gallery;
use App\Lapangan;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_U = User::where('role', '=', 'user')->count();
        $count_B = Booking::count();
        $count_L = Lapangan::count();
        $count_P = Payment::where('status', '=', 'Belum Membayar')->count();
        return view('admin.index', compact('count_U', 'count_B','count_P','count_L'));
    }

    public function user()
    {
        $user = User::where('role', '=', 'user')->orderBy('created_at', 'desc')->paginate(5);

        return view('admin.user')->with('user', $user);
    }

    public function cariUser(Request $request)
    {
        $cari = $request->search;
        
        $user = User::where('role', '=', 'user')->where('name','like',"%".$cari."%")->paginate(5);
            
        return view('admin.user', compact('user'));
    }

    public function userDetail($id)
    {
        $user = User::find($id);
        $history = History::where("user_id", $user->id)->orderBy('created_at', 'desc')->paginate(5);

        return view('admin.inc.detailUser', compact('user', 'history'));
    }

    public function userUpdate($id)
    {
        $user = User::find($id);
        $user->member = '1';
        $user->Save();

        return redirect('/list-user');
    }

    public function userDelete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/list-user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lapangan()
    {
        $lapangan = Lapangan::all();
        return view('admin.lapangan', compact('lapangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function booking()
    {
        $booking = Booking::orderBy('created_at', 'desc')->paginate(5);
        $id = Auth()->User()->id;
        $lapangan = Lapangan::all();
        $count = History::where('user_id', '=', $id)->count();

        return view('admin.booking', compact('booking','count'));
    }

    public function cariBooking(Request $request)
    {
        $cari = $request->search;
        
        $booking = DB::table('bookings')
            ->where('nama_pemesan','like',"%".$cari."%")
            ->get();
            
        return view('admin.booking', compact('booking'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pembayaran()
    {
        $payment = Payment::orderBy('created_at', 'desc')->paginate(5);

        return view('admin.payment', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmpembayaran($id)
    {
        $payment = Payment::find($id);

        return view('admin.inc.paymentConfirm', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pembayaranUpdate(Request $request, $id)
    {
        $history = History::all();
        if (!empty($request)) {
            $history = new History;
            $history->user_id = $request->user_id;
            $history->lapangan_id = $request->lapangan_id;
            $history->nama_pemesan = $request->nama_pemesan;
            $history->tanggal_main = $request->tanggal_main;
            $history->waktu_mulai = $request->waktu_mulai;
            $history->no_telp = $request->no_telp;
            $history->harga = $request->harga;
            $history->struk = $request->struk;
            $history->active = '1';
            $history->save();

            $payment_U = Payment::find($id);
            $payment_U->delete();

            $booking_U = Booking::where('id', $payment_U->booking_id)->first();
            $booking_U->status = 'Incoming';
            $booking_U->save();

            return redirect()->route('booking')->with('success', 'Data Updated !!!');
        }
        return redirect()->back()->with('error', 'Tidak ada data masuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pembayaranDestroy($id)
    {
        $booking = Booking::find($id);
        $payment = Payment::where('booking_id', $id)->first();
        if ($payment <> null) {
            if (file_exists("img/upload/$payment->struk")) {
                unlink("img/upload/$payment->struk");
            }
        }
        $booking->delete();

        return redirect()->back()->with('success', 'Data Deleted Successfully !!!');
    }

    public function riwayat()
    {
        $history = History::orderBy('created_at', 'desc')->paginate(3);

        return view('admin.riwayat', compact('history'));
    }

    public function cariRiwayat(Request $request)
    {
        $cari = $request->search;
        
        $history = History::where('nama_pemesan','like',"%".$cari."%")->paginate(3);
            
        return view('admin.riwayat', compact('history'));
    }

    public function riwayatDestroy($id)
    {
        $history = History::find($id);
        $history->delete();

        return redirect()->back()->with('success', 'Data Deleted Successfully !!!');
    }

    public function gallery()
    {
        $gallery = Gallery::orderBy('created_at', 'desc')->paginate(8);

        return view('admin.gallery')->with('gallery', $gallery);
    }

    public function addGallery()
    {
        return view('admin.inc.addGallery');
    }

    public function pushGallery(Request $request)
    {
        $gallery = new Gallery;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('img/gallery/');
            $file->move($destinationPath, $fileName);
            $gallery->gambar = $fileName;
        }
        $gallery->save();

        return redirect("/list-gallery")->with('success', 'Data gallery has included!!');
    }

    public function event()
    {
        $event = Event::orderBy('created_at', 'desc')->paginate(8);

        return view('admin.event')->with('event', $event);
    }

    public function addEvent()
    {
        return view('admin.inc.addEvent');
    }

    public function pushEvent(Request $request)
    {
        $event = new Event;
        $event->title = $request->title;
        $event->slug = Str::slug($request->title);
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('img/event/');
            $file->move($destinationPath, $fileName);
            $event->gambar = $fileName;
        }
        $event->description = $request->description;
        $event->save();

        return redirect("/list-event")->with('success', 'Data event has included!!');
    }

    public function editEvent($id, Request $request)
    {
        $event = Event::find($id);
        $event->title = $request->title;
        $event->slug = Str::slug($request->title);
        $event->description = $request->description;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('img/event/');
            $file->move($destinationPath, $fileName);
            $event->gambar = $fileName;
        }
        $event->save();

        return redirect("/list-event")->with('success', 'Data event has updated!!');
    }

    public function showEvent($slug)
    {
        $event = Event::where('slug', $slug)->first();

        return view('admin.inc.showEvent')->with('event', $event);
    }

    public function eventDestroy($id)
    {
        $event = Event::find($id);
        if ($event <> null) {
            if (file_exists("img/event/$event->gambar")) {
                unlink("img/event/$event->gambar");
            }
        }
        $event->delete();

        return redirect("/list-event")->with('success', 'Data event has deleted!!');
    }

    public function message()
    {
        $message = Message::orderBy('created_at', 'desc')->paginate(8);

        return view('admin.message')->with('message', $message);
    }

    public function messageDelete($id)
    {
        $message = Message::find($id);
        $message->delete();

        return redirect("/list-message")->with('success', 'Data message has deleted!!');
    }
}
