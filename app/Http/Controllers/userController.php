<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }
    protected function validator(array $data)
    {
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:191|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);
    }
    protected function create(array $data)
    {
        return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
        'password' => bcrypt($data['password']),
        ]);
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
        $this->validate($request, [
            'user' => 'required',
            'password' => 'required',
            'email' => 'required'
         ]);
         $userv=User::where(['name'=>$request->user])->first();
        if(empty($userv) ){
            $user=new User;
            $user->name=$request->user;
            $user->password=$request->password;
            $user->email=$request->email;
            $user->save();
            return view('login');
        }else{
            return back()->with('error', 'user name is alrdy signed');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
         ]);
        $user=User::where(['name'=>$request->username,'password'=>$request->password])->first();
        if(empty($user) ){
            return back()->with('error', 'user name or password falid');
        }else{
            session(['userid'=>$user->id]);
            return view('images_view');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
