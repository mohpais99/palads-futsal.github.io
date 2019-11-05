<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Payment;
use App\Booking;
use App\History;
use App\Lapangan;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth()->user();
        if (!empty($auth)) {
            $id = Auth()->User()->id;
            $lapangan = Lapangan::all();
            $count = History::where('user_id', '=', $id)->count();
            $booking = Booking::where('user_id', '=', $id)->first();
            $history = History::where('user_id', $id)->where('active', '=', '0')->orderBy('created_at', 'desc')->get();

            return view('boking', compact('lapangan','booking','count', 'history'));
        } else {
            return redirect()->back()->with('error','Silahkan login terlebih dahulu untuk dapat mengakses halaman ini !!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty(Auth()->user()->booking)) {
            return redirect()->back()->with('error', 'Anda sudah memiliki riwayat booking, silahkan selesaikan booking terlebih dahulu !!');
        }

        $currentTime = Carbon::now()->format('H:i');
        $currentDate = Carbon::now()->format('Y-m-d');
        if (!empty($request)) {
            $Id = $request->lapangan_id;
            $tgl = $request->tanggal_main;
            $date = date('Y-m-d', strtotime($tgl));
            $start_time = date("H:i", strtotime($request->waktu_mulai));
            $end_time = date("H:i", strtotime($request->waktu_mulai) + $request->lama_bermain);

            if(!empty(Auth()->user()->booking) && Auth()->user()->booking->status === 'Unpaid') {
                return redirect()->back()->with('error', 'Anda sudah booking dan belum membayar !!');
            }
            // 1. Kondisi dimana waktu bermain pada tanggal sekarang sudah lewat
            if ($currentDate === $date && $start_time < $currentTime) {
                return redirect()->back()->with('error', 'Waktu bermain telah lewat !!');
            }

            // Mencari data input start_time yang sama di db dan hasilny akan dihitung
            $start_detect = Booking::where("lapangan_id", "=", $Id)
            ->where('tanggal_main', '=', $date)
            ->where('waktu_mulai', '=', $start_time)
            ->count();

            // 2. Lalu di kondisikan jika $start_detect ada datanya maka akan error
            if ($start_detect > 0) {
                return redirect()->back()->with('error', 'Waktu bermain telah di booking !!');
            }

            // Mencari data input end_time yang sama atau di antara waktu booking yang ada
            $end_detect = Booking::where("lapangan_id", "=", $Id)
            ->where('tanggal_main', '=', $date)
            ->where('waktu_mulai', '<', $end_time)
            ->where('waktu_akhir', '>', $end_time)
            ->count();

            // 3. Lalu di kondisikan lagi jika $end_detect ada datanya maka akan error
            if ($end_detect > 0) {
                return redirect()->back()->with('error', 'Waktu bermain telah di booking !!');
            }            

            // Kalau lolos dari 3 kondisi di atas maka data akan di proses untuk di input
            if ($start_detect == 0 && $end_detect == 0) {
                $booking = new Booking;
                $booking->user_id = $request->user_id;
                $booking->lapangan_id = $request->lapangan_id;
                $booking->nama_pemesan = $request->nama_pemesan;
                $booking->tanggal_main = $date;
                $booking->waktu_mulai = $start_time;
                $booking->waktu_akhir = $end_time;
                $booking->status = 'Unpaid';
                $booking->save();
    
                $request->request->add(['booking_id' => $booking->id]);
                    $harga = ($request->lama_bermain/3600)*70000;
                    $end_payment = date("H:i", strtotime($request->waktu_mulai) - 1200);
                    $pay = new Payment;
                    $pay->booking_id = $request->booking_id;
                    $pay->no_telp = $request->no_telp;
                    $pay->harga = $harga;
                    $pay->status = 'Belum Membayar';
                    $pay->active = '1';
                    $pay->end_payment = $end_payment;
                    $pay->save();
            }

            return redirect('/home')->with('success', 'Data Included Successfully!! Terima Kasih telah menyewa tempat kami!!');
        }

        return redirect()->back()->with('error', 'Include data failed !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
