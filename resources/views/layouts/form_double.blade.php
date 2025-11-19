<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Formulaire')</title>
    <meta name="description" content="Application de gestion du concours de robots des collèges (Deux-Sèvres) : inscriptions, saisie des notes, résultats et informations générales." />
    <link href="/css/pico.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
</head>
<body>


    @include('includes.header')


<main id="main">
    <div class="form-wrapper">
        <div class="form-container">
            <h1>@yield('form_title', 'Formulaire')</h1>

            {{-- Messages de session --}}
            @if(session('success'))
                <div class="success-message">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="@yield('form_action')" method="POST" class="@yield('form_class', '')">
                @csrf
                @yield('form_fields')

                <button type="submit" class="btn-submit">@yield('form_button', 'Enregistrer')</button>
            </form>
        </div>
    </div>
</main>

@include('includes.footer')

</body>
</html>
