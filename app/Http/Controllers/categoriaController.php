<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoria;

class categoriaController extends Controller
{
     public function __construct() {
        $this->middleware('auth')->except('index', 'show','home','get');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias =categoria::all();

        //return view ('categorias.index',compact('categorias'));
        return $categorias;
    }
     public function home()
    {
       
       
        $categorias = categoria::all();

        if (Request()->user() != null && Request()->user()->hasRole('admin'))
        {
            return view ('categorias.indexAdmin',compact('categorias'));
        } 
        
        return view ('categorias.index',compact('categorias'));  
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Request()->user()->authorizeRoles('admin'); 
        return view ('categorias.create');
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
        categoria::create(['name'=>$request->name, 'descripcion' => $request->descripcion, 'imagen'=>$imagenNombre]);

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
        $categoria = categoria::find($id);
        return $categoria;
        //return view ('categorias.show',compact('categoria'));
    }
    public function get($id)
    {
        $categoria = categoria::find($id);
        return view ('categorias.show',compact('categoria'));
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
        $categoria = categoria::find($id);
        
        return view('categorias.edit', compact('categoria','id'));
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
        $categoria = categoria::find($id);

        $nombre=$request->name;
        $imagenNombre='/images/'.$nombre.'.'.$request->imagen->getClientOriginalExtension();
        $imagen= request()->file('imagen');
        
        $nombreImagen = $nombre.'.'.$request->imagen->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $imagen->move($destinationPath, $nombreImagen);
        $categoria->create(['name'=>$request->name, 'descripcion' => $request->descripcion, 'imagen'=>$imagenNombre]);

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
        $categoria=categoria::find($id);
        $productos =$categoria->productos()->get();
        foreach ($productos as $prod) {
            $prod->delete();
        }

        $categoria->delete();
        
        return redirect('/categorias/show');
    }
}
