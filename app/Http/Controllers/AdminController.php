<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\admin;
use App\User;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $admins = admin::paginate(10);
        return view('admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $messages = [
    'required' => ':attribute Wajib diisi!!!',
    'unique' => ':attribute sudah ada!!!',
    
];
        $admin = new admin();
        $user = new \App\User;

       $this->validate($request,[

            'name' => 'required',
            'full_name' => 'required',
            'username' => 'required|unique:users',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'jenis_kelamin' => 'required',
            'daftar_harga' => 'required',
            'alamat' => 'required',
            'date' => 'required',
            'email' => 'required|unique:users',
            'number' => 'required'
        ],$messages);

        $user->role = 'admin';
        $user->name = $request->name;
        $user->full_name = $request->full_name;
        $user->username = $request->username;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->date = $request->date;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->password = bcrypt('12345678');
        $user->remember_token = Str::random(40);
        $user->save();


       
        $admin->name = $request->name;
        $admin->full_name = $request->full_name;
        $admin->username = $request->username;
        $admin->jam_buka = $request->jam_buka;
        $admin->jam_tutup = $request->jam_tutup;
        $admin->jenis_kelamin = $request->jenis_kelamin;
        $admin->alamat = $request->alamat;
        $admin->daftar_harga = $request->daftar_harga;
        $admin->date = $request->date;
        $admin->email = $request->email;
        $admin->number = $request->number;
        $admin->user_id = $user->id;
        $admin->status = 0;
        $admin->save();

        return redirect('admin');

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
        $admin = admin::find($id);
        return view('admin.edit',compact('admin'));
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
       $messages = [
            'required' => ':Attribute Wajib Diisi!!!',
        ];

        $admin = admin::find($id);
        $user = User::find($admin->user_id);

        $this->validate($request,[
            'name' => 'required',
            'full_name' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'jenis_kelamin' => 'required',
            'daftar_harga' => 'required',
            'alamat' => 'required',
            'date' => 'required',
            'number' => 'required'],$messages);

            $user->name = $request->name;
            $user->full_name = $request->full_name;
            $user->username = $request->username;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->alamat = $request->alamat;
            $user->date = $request->date;
            $user->email = $request->email;
            $user->number = $request->number;

            $admin->name = $request->name;
            $admin->full_name = $request->full_name;
            $admin->jam_buka = $request->jam_buka;
            $admin->jam_tutup = $request->jam_tutup;
            $admin->jenis_kelamin = $request->jenis_kelamin;
            $admin->alamat = $request->alamat;
            $admin->date = $request->date;
            $admin->daftar_harga = $request->daftar_harga;
            $admin->number = $request->number;

            if (strtolower($request->get('username')) == strtolower($admin->username)) {
            $request->validate([
                'username' => 'required',
            ]);
            $admin->username = $request->username;
        }else{
            $request->validate([
                'username' => 'required|unique:users',
            ]);
            $admin->username = $request->username;
        }


        if (strtolower($request->get('email')) == strtolower($admin->email)) {
            $request->validate([
                'email' => 'required',
            ]);
            $admin->email = $request->email;
        }else{
            $request->validate([
                'email' => 'required|unique:users',
            ]);
            $beshop->email = $request->email;
        }

        $user->save();
        $admin->save();

        
        return redirect('admin')->with('success', 'Data Berhasil Di Edit!!!');

         
    }


    public function status(Request $request)
    {
        //
        $admin = admin::find($request->get('bb_id'));

        $admin->status = $request->get('status');

        $admin->save();
        
        

        return redirect('/booking/'.$request->get('bb_id'));
    }

     public function cariid(Request $request){

        $cariid = $request->cariid;
        $admins = admin::where('id','Like',"%".$cariid."%")->paginate();
        return view('admin.index',compact('admins'));

    }

    public function cariname(Request $request){

        $cariname = $request->cariname;
        $admins = admin::where('name','Like',"%".$cariname."%")->paginate();
        return view('admin.index',compact('admins'));
    }

     public function cariemail(Request $request){

        $cariemail = $request->cariemail;
        $admins = admin::where('email','Like',"%".$cariemail."%")->paginate();
        return view('admin.index',compact('admins'));
    }

    public function cariinomor(Request $request) {
        $cariinomor = $request->cariemail;
        $admins = admin::where('number','Like',"%".$carinomor."%")->paginate();
        return view('admin.index',compact('admins'));
    }

    public function cariusername(Request $request){
    
        $cariusername = $request->cariusername;
        $admins = admin::where('username','Like',"%".$cariusername."%")->paginate();
        return view('admin.index',compact('admins'));
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
        $admin = admin::find($id);
        $user = User::find($admin->user_id);
        $admin->delete();
        $user->delete();

        return redirect('/admin');
    }
}
