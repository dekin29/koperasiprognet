<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataUsers = User::where('tb_users.status_aktif', '=', 1)
        ->get();
        $dataUsers2 = User::where('tb_users.status_aktif', '=', 0)
        ->get();
        return view('indexUsers',compact('dataUsers','dataUsers2'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($users)
    {
        User::find($users)->delete();
        return redirect('/users#nonaktif')->with('alert-success','Data berhasi dihapus!');        
    }

    public function aktif($users)
    {
        $dataUsers = User::where('id', $users)
        ->update(['status_aktif' => 1]);
        return redirect('/users#nonaktif');
    }

    public function nonaktif($users)
    {
        $dataUsers = User::where('id', $users)
        ->update(['status_aktif' => 0]);
        return redirect('/users#profile');
    }
}
