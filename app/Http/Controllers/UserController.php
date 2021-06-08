<?php

namespace App\Http\Controllers;
use illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        //
       
     
        $users = User::where('role', 'users')->paginate(10);
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function cariid(Request $request){

        $cariid = $request->cariid;
        $users = user::where([['id','Like',"%".$cariid."%"], ['role', 'users']])->paginate();
        return view('user.index',compact('users'));

    }

     public function cariname(Request $request){

        $cariname = $request->cariname;
        $users = user::where([['name','Like',"%".$cariname."%"], ['role', 'users']])->paginate();
        return view('user.index',compact('users'));

    }

    public function cariemail(Request $request){

        $cariemail = $request->cariemail;
        $users = user::where([['email','Like',"%".$cariemail."%"], ['role', 'users']])->paginate();
        return view('user.index',compact('users'));

    }

    public function carinomor(Request $request){

        $carinomor = $request->carinomor;
        $users = user::where([['number','Like',"%".$carinomor."%"], ['role', 'users']])->paginate();
        return view('user.index',compact('users'));

    }

     public function cariusername(Request $request){

        $cariusername = $request->cariusername;
        $users = user::where([['username','Like',"%".$cariusername."%"], ['role', 'users']])->paginate();
        return view('user.index',compact('users'));

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
        $user = user::find($id);
        return view('user.edit',compact('user'));
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
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = user::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        $user = user::find($id);
        $user->delete();

        return redirect('/user')->with('success', 'Data User Berhasil Dihapus!!!');
    }
}
