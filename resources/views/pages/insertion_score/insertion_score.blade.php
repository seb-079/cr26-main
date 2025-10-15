@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Saisie du score</h2>
    <a href="{{ route('insertion_score.select') }}" class="btn btn-link">Changer de concours</a>

    {{-- Messages de succès ou d’erreur --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('insertion_score.save') }}" method="POST">
        

        <div class="mb-3">
            <label class="form-label">Équipe</label>
            <select name="id_equipe" class="form-select" required>
                <option value="">-- Sélectionner une équipe --</option>
                @foreach($equipes as $equipe)
                    <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Épreuve</label>
            <select name="id_epreuve" class="form-select" required>
                <option value="">-- Sélectionner une épreuve --</option>
                @foreach($epreuves as $epreuve)
                    <option value="{{ $epreuve->id }}">{{ $epreuve->nom }} (max : {{ $epreuve->score_max }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Score obtenu</label>
            <input type="number" step="0.1" name="score" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Commentaire</label>
            <textarea name="commentaire" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection
