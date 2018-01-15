<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\producto;
use View;
class productoController extends Controller
{
    
     public function __construct() {
        $this->middleware('auth')->except('index');
    }
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
    public function home()
    {
        
        $productos = producto::all();
        if (Request()->user()->authorizeRoles('admin'))
        {
            return view ('productos.indexAdmin',compact('productos'));
        } 
        else
        {
            return view ('productos.index',compact('productos'));  
        }
        
        return $productos;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Request()->user()->authorizeRoles('admin'); 
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
        Request()->user()->authorizeRoles('admin'); 
        $nombre=$request->name;
        $imagenNombre='/images/'.$nombre.'.'.$request->imagen->getClientOriginalExtension();
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
        Request()->user()->authorizeRoles('admin');
        $producto = producto::find($id);

        return view ('productos.show',compact('producto'));


    }

    public function getByCategoria($cat)
    {
        return producto::where('categoria_id', $cat)->get();

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Request()->user()->authorizeRoles('admin'); 
        $producto= producto::find($id);
        $categoria = \App\categoria::all();
        
        return view('productos.edit', compact('producto','id','categoria'));
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
       Request()->user()->authorizeRoles('admin'); 
        $producto= producto::find($id);

        $nombre=$request->name;
        $imagenNombre='/images/'.$nombre.'.'.$request->imagen->getClientOriginalExtension();
        $imagen= request()->file('imagen');
        
        $nombreImagen = $nombre.'.'.$request->imagen->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $imagen->move($destinationPath, $nombreImagen);
        $producto->update(['name'=>$request->name, 'descripcion' => $request->descripcion, 'categoria_id' => $request->categoria_id, 'precio'=> $request->precio,'imagen'=>$imagenNombre]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Request()->user()->authorizeRoles('admin'); 
        $producto=producto::find($id);
        $producto->delete();

        // redirect
        
        return redirect('/');
    }
}
