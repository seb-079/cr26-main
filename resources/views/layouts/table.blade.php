<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tableau')</title>
    <meta name="description" content="Tableaux de gestion des scores, équipes et épreuves.">
    <link href="/css/pico.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
</head>
<body>

    {{-- Header --}}
    
        @include('includes.header')
    

    <main id="main" class="table-page">
        <div class="table-wrapper">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    @include('includes.footer')

</body>
</html>
