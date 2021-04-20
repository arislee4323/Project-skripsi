<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use illuminate\Support\Facades\DB;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use Image;
use App\User;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::User();
        return view('profile.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function password(){

        return view('profile.password');
    }







    public function user() {
        $users = User::paginate(10);
        return view('user.index', compact('users'));
    }

    public function cariid(Request $request){

        $cariid = $request->cariid;
        $users = User::where('id','Like',"%".$cariid."%")->paginate();
        return view('user.index',compact('users'));

    }

     public function cariname(Request $request){

        $cariname = $request->cariname;
        $users = User::where('name','Like',"%".$cariname."%")->paginate();
        return view('user.index',compact('users'));

    }

    public function cariemail(Request $request){

        $cariemail = $request->cariemail;
        $users = User::where('email','Like',"%".$cariemail."%")->paginate();
        return view('user.index',compact('users'));

    }

    public function carinomor(Request $request){

        $carinomor = $request->carinomor;
        $users = User::where('number','Like',"%".$carinomor."%")->paginate();
        return view('user.index',compact('users'));

    }

     public function cariusername(Request $request){

        $cariusername = $request->cariusername;
        $users = User::where('username','Like',"%".$cariusername."%")->paginate();
        return view('user.index',compact('users'));

    }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $user = User::find($id);
        return view('profile.edit',compact('user'));
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
         if ($request->hasFile('avatar')){
            $tempat_upload = public_path('/uploads/avatars');
            $document = $request->file('avatar');
            $filename = $document->getClientOriginalName();
            $document->move($tempat_upload,$filename); 
            $user = Auth::User();
            $user->avatar = $filename;  
            $user->save();
             }
             return view('profile.index',array('user' => Auth::User()));
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
        $user = User::find($id);
        return view('profile.data_diri',compact('user'));
    }

    public function about()
    {
        return view('about.index');
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
            'full_name' => 'required',
            'jenis_kelamin' => 'required',
            'date' => 'required',
            'alamat' => 'required',
            'number' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->full_name = $request->full_name;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->date = $request->date;
        $user->number = $request->number;
        

        $user->save();

        return redirect('/profile');
    }

    public function passwordupdate(Request $request)
    {
        //
        $this->validate($request,[
            
            
            
            'old_password' => 'required',
            'password' => 'required|confirmed'
            
        ]);

       $hashedPassword = Auth::User()->password;


       if(Hash::check($request->old_password,$hashedPassword)) {
        $user = User::find(Auth::id());

        $user->password = Hash::make($request->password);

        $user->save();

        Auth::logout();

        return redirect('/login')->with('successMsg',"password is Changed Successfully");

       }else  {

        return redirect()->back()->with('errorMsg',"current Password is Invaild");
           # code...
       }
       
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
