<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        return view('agregarFondos');
    }

    public function nuevo_saldo(Request $request)
    {
        $validateData = $request->validate([
            'monto' => 'required|numeric|min:1'
        ]);
        $user = Auth::user();
        $nuevo_saldo = $user->fondo_usuario + $request->monto;
        User::where('id', $user->id)->update(['fondo_usuario' => $nuevo_saldo]);
        return redirect('/anadir/fondo');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {
        echo $email;
        /*
        $usuario = User::find($email);
        $fondo_actual = $usuario->fondo_usuario + $request->monto;
        User::where('email', $email)->update(['fondo_usuario' => $fondo_actual]);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
        return $email;
        //Users::where('email', $email)->delete();
    }
}
