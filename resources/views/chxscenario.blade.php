<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/chxscenario.css') }}" media="screen" type="text/css" />
</head>
<body>

<h1>Choisissez un scénario</h1>

@foreach ($scenarios as $scenario)
    <div id="liste">
        <a href="{{ url('/listetest', ['idscenario' => $scenario->idscenario]) }}">{{ $scenario->nom }}</a><br>
    </div>
@endforeach

<a href="/edsa-projet/Choix.html" class="leBouton leBouton2">Retour</a>

</body>
</html>

