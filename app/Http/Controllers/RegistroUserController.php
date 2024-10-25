<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// SON DE LARAVEL PERMISSION
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Permission;

class RegistroUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'urlJs' => URL::to('/'), // Each of these methods may also be accessed via the URL facade, tambien url('/'), ruta base de laravel via helper
        ];

        return view('vistasLogin/formLoginUsuario', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // User::insert
        User::create([
            'first_name' => $request->nombresUser,
            'last_name' => $request->apellidosUser,
            'email' => $request->emailUser,
            'phone_number' => '',
            'password' => Hash::make($request->password),
            'idpais' => $request->paisUser,
            'sexo' => $request->sexoUser,
            'cargo_institucion' => $request->cargoUser,
        ])->assignRole('clientes');

        return response()->json(['estado' => 'Datos ingresados exitosamente',
            'redirect' => 'usuario/login',
        ]);
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

    public function verRegistroUsuario(): object
    {
        $arrayPaises = $this->paisAdd(['all']);
        $data = [
            'urlJs' => URL::to('/'), // Each of these methods may also be accessed via the URL facade, tambien url('/'), ruta base de laravel via helper
            'idPais' => $this->selectInputPaisCodeArea($arrayPaises, 'paisUser', 'Selección desplegable', 'id', 'nombre', '', 'form-select textBuscarSelect', 'style="width: 100%;"'),
            'sexo' => $this->selectInputGeneral($this->selectSexo(-1, 'Mostrar'), 'sexoUser', 'Selección desplegable', 'item', 'nombre', '', 'form-select'),
        ];

        return view('vistasLogin/formRegistroUsuario', $data);
    }
}
