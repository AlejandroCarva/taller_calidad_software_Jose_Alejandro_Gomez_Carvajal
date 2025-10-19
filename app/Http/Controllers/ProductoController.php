<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductoController extends Controller
{
    public function index(): View
    {
        $productos = Producto::with('tipoProducto')
            ->orderBy('id_productos', 'desc')
            ->get();

        return view('productos.index', compact('productos'));
    }

    public function create(): View
    {
        $tipos = TipoProducto::orderBy('Nombre_Categoria')->get();
        return view('productos.create', compact('tipos'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'Nombre_Product' => 'required|string|max:30',
            'Descripcion' => 'nullable|string',
            'Stock_Product' => 'required|integer|min:0',
            'Codigo_Product' => 'required|string|max:25',
            'Valor_Product' => 'required|numeric|min:0',
            'imagen' => 'nullable|url',
            'Tipos_Productos_id_Tipos_Productos' => 'required|integer|exists:tipos_productos,id_Tipos_Productos',
        ]);

        Producto::create($data);
        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    public function show(Producto $producto): View
    {
        $producto->load('tipoProducto');
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto): View
    {
        $tipos = TipoProducto::orderBy('Nombre_Categoria')->get();
        return view('productos.edit', compact('producto', 'tipos'));
    }

    public function update(Request $request, Producto $producto): RedirectResponse
    {
        $data = $request->validate([
            'Nombre_Product' => 'required|string|max:30',
            'Descripcion' => 'nullable|string',
            'Stock_Product' => 'required|integer|min:0',
            'Codigo_Product' => 'required|string|max:25',
            'Valor_Product' => 'required|numeric|min:0',
            'imagen' => 'nullable|url',
            'Tipos_Productos_id_Tipos_Productos' => 'required|integer|exists:tipos_productos,id_Tipos_Productos',
        ]);

        $producto->update($data);
        return redirect()->route('productos.index')->with('success', 'Producto actualizado.');
    }

    public function destroy(Producto $producto): RedirectResponse
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado.');
    }
}
