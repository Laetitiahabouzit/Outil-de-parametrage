<!-- eleve.blade.php -->

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('accueil.css') }}" media="screen" type="text/css"/>
</head>
<body>
<div id="content">

    <!--DIV NAV-->
    <ul>
        <li><a class="active" href="{{ route('eleve') }}">Accueil</a></li>
        <li><a href="{{ route('repondre_quiz_liste') }}">Quiz disponibles</a></li>
        <li><a href="{{ route('consult_quiz_liste') }}">Résultats</a></li>
    </ul>

    @if(session('msg_validation_reponse'))
        <script>alert("{{ session('msg_validation_reponse') }}")</script>
    @endif

    @php
        $idpromo = session('id_promo');
        $user = session('username');
        $iduser = session('id_user');
    @endphp

    @if(session('username') && session('id_user'))
        <header>
            <h3>{{ $user }}</h3>
            @if($idpromo == 1)
                <div>Bienvenue sur votre espace élève ! Filière Scientifique</div>
            @elseif($idpromo == 2)
                <div>Bienvenue sur votre espace élève ! Filière Littéraire</div>
            @else
                <div>Bienvenue sur votre espace élève ! Filière Economique</div>
            @endif
        </header>
    @endif

    <div id='container'>
        <div id='content'>
            <h1>Liste de tous les quiz affectés à votre filière</h1>

            @foreach($quizList as $quiz)
                <div id='liste'>
                    @php
                        $current_time = time();
                        $start_time = strtotime($timesArray[$quiz->id_quiz]['start_time']);
                        $end_time = strtotime($timesArray[$quiz->id_quiz]['end_time']);
                    @endphp

                    @if($current_time < $start_time)
                        <h3>
                            <a href='javascript:void(0)' onclick="alert('Ce quiz est indisponible pour le moment')">{{ $quiz->nom }}</a>
                            <font color='red'>(à venir)</font>
                        </h3>
                    @elseif($current_time >= $start_time && $current_time <= $end_time)
                        <h3>
                            <a href='{{ route('repondre_quiz', ['id_quiz' => $quiz->id_quiz]) }}'>{{ $quiz->nom }}</a>
                            (en cours)
                        </h3>
                    @else
                        <h3>
                            <a href='{{ route('consultcopie', ['id_quiz' => $quiz->id_quiz]) }}'>{{ $quiz->nom }}</a>
                            (terminé)
                        </h3>
                    @endif

                    @if(isset($timesArray[$quiz->id_quiz]))
                        <p>Date de début : {{ $timesArray[$quiz->id_quiz]['start_time'] }}</p>
                        <p>Date de Fin : {{ $timesArray[$quiz->id_quiz]['end_time'] }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

</div>
</body>
</html>
