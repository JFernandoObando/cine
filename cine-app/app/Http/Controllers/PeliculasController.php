<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Categoria;

class PeliculasController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'nombre'=>'required|min:3'
        ]);
        $pelicula= new Pelicula;
        $pelicula->nombre=$request->nombre;
        $pelicula->categoria_id=$request->categoria_id;
        $pelicula->save();
        //return response()->json(['message' => 'Pelicula ingresada'], 200);
        return redirect('/pelicula')->with('success', 'Pelicula ingresada exitosamente');
      //   return redirect()->route('pelicula')->with('success','Pelicula ingresada');
    }

    public function index(){
        $pelicula=Pelicula::all();
        $categories=Categoria::all();
       // return response()->json(['pelicula' => $pelicula,'categoria'=>$categories], 200);
        return view('peliculas.index',['pelicula'=>$pelicula,'categoria'=>$categories]);
    }

    public function destroy($id){
        $pelicula=Pelicula::find($id);
        $pelicula->delete();
        return redirect('/pelicula')->with('success', 'Pelicula eliminada');
        //return response()->json(['message' => 'Pelicula eliminada'], 200);
    }

    public function update(Request $request,$id){
        $pelicula=Pelicula::find($id);
        $pelicula->nombre=$request->nombre;
        $pelicula->save();
        return redirect('/pelicula')->with('success', 'Pelicula actualizada');
      //  return response()->json(['message' => 'Pelicula actualizada'], 200);
    }


    public function show($id){
        $pelicula=Pelicula::find($id);
        return view('peliculas.show',['pelicula'=>$pelicula]);
       // return response()->json(['pelicula' => $pelicula], 200);
    }


}
