<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{

    public function index()
    {
        $projets = Projet::all();
        return view('projets.index', compact('projets'));
    }

    public function create()
    {
        return view('projets.create');
    }

    public function store(Request $request)
    {
        $projet = new Projet();
        $projet->nom = $request->input('nom');
        $projet->description = $request->input('description');
        $projet->date_debut = $request->input('date_debut');
        $projet->date_fin = $request->input('date_fin');
        $projet->save();
        return redirect()->route('projets.index')->with('success', 'Projet créé avec succès.');
    }

    public function edit($id)
    {
        $projet = Projet::find($id);
        return view('projets.edit', compact('projet'));
    }

    public function update(Request $request, $id)
    {
        $projet = Projet::find($id);
        $projet->nom = $request->input('nom');
        $projet->description = $request->input('description');
        $projet->date_debut = $request->input('date_debut');
        $projet->date_fin = $request->input('date_fin');
        $projet->save();
        return redirect()->route('projets.index')->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $projet = Projet::find($id);
        $projet->delete();
        return redirect()->route('projets.index')->with('success', 'Projet supprimé avec succès.');
    }
}
