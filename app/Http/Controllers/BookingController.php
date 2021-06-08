<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use illuminate\Support\Facades\DB;
use App\admin;
use App\booking;
use App\activity;
use App\User;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function booking()
    {

        return view('booking.index');

    }

    public function index($id)
    {
        //
        $users = User::all();
        $auth_user = auth()->user()->id;
       // dd($auth_user);
        $admin = admin::find($id);
        $bookings = booking::where('admin_id',$id)->paginate(10);
        $booked_user = booking::where('admin_id', $id)->where('user_id',$auth_user)->get();
        //echo $auth_user . "\n";
        $btn_disabled = '';
        if(count($booked_user) > 0){
            $btn_disabled = 'disabled';
        }
        
       // $bookings_arr = json_decode(json_encode($all_bookings), true);
        return view('booking.index',compact('admin','users','bookings', 'btn_disabled'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $admin = admin::find($id);
        return view ('booking.create',compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id) 
    {
        //
        $booking = new Booking();
        $request->validate([
            'pesan' => 'nullable',
            'bb_id' => 'required',
            'user_id' => 'required'

        ]);
        
        $booking->admin_id = $request->bb_id;
        $booking->pesan = $request->pesan;
        $booking->user_id = $request->user_id;
        $booking->save();

        
      
      return redirect ('/booking/'.$booking->admin_id)->with('success', 'Booking Antrian Anda Berhasil Dibuat!!!');
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
    /*
    public function comentcreate($id)
    {
        $admin = admin::find($id);
        return view('booking.coment', compact('admin'));
    }

    public function comentstore(Request $request,$id)
    {
        $booking = new Booking();
        $request->validate([
            'bb_id' => 'required',
            'user_id' => 'required'

        ]);

        $booking->beshop_id = $request->bb_id;
        $booking->user_id = $request->user_id;
        $booking->save();

        return redirect ('/booking/'.$booking->admin_id);
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
        $booking = booking::find($id);
        return view('booking.edit',compact('booking'));
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

       
        $request->validate([

            'bb_id' => 'nullable',
            'user_id' => 'nullable'
            
        ]);

        $booking = booking::find($id);
        $booking->pesan = $request->pesan;
        $booking->save();

        return redirect('/booking/' .$booking->admin_id)->with('success', 'Booking Antrian Anda Berhasil di Edit!!!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $booking = booking::find($id);
        $booking->delete();
        
        return redirect('/booking/'.$booking->admin_id)->with('success', 'Antrian Berhasil Diselesaikan!!!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $booking = booking::find($id);
        $booking->delete();
        
        return redirect('/booking/'.$booking->admin_id)->with('success', 'Antrian Anda Berhasil Dibatalkan!!!');
    }
}


