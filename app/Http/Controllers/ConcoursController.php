<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConcoursModel;

class ConcoursController extends Controller
{
    public function index()
    {
        $concours = ConcoursModel::getAll();
        return view('pages.concours.index', compact('concours'));
    }

    public function create()
    {
        return view('pages.concours.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'actif' => 'required|boolean',
        ]);

        ConcoursModel::createConcours($request->all());
        return redirect()->route('concours.index')->with('success', 'Concours créé avec succès.');
    }

    public function edit($id)
    {
        $concours = ConcoursModel::getById($id);
        return view('pages.concours.edit', compact('concours'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'actif' => 'required|boolean',
        ]);

        ConcoursModel::updateConcours($id, $request->all());
        return redirect()->route('concours.index')->with('success', 'Concours mis à jour.');
    }

    public function destroy($id)
    {
        ConcoursModel::deleteConcours($id);
        return back()->with('success', 'Concours supprimé.');
    }
}
