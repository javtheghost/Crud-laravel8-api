<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedore;
use Illuminate\Http\Request;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }
    
    public function indexla()
    {
      $productosapi=Producto::all();
      return response()->json($productosapi);

    }


    public function guardar(Request $request)
    {
      
        $datosproducto =new Producto;
        $datosproducto->categoria_id=$request->categoria_id;
        $datosproducto->proveedor_id=$request->proveedor_id;
        $datosproducto->nombre=$request->nombre;
        $datosproducto->descripcion=$request->descripcion;
        $datosproducto->precio=$request->precio;
        $datosproducto->save();
        return response()->json($request);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $categorias= Categoria::pluck('nombre','id');
        $proveedores= Proveedore::pluck('nombre','id');
        return view('producto.create', compact('producto','categorias','proveedores'));
    }
  


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Producto::$rules);

        $producto = Producto::create($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias= Categoria::pluck('nombre','id');
        $proveedores= Proveedore::pluck('nombre','id');
        return view('producto.edit', compact('producto','categorias','proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);

        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }

    public function borrar($id)
    {

   $producto = Producto::find($id);
   if ($producto)
   {
    $producto->delete();
    return response()->json(['message'=>'Producto Eliminado Correctamente'],200);


   }
   else
   {
    return response()->json(['message'=>'Algo salio mal'],404);

   }
   
    }


   public function mirar(Producto $producto){
    return response()->json([
     'res' => true,
     'producto' => $producto

    ]);
    

   }


    public function actualizar(Request $request, $id)
    {

   $producto = Producto::findOrFail($id)
   ->update($request->all());
   return \response($producto);   
    }
}