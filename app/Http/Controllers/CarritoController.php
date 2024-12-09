<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrito;
use App\Models\CarritoProducto;
use App\Models\Producto;


class CarritoController extends Controller
{
    /**
     * Método para agregar un producto al carrito.
     */
    public function store(Request $request)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('logout')->with('error', 'Necesitas iniciar sesión para agregar productos al carrito.');
        }

        // Validación de los datos del formulario
        $request->validate([
            'producto_id' => 'required|exists:productos,id', // El producto debe existir en la base de datos
            'cantidad' => 'required|integer|min:1', // La cantidad debe ser un número entero mayor o igual a 1
        ]);

        // Obtener el carrito del usuario autenticado (o crear uno si no existe)
        $carrito = Carrito::firstOrCreate(['user_id' => Auth::id()]);

        // Obtener el producto que se desea agregar al carrito
        $producto = Producto::findOrFail($request->producto_id);

        // Verificar si el producto ya existe en el carrito del usuario
        $carritoProducto = CarritoProducto::where('carrito_id', $carrito->id)
                                          ->where('producto_id', $producto->id)
                                          ->first();

        if ($carritoProducto) {
            // Si el producto ya está en el carrito, actualizamos la cantidad
            $carritoProducto->cantidad += $request->cantidad;
            $carritoProducto->save();
        } else {
            // Si el producto no está en el carrito, lo agregamos
            CarritoProducto::create([
                'carrito_id' => $carrito->id,
                'producto_id' => $producto->id,
                'cantidad' => $request->cantidad,
            ]);
        }

        // Redirigir con un mensaje de éxito
       return redirect()->route('futbol.show', ['futbol' => $producto->id])->with('mensaje', 'Producto agregado al carrito.');

    }

    /**
     * Mostrar el contenido del carrito.
     */
    public function index()
    {
        // Obtener el carrito del usuario autenticado
        $carrito = Carrito::where('user_id', Auth::id())->first();

        if ($carrito) {
            // Obtener los productos del carrito
            $productos = $carrito->carritoProductos()->with('producto')->get();
        } else {
            // Si no hay carrito, se devuelve un array vacío
            $productos = [];
        }

        // Retornar la vista con los productos del carrito
        return view('vistas.carrito', compact('productos'));
    }


    public function update(Request $request, $carritoProductoId)
    {
        // Validar la nueva cantidad
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        // Buscar el carrito_producto con el ID
        $carritoProducto = CarritoProducto::findOrFail($carritoProductoId);

        // Verificar si el carrito pertenece al usuario autenticado
        if ($carritoProducto->carrito->user_id !== Auth::id()) {
            return redirect()->route('carrito.index')->with('error', 'No puedes modificar productos en otro carrito.');
        }

        // Actualizar la cantidad
        $carritoProducto->cantidad = $request->cantidad;
        $carritoProducto->save();

        return redirect()->route('carrito.index')->with('mensaje', 'Cantidad actualizada correctamente.');
    }

    public function destroy($carritoProductoId)
    {
        // Buscar el carrito_producto con el ID
        $carritoProducto = CarritoProducto::findOrFail($carritoProductoId);

        // Verificar si el carrito pertenece al usuario autenticado
        if ($carritoProducto->carrito->user_id !== Auth::id()) {
            return redirect()->route('carrito.index')->with('error', 'No puedes eliminar productos de otro carrito.');
        }

        // Eliminar el producto del carrito
        $carritoProducto->delete();

        return redirect()->route('carrito.index')->with('mensaje', 'Producto eliminado del carrito.');
    }
}
