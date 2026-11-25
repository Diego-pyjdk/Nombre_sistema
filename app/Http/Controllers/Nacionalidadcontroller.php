<?php

namespace App\Http\Controllers;

use App\Models\Nacionalidad;
use Illuminate\Http\Request;
use App\Http\Requests\NacionalidadRequest;

class Nacionalidadcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $texto = $request->input('texto');
      $registro = Nacionalidad::where('Descripcion', 'LIKE', '%'.$texto.'%')->paginate(5);
      return view('nacionalidad.index', compact('registro', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $maximoID = Nacionalidad::max('id_Nacionalidades') ??  0;
        $maximoID = $maximoID + 1;
        return view('nacionalidad.form', compact('maximoID'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NacionalidadRequest $request)
    {
        $datos = new Nacionalidad();
        $datos->id_Nacionalidades = $request->input('id_Nacionalidades');
        $datos->Descripcion = $request->input('Descripcion');
        $datos->save();
        return redirect('lista-nacionalidades')->with('mensaje', 'Registro ' . $datos->Descripcion . ' almacenado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nacionalidad $nacionalidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nacionalidad)
    {
        $datosnacionalidad = Nacionalidad::findOrFail($nacionalidad);
        return view('nacionalidad.form', compact('datosnacionalidad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nacionalidad)
    {
        $datos = Nacionalidad::findOrFail($nacionalidad);
        $datos->Descripcion = $request->input('Descripcion');
        $datos->save();
        return redirect('lista-nacionalidades')->with('mensaje', 'Registro ' . $datos->Descripcion . ' actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $nacionalidad)
    {
      $datos = Nacionalidad::findOrFail($nacionalidad);
        $datos->delete();
        return redirect('lista-nacionalidades')->with('mensaje', 'Registro ' . $datos->Descripcion . ' eliminado correctamente');
      
    }
}
