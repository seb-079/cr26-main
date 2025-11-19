@extends('layouts.default')

@section('title', 'Accueil')

@section('content')
<section aria-labelledby="hero-title" style="margin-top:1rem; position: relative;">
    <article class="grid" style="align-items:center; gap:2rem;">

        <div style="max-width:600px;">
            <h1 id="hero-title" style="font-size:2.5rem; color:rgba(0, 0, 0, 0.5);  animation: fadeInDown 1s ease;">concours-robots 2026</h1>
            <p class="contrast" style="color:rgba(0, 0, 0, 0.5); margin:1rem 0; line-height:1.6; font-size:1.1rem; animation: fadeIn 1.5s ease;">
                Application web de gestion du concours (inscriptions, saisie des épreuves, classements).<br>
                <strong>vendredi 5 avril 2026</strong> à Valette (9h–15h).
            </p>

        </div>

        <figure style="position:relative; overflow:hidden; margin:1rem 0 ; border-radius:1rem; max-width:500px; animation: fadeIn 2s ease;">
            <img
                src="./images/robot.jpg"
                alt="Robot de compétition sur une piste"
                loading="eager"
                decoding="async"
                style="width:100%; height:auto; transition: transform 0.5s ease;"
                onmouseover="this.style.transform='scale(1.05)'"
                onmouseout="this.style.transform='scale(1)'"
            />
            <figcaption class="secondary" style="position:absolute; bottom:0; left:0; width:100%; padding:0.5rem 1rem; background: rgba(0,0,0,0.5); color:#fff; border-radius:0 0 1rem 1rem; font-size:0.95rem;">
                Concours des collèges — Technologie 3<sup>e</sup>
            </figcaption>
        </figure>
    </article>
</section>

<!-- Section cartes info -->
<section style="margin:3rem 0; display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:1.5rem;">
    <div style="background:#fff; padding:1.5rem; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s; text-align:center;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
        <h3>Inscription rapide</h3>
        <p>Ajoutez votre équipe en quelques clics et préparez-vous pour la compétition.</p>
        <a href="/inscriptions" class="btn-primary">S’inscrire</a>
    </div>

    <div style="background:#fff; padding:1.5rem; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s; text-align:center;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
        <h3>Résultats en direct</h3>
        <p>Suivez les classements et les performances des équipes tout au long de la journée.</p>
        <a href="/resultats" class="btn-primary">Voir les résultats</a>
    </div>

    <div style="background:#fff; padding:1.5rem; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s; text-align:center;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
        <h3>Règlement & infos</h3>
        <p>Toutes les informations importantes pour préparer votre équipe et participer au concours.</p>
        <a href="/informations" class="btn-primary">En savoir plus</a>
    </div>
</section>

<!-- Animations CSS -->
<style>
@keyframes fadeInDown {
    0% { opacity:0; transform: translateY(-30px);}
    100% { opacity:1; transform: translateY(0);}
}

@keyframes fadeIn {
    0% { opacity:0;}
    100% { opacity:1;}
}

.primary:hover, .btn-primary:hover {
    transform: scale(1.05);
}
</style>
@endsection
