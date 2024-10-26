<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// PARA LA RUTA BASE
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = json_decode(''.Auth::user().'', true);
        $data = [
            'urlJs' => URL::to('/'), // Each of these methods may also be accessed via the URL facade, tambien 'url' => url('/'), ruta base de laravel via helper
            'firstName' => $user['first_name'],
            'lastName' => $user['last_name'],
            //'nameRole' => $user['roles'][0]['name'],
        ];
        return view('home/formHome', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
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

        $data = [
            'urlJs' => URL::to('/'), // Each of these methods may also be accessed via the URL facade, tambien url('/'), ruta base de laravel via helper
        ];

        // return redirect()->route('usuario/login');
        return view('loginViews/formLoginUsuario', $data);
    }
}
