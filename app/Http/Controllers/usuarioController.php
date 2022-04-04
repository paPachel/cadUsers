<?php

namespace App\Http\Controllers;

use App\Models\usuario; 
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return usuario::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'senha' => 'required'
        ]);
        return usuario::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return usuario::findOrFail($id);
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
        $usuario = usuario::findOrFail($id); 
        
        $request->validate([
            'email' => 'required',
            'senha' => 'required'
        ]);
        
        $usuario->update($request->all());

        return $usuario;   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return usuario::destroy($id);
    }

    public function buscar($email)
    {                                                                   
        return usuario::where('email', 'like', '%'.$email.'%')->get();
    }                                                                                                                                                                            
}
