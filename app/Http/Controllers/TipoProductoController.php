<?php
namespace App\Http\Controllers;

use App\Models\TipoProducto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TipoProductoController extends Controller
{
    public function index(): View
    {
        $tipos = TipoProducto::orderBy('id_Tipos_Productos', 'desc')->get();
        return view('tipos_productos.index', compact('tipos'));
    }

    public function create(): View
    {
        return view('tipos_productos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'Nombre_Categoria' => 'required|string|max:35',
            'Descripcion' => 'nullable|string|max:45',
        ]);

        TipoProducto::create($data);
        return redirect()->route('tipos_productos.index')->with('success', 'Tipo de producto creado correctamente.');
    }

    public function show(TipoProducto $tipos_producto): View
    {
        $tipo = $tipos_producto->load('productos');
        return view('tipos_productos.show', compact('tipo'));
    }

    public function edit(TipoProducto $tipos_producto): View
    {
        $tipo = $tipos_producto;
        return view('tipos_productos.edit', compact('tipo'));
    }

    public function update(Request $request, TipoProducto $tipos_producto): RedirectResponse
    {
        $data = $request->validate([
            'Nombre_Categoria' => 'required|string|max:35',
            'Descripcion' => 'nullable|string|max:45',
        ]);

        $tipos_producto->update($data);
        return redirect()->route('tipos_productos.index')->with('success', 'Tipo de producto actualizado.');
    }

    public function destroy(TipoProducto $tipos_producto): RedirectResponse
    {
        if ($tipos_producto->productos()->exists()) {
            return back()->withErrors('No puedes eliminar un tipo que tiene productos asociados.');
        }
        $tipos_producto->delete();
        return redirect()->route('tipos_productos.index')->with('success', 'Tipo de producto eliminado.');
    }
}
