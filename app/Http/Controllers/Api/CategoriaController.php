<?php

namespace App\Http\Controllers\Api;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class CategoriaController extends Controller
{
    public function index()
    {
        try {
            $categorias = Categoria::all();

            return response()->json([
                'success' => true,
                'data' => $categorias
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al listar categorías',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:150',
            ]);

            $categoria = Categoria::create([
                'id' => (string) Str::uuid(),
                'nombre' => $request->nombre,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Categoría creada correctamente',
                'data' => $categoria
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear categoría',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $categoria = Categoria::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $categoria
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Categoría no encontrada',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:150',
            ]);

            $categoria = Categoria::findOrFail($id);

            $categoria->update([
                'nombre' => $request->nombre,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Categoría actualizada',
                'data' => $categoria
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar categoría',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();

            return response()->json([
                'success' => true,
                'message' => 'Categoría eliminada'
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar categoría',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}