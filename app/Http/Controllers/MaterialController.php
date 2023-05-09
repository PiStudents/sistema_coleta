<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $materiais = Material::latest()->paginate(5);
        $user = $request->user();

        if ($user->can('admin')) {
            return view('materials.index', compact('materiais'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Material::create($request->all());

        return redirect()->route('materiais.index')->with('Sucesso', 'Material cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $material = Material::find($id);
        return view('materials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $material = Material::find($id);
        return view('materials.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $material = Material::find($id);
        $material->name = $request->input('name');
        $material->description = $request->input('description');

        $material->save();

        return redirect()->route('materiais.index')->with('Sucesso', 'Material atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $material = Material::find($id);
        $material->delete();

        return redirect()->route('materiais.index')->with('Sucesso', 'Material deletado com sucesso');
    }
}
