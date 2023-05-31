<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/interface1.css') }}" media="screen" type="text/css" />
    <title>Interface 1 projet</title>
</head>
<body>

<div class="inter1">
    <form method="POST" action="{{ route('saveScenario') }}">
        {!! csrf_field() !!}
        <label><h2>Créer un scénario</h2></label>
        <label>Nom de scénario</label>
        <input type="text" name="nom" placeholder="Nom de scénario" maxlength="20" required/>
    
        <label>Intervalle</label>
        <input type="number" name="intervalle" placeholder="Intervalle" required/>

        <div class="port">
            <label>P1</label>
            <input type="number" name="p1" placeholder="Numéro de port" maxlength="11" required/>
      
            <label>P2</label>
            <input type="number" name="p2" placeholder="Numéro de port" maxlength="11" required>
      
            <label>P3</label>
            <input type="number" name="p3" placeholder="Numéro de port" maxlength="11" required>
        </div>
        <input type="submit" value="Créer">
    </form>
    <a href="{{ url('/') }}" class="boutonRetour"><- Retour</a>
</div>

</body>
</html>
