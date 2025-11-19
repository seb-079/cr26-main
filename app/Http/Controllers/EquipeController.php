<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EquipeModel;
use App\Models\ConcoursModel;

class EquipeController extends Controller
{
    public function index()
    {
        $equipes = EquipeModel::getAll();
        return view('pages.equipes.index', compact('equipes'));
    }

    public function create()
    {
        $concours = ConcoursModel::getAll();
        return view('pages.equipes.create', compact('concours'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'id_concours' => 'required|integer|exists:concours,id',
        ]);

        EquipeModel::createEquipe($request->all());
        return redirect()->route('equipes.index')->with('success', 'Équipe créée.');
    }

    public function edit($id)
    {
        $equipe = EquipeModel::getById($id);
        $concours = ConcoursModel::getAll();
        return view('pages.equipes.edit', compact('equipe', 'concours'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'id_concours' => 'required|integer|exists:concours,id',
        ]);

        EquipeModel::updateEquipe($id, $request->all());
        return redirect()->route('equipes.index')->with('success', 'Équipe mise à jour.');
    }

    public function destroy($id)
    {
        EquipeModel::deleteEquipe($id);
        return back()->with('success', 'Équipe supprimée.');
    }
}
