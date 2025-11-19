@extends('layouts.form_base')
@section('title', 'Modifier un Score')
@section('form_title', 'MODIFICATION SCORE')
@section('form_action', route('scores.update', [$score->id_equipe, $score->id_epreuve]))
@section('form_button', 'Enregistrer les modifications')


@section('form_fields')

    <div class="form-column">
        {{-- Colonne 1 --}}
        <div class="form-group">
            {{-- Sélection de l’équipe --}}
            <label for="id_equipe">Équipe</label>
            <input list="equipes" name="id_equipe" id="id_equipe" placeholder="Sélectionner une équipe" required
                   value="{{ $score->id_equipe }}">
            <datalist id="equipes">
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}">{{ $equipe->code }} - {{ $equipe->nom }}</option>
                @endforeach
            </datalist>

            {{-- Sélection de l’épreuve --}}
            <label for="id_epreuve">Épreuve</label>
            <input list="epreuves" name="id_epreuve" id="id_epreuve" placeholder="Sélectionner une épreuve" required
                   value="{{ $score->id_epreuve }}">
            <datalist id="epreuves">
                @foreach($epreuves as $epreuve)
                    <option value="{{ $epreuve->id }}">{{ $epreuve->code }} - {{ $epreuve->nom }}</option>
                @endforeach
            </datalist>
        </div>
    </div>

    <div class="form-column">
        {{-- Colonne 2 --}}
        <div class="form-group">
            {{-- Score --}}
            <label for="score">Score</label>
            <input type="number" name="score" id="score" step="0.1" min="0" required
                   value="{{ $score->score }}">

            {{-- Commentaire --}}
            <label for="commentaire">Commentaire</label>
            <textarea name="commentaire" id="commentaire" rows="3">{{ $score->commentaire }}</textarea>
        </div>
    </div>

    {{-- Messages d'erreur --}}
    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Message de succès --}}
    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

@endsection
