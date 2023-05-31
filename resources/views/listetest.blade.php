<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/chxscenario.css') }}" media="screen" type="text/css" />
</head>
<body>

<h1>Choisissez un test pour lequel vous voulez voir les graphiques</h1>

@foreach ($tests as $test)
    <div id="liste">
        <a href="{{ route('graph', ['idtest' => $test->idtest]) }}">{{ $test->nom }} {{ $test->ts_debut }}</a><br>
    </div>
@endforeach

</body>
</html>






<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/chxscenario.css') }}" media="screen" type="text/css" />
</head>
<body>

<h1>Choisissez un test pour lequel vous voulez voir les graphiques</h1>

@foreach ($tests as $test)
    <div id="liste">
        <a href="{{ url('/graph?idtest=' . $test->idtest) }}">{{ $test->nom }} {{ $test->ts_debut }}</a><br>
    </div>
@endforeach

</body>
</html> -->

