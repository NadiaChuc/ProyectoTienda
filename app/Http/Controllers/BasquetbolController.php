<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class BasquetbolController extends Controller
{
    public function index(Request $request)
    {
        
        $categoria = $request->input('categoria', 'ropa');
    
        $productos = Producto::where('deporte', 'basquetbol')
                            ->where('categoria', $categoria)
                            ->paginate(4)
                            ->appends(['categoria' => $categoria]);
    
        switch ($categoria) {
            case 'ropa':
                return view('vistas.basquetbol.ropa', compact('productos'));
            case 'equipamiento':
                return view('vistas.basquetbol.equipamiento', compact('productos'));
            case 'accesorios':
                return view('vistas.basquetbol.accesorios', compact('productos'));
            default:
                
                return redirect()->route('basquetbol.index', ['categoria' => 'ropa']);
        }
    }
        
     /*   public function create (){
            return view ('plan.create');;
        }
    */
    
    /*    public function store (Request $request){
            $futbol =new Producto();
            $futbol->title=$request->title;
            $futbol->category=$request->category;
            $futbol->content=$request->content;
    
            $futbol->save();
    
            return redirect('/cursos');
        }
    */
    
        public function show(Request $request, $basquetbol)
        {   
        $producto = Producto::find($basquetbol);
        
        if (!$producto) {
            return redirect()->route('basquetbol.index')->with('error', 'Producto no encontrado.');
        }
        $rutaImagen = 'images/basquetbol/' . $producto->categoria . '/' . $producto->image;
        // Mostrar los detalles del producto en la vista 'showfutbol'
        return view('vistas.show', compact('producto'));
        }  
    
    
       /* public function edit ($futbol){
            $futbol = Producto::find($futbol);
            return view ('plan.edit', compact('curso'));
        }
        public function update (Request $request, $futbol){
    
            $futbol = Producto::find($futbol);
            $futbol->title=$request->title;
            $futbol->category=$request->category;
            $futbol->content=$request->content;
    
            $futbol->save();
    
            return redirect ("/cursos/{$futbol->id}");
        }
    
        public function destroy ($futbol){
    
            $futbol = Producto::find($futbol);
            $futbol->delete();
            return redirect ("/cursos");
        }*/
}
