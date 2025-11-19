@extends('layouts.table')
@section('content')

<div class="mb-4">
   <form action="{{ route('scores.liste') }}" method="GET">
    <input type="text" name="q" value="{{ request('q') }}" placeholder="Rechercher une équipe ou une épreuve..." class="border px-4 py-2 w-1/2">
    <button type="submit" class="btn btn-search ml-2">Rechercher</button>
</form>
</div>

<table class="min-w-full bg-white border border-gray-200">
    <thead>
        <tr class="bg-gray-100">
            <th class="border px-4 py-2">Équipe</th>
            <th class="border px-4 py-2">Épreuve</th>
            <th class="border px-4 py-2">Score</th>
            <th class="border px-4 py-2">Commentaire</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($scores as $score)
            <tr>
                <td data-label="Équipe">{{ $score->equipe_nom }} ({{ $score->equipe_code }})</td>
                <td data-label="Épreuve">{{ $score->epreuve_nom }} ({{ $score->epreuve_code }})</td>
                <td data-label="Score">{{ $score->score }}</td>
                <td data-label="Commentaire">{{ $score->commentaire }}</td>
                <td data-label="Actions" class="text-center">
                    <a href="{{ route('scores.edit', [$score->id_equipe, $score->id_epreuve]) }}" class="btn btn-edit">Modifier</a>
                    <form action="{{ route('scores.delete', [$score->id_equipe, $score->id_epreuve]) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Supprimer ce score ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center py-4">Aucun score trouvé.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
