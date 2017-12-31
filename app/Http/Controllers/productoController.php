<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\producto;
use View;
class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = producto::all();
        
           // return view ('productos.index',compact('productos'));
        return $productos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = \App\categoria::all();

        return view ('productos.create',compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $nombre=$request->name;
        $imagenNombre='images/'.$nombre.'.'.$request->imagen->getClientOriginalExtension();
        $imagen= request()->file('imagen');
        
        $nombreImagen = $nombre.'.'.$request->imagen->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $imagen->move($destinationPath, $nombreImagen);
        producto::create(['name'=>$request->name, 'descripcion' => $request->descripcion, 'categoria_id' => $request->categoria_id, 'precio'=> $request->precio,'imagen'=>$imagenNombre]);

        return redirect('/');
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
