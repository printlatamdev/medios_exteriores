<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// PARA LA RUTA BASE
use Illuminate\Support\Facades\URL;

use App\Models\User;


class DashboardController extends Controller
{

    public function __construct()
    {
        // REDIRECCIONA A LOGIN SI A EXPITRADO LA SESION, HACE REFERENCIA AL  'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class, EN kernel.php
        $this->middleware('auth');
        // $this->middleware(['role:admin','permission:dashboard']);
        // dd($this->middleware(['role:admin','permission:dashboard']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // session_start();
        // $user = $_SESSION["user"];
        // $dataObject = User::where('email','=','admin@admin.com')
        //               ->where('password','=',$this->encrypt('password', 'Cpmp-Sv-2022_#!*/'))
        //               ->first();
        // $user->hasRole(['admin']);
        // echo 'Lista de roles: '.$user->getRoleNames();
        // echo 'getRoleNames: '.$user->getRoleNames();
        $user = json_decode(''.Auth::user().'', true);
        $data = array(
            'urlJs'     => URL::to('/')              , // Each of these methods may also be accessed via the URL facade, tambien 'url' => url('/'), ruta base de laravel via helper
            'firstName' => $user['first_name']       ,
            'lastName'  => $user['last_name']        ,
            'nameRole'  => $user['roles'][0]["name"] ,
        );
        // $request->user()->authorizeRoles(['user', 'admin']);
        // $user->authorizeRoles(['admin', 'clientes']);
        
        //  var_dump( $user); // echo Auth::user(); // var_dump($user['roles'][0]["name"]);
        return view('home/formHome', $data);
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



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $data = array(
            'urlJs' => URL::to('/'), // Each of these methods may also be accessed via the URL facade, tambien url('/'), ruta base de laravel via helper
        );
        // return redirect()->route('usuario/login');
        return view('vistasLogin/formLoginUsuario', $data); 
    }


}
