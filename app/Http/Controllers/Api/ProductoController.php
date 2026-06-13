<?php

namespace App\Http\Controllers\Api;

use App\Models\Producto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class ProductoController extends Controller
{
    public function index()
    {
        try {
            $productos = Producto::with('categoria')->get();

            return response()->json([
                'success' => true,
                'data' => $productos
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al listar productos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:50',
                'description' => 'required|string|max:250',
                'price' => 'required|numeric',
                'stock' => 'required|integer',
                'categoria_id' => 'required|exists:categorias,id',
            ]);

            $producto = Producto::create([
                'id' => (string) Str::uuid(),
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'estado' => 1,
                'categoria_id' => $request->categoria_id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Producto creado correctamente',
                'data' => $producto
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear producto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $producto = Producto::with('categoria')->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $producto
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Producto no encontrado',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:50',
                'description' => 'required|string|max:250',
                'price' => 'required|numeric',
                'stock' => 'required|integer',
                'categoria_id' => 'required|exists:categorias,id',
            ]);

            $producto = Producto::findOrFail($id);

            $producto->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'categoria_id' => $request->categoria_id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Producto actualizado',
                'data' => $producto
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar producto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $producto = Producto::findOrFail($id);
            $producto->delete();

            return response()->json([
                'success' => true,
                'message' => 'Producto eliminado'
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar producto',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}