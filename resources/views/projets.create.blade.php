@extends('layouts.app') <!-- Utilisez la mise en page de base, par exemple, 'layouts.app'. -->

@section('content')
    <div class="container">
        <h1>Créer un Nouveau Projet</h1>

        <!-- Formulaire de création -->
        <form method="POST" action="{{ route('projets.store') }}">
            @csrf <!-- Protection CSRF -->
            <div class="form-group">
                <label for="nom">Nom du Projet</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du projet">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Description du projet"></textarea>
            </div>
            <div class="form-group">
                <label for="date_debut">Date de Début</label>
                <input type="date" class="form-control" id="date_debut" name="date_debut">
            </div>
            <div class="form-group">
                <label for="date_fin">Date de Fin</label>
                <input type="date" class="form-control" id="date_fin" name="date_fin">
            </div>
            <button type="submit" class="btn btn-primary">Créer le Projet</button>
        </form>
    </div>
@endsection
