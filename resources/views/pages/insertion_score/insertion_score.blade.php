@extends('layouts.app') {{-- Ou le layout que tu utilises --}}

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Insertion d'un score</h1>
    
                {{-- Nom du concours --}}
        <div>
            <label for="nom_concours" class="block font-semibold mb-1">Concours</label>
            <input type="text" id="nom_concours" class="border p-2 w-full rounded bg-gray-100" value="{{ $concours->nom }}" disabled>
        </div>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Messages d'erreur --}}
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('insertion_score.save') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Sélection de l'équipe --}}
        <div>
            <label for="id_equipe" class="block font-semibold mb-1">Équipe</label>
            <input list="equipes" name="id_equipe" id="id_equipe" class="border p-2 w-full rounded" placeholder="Tapez pour rechercher">
            <datalist id="equipes">
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}">{{ $equipe->code }} {{ $equipe->nom }}</option>
                @endforeach
            </datalist>
        </div>

        {{-- Sélection de l'épreuve --}}
        <div>
            <label for="id_epreuve" class="block font-semibold mb-1">Épreuve</label>
            <input list="epreuves" name="id_epreuve" id="id_epreuve" class="border p-2 w-full rounded" placeholder="Tapez pour rechercher">
            <datalist id="epreuves">
                @foreach($epreuves as $epreuve)
                    <option value="{{ $epreuve->id }}">{{ $epreuve->code }} {{ $epreuve->nom }}</option>
                @endforeach
            </datalist>
        </div>

        {{-- Score --}}
        <div>
            <label for="score" class="block font-semibold mb-1">Score</label>
            <input type="number" name="score" id="score" class="border p-2 w-full rounded" step="0.1" min="0" required>
        </div>

        {{-- Commentaire --}}
        <div>
            <label for="commentaire" class="block font-semibold mb-1">Commentaire</label>
            <textarea name="commentaire" id="commentaire" rows="3" class="border p-2 w-full rounded"></textarea>
        </div>



        {{-- Bouton annuler --}}
        <div class="flex space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Enregistrer le score
            </button>
            <button type="button" onclick="document.querySelector('form').reset()" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                Annuler
            </button>
        </div>
    </form>
</div>
@endsection
