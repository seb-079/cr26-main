@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Liste des scores</h1>

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Équipe</th>
                <th class="border px-4 py-2">Épreuve</th>
                <th class="border px-4 py-2">Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach($scores as $score)
                <tr>
                    <td class="border px-4 py-2">{{ $score->equipe_code }} - {{ $score->equipe_nom }}</td>
                    <td class="border px-4 py-2">{{ $score->epreuve_code }} - {{ $score->epreuve_nom }}</td>
                    <td class="border px-4 py-2">{{ $score->score }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
