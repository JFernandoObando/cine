<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria=Categoria::all();
        return response()->json(['categoria' => $categoria], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      
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
            'nombre'=>'required|min:3'
        ]);
        $categoria= new Categoria;
        $categoria->nombre=$request->nombre;
        $categoria->save();
        return response()->json(['message' => 'Categoria ingresada'], 200);
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
        $categoria=Categoria::find($id);
        return response()->json(['categoria' => $categoria], 200);
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
        $categoria=Categoria::find($id);
        $categoria->nombre=$request->nombre;
        $categoria->save();
        return response()->json(['message' => 'Categoria actualizada'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria=Categoria::find($id);
        $categoria->peliculas()->each(function($pelicula){
            $pelicula->delete();
        });
        $categoria->delete();
        return response()->json(['message' => 'Categoria eliminada'], 200);
    }
}
