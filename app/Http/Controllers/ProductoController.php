<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('producto.catalogo', compact('productos'));
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        return view('producto.show', compact('producto'));
    }
}
