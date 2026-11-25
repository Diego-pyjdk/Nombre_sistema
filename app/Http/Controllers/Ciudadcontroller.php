<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;
use App\Http\Requests\CiudadRequest;


class Ciudadcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      $texto = $request->input('texto');
      $registro = Ciudad::where('Nombre_Ciudad', 'LIKE', '%'.$texto.'%')->paginate(5);
      return view('ciudad.index', compact('registro', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $maximoID = Ciudad::max('id_Ciudades') ??  0;
        $maximoID = $maximoID + 1;
        return view('ciudad.operacion', compact('maximoID'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CiudadRequest $request)
    {
        $datos = new Ciudad();
        $datos->id_Ciudades = $request->input('id_Ciudades');
        $datos->Nombre_Ciudad = $request->input('Nombre_Ciudad');
        $datos->Departamento = $request->input('Departamento');
        $datos->save();
        return redirect('lista')->with('mensaje', 'Registro ' . $datos->Nombre_Ciudad . ' almacenado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ciudad $ciudad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ciudad)
    {
        $datosciudad = Ciudad::findOrFail($ciudad);
        return view('ciudad.operacion', compact('datosciudad'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $ciudad)
    {
        $datos = Ciudad::findOrFail($ciudad);
        $datos->Nombre_Ciudad = $request->input('Nombre_Ciudad');
        $datos->Departamento = $request->input('Departamento');
        $datos->save();
        return redirect('lista')->with('mensaje', 'Registro ' . $datos->Nombre_Ciudad . ' actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $ciudad)
    {
        $datos = Ciudad::findOrFail($ciudad);
        $datos->delete();
        return redirect('lista')->with('mensaje', 'Registro ' . $datos->Nombre_Ciudad . ' eliminado correctamente');
    
    }
}
