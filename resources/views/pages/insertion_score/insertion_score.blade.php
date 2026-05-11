@extends('layouts.form_base')
@section('title', 'Saisie des Scores')
@section('form_title', 'SAISIE SCORE')
@section('form_action', route('scores.save'))
@section('form_button', 'Enregistrer le score')

@section('form_fields')

    <div class="form-column">
        {{-- Colonne 1 --}}
        <div class="form-group">
            {{-- Concours en cours --}}
            <label for="nom_concours">Concours</label>
            <input type="text" id="nom_concours" name="nom_concours"
                   value="{{ $concours->nom ?? '' }}" disabled>

            {{-- Épreuve --}}
            <label for="id_epreuve">Épreuve</label>
            <input list="epreuves" name="id_epreuve" id="id_epreuve" placeholder="Sélectionner une épreuve" required>
            <datalist id="epreuves">
                @foreach($epreuves as $epreuve)
                    <option value="{{ $epreuve->id }}">{{ $epreuve->code }} - {{ $epreuve->nom }}</option>
                @endforeach
            </datalist>

            {{-- Équipe --}}
            <label for="id_equipe">Équipe</label>
            <input list="equipes" name="id_equipe" id="id_equipe" placeholder="Sélectionner une équipe" required>
            <datalist id="equipes">
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}">{{ $equipe->code }} - {{ $equipe->nom }}</option>
                @endforeach
            </datalist>
        </div>
    </div>

<div class="form-column">
    {{-- Colonne 2 --}}
    <div class="form-group">
        {{-- Score --}}
        <label for="score">Score</label>
        <input type="number" 
               name="score" 
               id="score" 
               step="0.1" 
               min="0" 
               max="{{ $epreuve->score_max }}" 
               placeholder="Maximum : {{ $epreuve->score_max }}" 
               required>

        {{-- Commentaire --}}
        <label for="commentaire">Commentaire</label>
        <textarea name="commentaire" id="commentaire" rows="3"></textarea>
    </div>
</div>

    {{-- Messages d'erreur --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Message de succès --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

@endsection
