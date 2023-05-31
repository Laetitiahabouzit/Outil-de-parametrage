<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/choix.css') }}" media="screen" type="text/css" />
    <title>Accueil</title>
</head>
<body>
    <div class="emplacement">
    <h1><a href="{{ route('inter1proj') }}" class="boutonChoix">Création et paramétrage d'un scénario</a></h1>
    </div>
    <div class="emplacement">
    <!-- <h1><a href="http://localhost:8000/chxscenario" class="boutonChoix">Consulter les résultats d'un scénario</a></h1> -->
    <h1><a href="{{ route('chxscenario') }}" class="boutonChoix">Consulter les résultats d'un scénario</a></h1>
    </div>
</body>
</html>



