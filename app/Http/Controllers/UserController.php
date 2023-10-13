<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        $users=User::paginate(4);
        return view('user',compact('users'));
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
        $validated = $request->validate([
            'email' => 'required|ends_with:@azimutbs.com',
            'password' => 'max:10'

        ]);

        $user=User::create([
            'nom' =>  $request->nom,
            'prenom' =>  $request->prenom,
            'email' => $request->email,
            'password' =>Hash::make("$request->password")
        ]);
        return redirect()->route('user');
    }

    public function profile($id){
        $user=Auth::user()->id;

        $user=User::where('id',$id)->first();
        // dd($user);
        return view('profile',compact('user'));

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
        $user=User::find($id);
        return view('updateuser',compact('user'));
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

        $user=User::find($id);

        $validated = $request->validate([
            'email' => 'required|ends_with:@azimutbs.com',


        ]);

            $user->nom=  $request->nom;
            $user->prenom= $request->prenom;
            $user->email = $request->email;



            $user->save();
       // return redirect()->route('client');
       return redirect()->route('profile',Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $userfacture=$user->user_facture;

        if(count($userfacture)==0){
              $user->delete();
        }

        return redirect()->route('user');
    }
}
