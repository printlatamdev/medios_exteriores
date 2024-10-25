<?php

namespace App\Http\Controllers\plataformasInstitucionales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// PARA LA RUTA BASE
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

class PlataformasInstitucionalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$user = Auth::user();
        $data = array(
            'urlJs'            => URL::to('/')         , // Each of these methods may also be accessed via the URL facade, tambien 'url' => url('/'), ruta base de laravel via helper
            'firstName'        => $user->first_name    ,
            'lastName'         => $user->last_name     ,

            'nameRole'  => $user->roles[0]["name"] ,
        );
        return view('plataformasInstitucionales/formPlataformasInstitucionales', $data);
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
}
