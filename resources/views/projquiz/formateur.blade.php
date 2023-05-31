<!-- PROFESSEUR -->
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="{{ asset('css/accueil.css') }}" media="screen" type="text/css" />
</head>
<body>

<!--DIV NAV-->
<ul>
  <li><a class="active" href="{{ route('formateur.accueil') }}">Accueil</a></li>
  <li><a href="{{ route('formateur.creer') }}">Créer quiz</a></li>
  <li><a href="{{ route('formateur.modifier') }}">Modifier quiz</a></li>
  <li><a href="{{ route('formateur.corriger') }}">Corriger quiz</a></li>
  <li><a href="{{ route('formateur.consulter') }}">Consulter les copies</a></li>
</ul>

<!-- tester si l'utilisateur est connecté -->
@if(session('username') && session('id_user'))
<header>
    <h3>{{ session('username') }}</h3>
    <div>Bienvenue sur votre espace formateur !</div>
</header>
@endif

<div id='container'>
    <div id='content'>
        <h1>Liste de tous les quiz que vous avez créé</h1>

        @foreach($quizList as $quiz)
        <div id='liste'>
            @if($quiz['isUpcoming'])
                <h3><a href="{{ route('formateur.modifierQuiz', ['id_quiz' => $quiz['id_quiz']]) }}">{{ $quiz['nom'] }}</a> (à venir) </h3>
            @elseif($quiz['isInProgress'])
                <h3><a href="javascript:void(0)" onclick="alert('Vous ne pouvez ni modifier ni corriger ce quiz car il est en cours et les élèves ont déjà commencé à répondre !')">{{ $quiz['nom'] }}</a> <font color='red'>(en cours)</font> </h3>
            @else
                <h3><a href="{{ route('formateur.corrigerEleve', ['id_quiz' => $quiz['id_quiz']]) }}">{{ $quiz['nom'] }}</a> <font color='green'>(terminé)</font> </h3>
            @endif

            @if(isset($quiz['start_time']) && isset($quiz['end_time']))
                <p>Date de début : {{ $quiz['start_time'] }}</p>
                <p>Date de fin : {{ $quiz['end_time'] }}</p>
            @endif
        </div>
        @endforeach
    </div>
</div>

</body>
</html>
