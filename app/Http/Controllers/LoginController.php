<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = new User();
        // $user->password = Hash::make('naila.ayadi');
        // $user->email = 'naila.ayadi@azimutbs.com';
        // $user->nom = 'Ayadi';
        // $user->prenom = 'Naila';
        // $user->save();
        if(Auth::id()) return redirect()->route('home');
        return view('login');
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
    public function store(Request $request)
    {
        // dd ($request);
        // $this->validate($request,[
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);
        // return 123;

            $request->validate([
                'email'=>'required|email',
                'password'=>'required'
            ]);

            $user=User::where('email','=', $request->email)->first();

            if($user){
                if(Hash::check($request->password, $user->password)){
                    $request->Session()->put('password',$user->id);
                   // return redirect('dashboard');
                   return view('home');
                }
                else{
                    return  back()->with('fail','Password not matches !');
                }
            }
            else{
                return back()->with('fail','This email doesn\'t exist');
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $posts= user::find($id);
        // return view('index',['posts'=>$posts]);
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

    public function resetpassword(){
        return view('resetpassword');
    }

    public function forgotpassword(){
        return view('forgotpassword');
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
        return view('resetpassword');
    }

    public function reset(Request $request){
        return view('resetpassword');
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
