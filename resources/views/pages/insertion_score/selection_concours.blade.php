@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Sélection du concours</h2>

    <form action="{{ route('insertion_score.choisir') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Choisir le concours :</label>
            <select name="id_concours" class="form-select" required>
                <option value="">-- Sélectionner --</option>
                @foreach($concours as $c)
                    <option value="{{ $c->id }}">{{ $c->nom}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Confirmer</button>
    </form>
</div>
@endsection
