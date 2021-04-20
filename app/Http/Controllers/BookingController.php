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
        $admin = admin::find($id);
        $bookings = booking::where('admin_id',$id)->paginate(10);
        return view('booking.index',compact('admin','users','bookings'));
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

        
      
      return redirect ('/booking/'.$booking->admin_id);
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
            // 'name' => 'nullable',
            // 'nomor' => 'nullable',
            'bb_id' => 'nullable',
            'user_id' => 'nullable'

        ]);
        $booking = booking::find($id);
        // $bookingbarbershop->barbershop_id = $request->bb_id;
        $booking->pesan = $request->pesan;
        // $bookingbarbershop->user_id = $request->user_id;
        $booking->save();

        return redirect('/booking/' .$booking->admin_id);//auth()->user()->id);
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = booking::find($id);
        $booking->delete();
        
        return redirect('/booking/'.$booking->admin_id);
    }
}
