<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryApi()
    {
        $productos = Producto::whereHas('categoria', function ($query) {
            $query->where('nombre', 'Limpieza de Hogar');
        })->get()->map(function ($producto) {
            $producto->foto = url('imagen/' . $producto->foto);
            return $producto;
        });

        return response()->json([
            'success' => true,
            'productos' => $productos,
        ]);
    }
}
