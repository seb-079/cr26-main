<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EpreuveModel;
use App\Models\ConcoursModel;

class EpreuveController extends Controller
{
    public function index()
    {
        $epreuves = EpreuveModel::getAll();
        return view('pages.epreuves.index', compact('epreuves'));
    }

    public function create()
    {
        $concours = ConcoursModel::getAll();
        return view('pages.epreuves.create', compact('concours'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'id_concours' => 'required|integer|exists:concours,id',
            'score_max' => 'required|numeric|min:0',
        ]);

        EpreuveModel::createEpreuve($request->all());
        return redirect()->route('epreuves.index')->with('success', 'Épreuve créée.');
    }

    public function edit($id)
    {
        $epreuve = EpreuveModel::getById($id);
        $concours = ConcoursModel::getAll();
        return view('pages.epreuves.edit', compact('epreuve', 'concours'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'id_concours' => 'required|integer|exists:concours,id',
            'score_max' => 'required|numeric|min:0',
        ]);

        EpreuveModel::updateEpreuve($id, $request->all());
        return redirect()->route('epreuves.index')->with('success', 'Épreuve mise à jour.');
    }

    public function destroy($id)
    {
        EpreuveModel::deleteEpreuve($id);
        return back()->with('success', 'Épreuve supprimée.');
    }
}
