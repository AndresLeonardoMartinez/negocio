<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\producto;
use Illuminate\Support\Facades\Auth;
use View;
use Yajra\Datatables\Datatables;
class productoController extends Controller
{
    
    
     public function __construct() {
        $this->middleware('auth')->except('home','index','getProductos','getByCategoria');
         
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

        if (Request()->user() != null && Request()->user()->hasRole('admin'))
        {
            return view ('productos.indexAdmin',compact('productos'));
        } 
        return view ('productos.index');  
        
        
    }
    public function getProductos()
    {
        $productos = producto::select(['categoria_id','imagen', 'name','precio','descripcion','stock']);
        
        return Datatables::of($productos)
 
            ->make(true);
        
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
        $producto = new producto;

        $nombre=$request->name;
        $imagenNombre='/images/'.$nombre.'.'.$request->imagen->getClientOriginalExtension();
        $imagen= request()->file('imagen');
        
        $nombreImagen = $nombre.'.'.$request->imagen->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $imagen->move($destinationPath, $nombreImagen);
        
        $producto->name=$request->name;
        $producto->descripcion=$request->descripcion;
        $producto->stock=$request->stock;
        $producto->nuevo=true;
        $producto->imagen=$imagenNombre;
        $producto->categoria_id=$request->categoria_id;
        $producto->precio=$request->precio;


        $producto->save();

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
        
        $nuevo=false;
        if ($request['nuevo'] == "on") {
           $nuevo = true;
        }
        $nombreImagen = $nombre.'.'.$request->imagen->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $imagen->move($destinationPath, $nombreImagen);
        $producto->update(['name'=>$request->name, 'descripcion' => $request->descripcion, 'categoria_id' => $request->categoria_id, 'precio'=> $request->precio,'imagen'=>$imagenNombre,'stock'=> $request->stock,'nuevo'=>$nuevo]);

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
