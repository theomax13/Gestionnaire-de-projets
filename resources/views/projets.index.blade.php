@extends('layouts.app') <!-- Assurez-vous d'avoir une mise en page de base, par exemple, 'layouts.app', configurée dans votre application. -->

@section('content')
    <div class="container">
        <h1>Liste des Projets</h1>
        
        <!-- Bouton pour créer un nouveau projet -->
        <a href="{{ route('projets.create') }}" class="btn btn-primary">Créer un Nouveau Projet</a>

        @if (count($projets) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom du Projet</th>
                        <th>Date de Début</th>
                        <th>Date de Fin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projets as $projet)
                        <tr>
                            <td>{{ $projet->nom }}</td>
                            <td>{{ $projet->date_debut }}</td>
                            <td>{{ $projet->date_fin }}</td>
                            <td>
                                <!-- Boutons d'édition et de suppression -->
                                <a href="{{ route('projets.edit', ['projet' => $projet->id]) }}" class="btn btn-sm btn-info">Éditer</a>
                                
                                <form action="{{ route('projets.destroy', ['projet' => $projet->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Aucun projet n'a été créé pour le moment.</p>
        @endif
    </div>
@endsection
