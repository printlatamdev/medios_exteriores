<?php

namespace App\Http\Controllers;

use App\Models\User;
// PARA LA RUTA BASE
use Illuminate\Http\Request;
// LIBRERIAS SPATIE

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function __construct()
    {
        // NOTA: da problema al agregar aqui $this->middleware('auth'); porque form login estan configurado en este controlador
        // y no necesita login porque redirecciona a el mismo muchas veces si lo dejo aqui, hay que sacarlo
        // REDIRECCIONA A LOGIN SI A EXPITRADO LA SESION, HACE REFERENCIA AL  'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class, EN kernel.php
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();

        $arrayPaises = $this->paisAdd(['all']);
        $data = [
            'urlJs' => URL::to('/'), // Each of these methods may also be accessed via the URL facade, tambien 'url' => url('/'), ruta base de laravel via helper
            'firstName' => $user->first_name,
            'lastName' => $user->last_name,
            'email' => $user->email,
            'phoneNumber' => $user->phone_number,
            'idPais' => $this->selectInputPaisCodeArea($arrayPaises, 'paisUser', 'Selección desplegable', 'id', 'nombre', is_null($user->idpais) ? '' : $user->idpais, 'form-control textBuscarSelect', 'style="width: 100%;"'),
            'sexo' => $this->selectInputGeneral($this->selectSexo(-1, 'Mostrar'), 'sexoUser', 'Selección desplegable', 'item', 'nombre', is_null($user->sexo) ? '' : $user->sexo, 'form-select'),
            'cargoInstitucion' => $user->cargo_institucion,

            'nameRole' => $user->roles[0]['name'],
        ];

        return view('vistasLogin/formPerfilUsuario', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();//arrayY
        // User::create($input);
        // return response()->json([
        //     'accion'=> 'Datos Guardados con exito',
        //     'otros' => '',
        // ]);

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
        $directorio = User::where('id', '=', $id)
                                 //->orwhere('BirthDate','=',$request->txtBuscar)
            ->get();

        return response()->json([
            'accion' => 'Datos encontrados ',
            'otros' => '',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPost(Request $request)
    {
        // $input = $request->all();//arrayY
        $input = $request->only('email', 'password'); //arrayY
        // $user = User::where('email','=',$input['email'])
        //                   ->where('password','=', Hash::make($input['password']))
        //                   //->orwhere('BirthDate','=',$request->txtBuscar)
        //                   // ->get();
        //                   ->first();
        $linkAcceso = '';
        $nombrePersona = 'No cuentas con las credenciales adecuadas ';
        $status = 404;
        if (Auth::attempt($input)) { // 'Login exitoso';
            // echo 'Verifica contraseña:'.Hash::check($input['password'], $request->user()->password);
            request()->session()->regenerate(); //regenera el token inicial del usuario por seguridad
            $user = json_decode(''.Auth::user().'', true);
            $linkAcceso = '/dashboard';
            $nombrePersona = 'Bienvenida/o '.$user['first_name'];
            $status = 200;
        }

        return response()->json([
            'estado' => $nombrePersona,
            'acceso' => $linkAcceso,
        ], $status);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // ECHO 'lLEGA OK';

        $user = Auth::user();
        $uEmail = ($request->emailUser === $user->email) ? $user->email : $request->emailUser;
        $uPassword = Hash::make($request->password);

        if (empty($request->password)) {
            //verifica si el password esta vacia

            User::where('id', $user->id)
                ->update([
                    'first_name' => $request->nombresUser,
                    'last_name' => $request->apellidosUser,
                    'email' => $uEmail,
                    'phone_number' => '',
                    'idpais' => $request->paisUser,
                    'sexo' => $request->sexoUser,
                    'cargo_institucion' => $request->cargoUser,
                ]);
            $user->first_name = $request->nombresUser;
            $user->last_name = $request->apellidosUser;
            $user->email = $uEmail;
            $user->idpais = $request->paisUser;
            $user->sexo = $request->sexoUser;
            $user->cargo_institucion = $request->cargoUser;
            $acciones = [
                'estado' => 'Registro actualizados correctamente',
            ];
            $status = 200;

        } else {
            //el password no esta vacia
            if (Hash::check($request->login, $user->password)) {//verifica si la contraseña actual es igual a la clave del usuario en session
                // password igual
                User::where('id', $user->id)
                    ->update([
                        'first_name' => $request->nombresUser,
                        'last_name' => $request->apellidosUser,
                        'email' => $uEmail,
                        'phone_number' => '',
                        'password' => $uPassword,
                        'idpais' => $request->paisUser,
                        'sexo' => $request->sexoUser,
                        'cargo_institucion' => $request->cargoUser,
                    ]);
                $user->first_name = $request->nombresUser;
                $user->last_name = $request->apellidosUser;
                $user->email = $uEmail;
                $user->password = $uPassword;
                $user->idpais = $request->paisUser;
                $user->sexo = $request->sexoUser;
                $user->cargo_institucion = $request->cargoUser;
                $acciones = [
                    'estado' => 'Registro actualizados correctamente',
                ];
                $status = 200;

            } else {
                $acciones = [
                    'estado' => 'Su contraseña no es validad',
                ];
                $status = 400;
            }

        }

        return response()->json($acciones, $status);
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

    // public function login(){
    //     $data = array(
    //         'urlJs' => URL::to('/'), // Each of these methods may also be accessed via the URL facade, tambien url('/'), ruta base de laravel via helper
    //     );
    //     return view('vistasLogin/formLoginUsuario', $data);
    // }
}
