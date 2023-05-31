<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="{{ asset('css/login.css') }}" media="screen" type="text/css" />
 </head>
 <body>
 <div id="container">
 
 <form action="{{ route('verification') }}" method="POST">
 {!! csrf_field() !!}
 <h1>Connexion</h1>
 
 <label><b>Nom d'utilisateur</b></label>
 <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

 <label><b>Mot de passe</b></label>
 <input type="password" placeholder="Entrer le mot de passe" name="password" required>

 <input type="submit" id='submit' value='LOGIN' >
 @if(isset($erreur) && ($erreur == 1 || $erreur == 2))
 <p style='color:red'>Utilisateur ou mot de passe incorrect</p>
 @endif
 </form>
 </div>
 </body>
</html>
