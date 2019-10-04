<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginAkun;
use Session;
use Validator;
class Login extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function cek(Request $req)
    {
        $this->validate($req,[
            'usr'=>'required',
            'psw'=>'required'
        ]);
        $proses = new LoginAkun();
        $proses==LoginAkun::where('username',$req->usr)->where('password',$req->psw)->first();
        if($proses){
            Session::put('id',$proses->id);
            Session::put('username',$proses->username);
            Session::put('password',$proses->password);     
            Session::put('login_status',true);
            return redirect('/kontak');
        } else {
            
            Session::flash('alert_pesan','Username dan Password tidak cocok');
            return redirect('login');
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function logout()
    {
        Session::flush();
        return redirect('login');
    }
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
