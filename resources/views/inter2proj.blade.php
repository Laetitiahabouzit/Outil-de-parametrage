<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/css.css') }}" media="screen" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        var ligneCounter = 0; // Compteur de lignes ajoutées

        //fonction pour ajouter une ligne
        $(".add").click(function() {
            var oport = "<select name='port[]'><option value='1'>P1</option><option value='2'>P2</option><option value='3'>P3</option></select>";
            var oud = "<select name='ud[]'><option value='U'>Upload</option><option value='D'>Download</option></select>";
            var indeb = "<input type='number' id='subject" + ligneCounter + "' name='debut[]' maxlength='11' required/>";
            var infin = "<input type='number' id='subject2" + ligneCounter + "' name='fin[]' maxlength='11' required/>";
            var ligne = "<tr><td><input type='checkbox' name='select[]'></td><td>" + oport + "</td><td>" + oud + "</td><td>" + indeb + "</td><td>" + infin + "</td></tr>";
            $("table.test").append(ligne);

            ligneCounter++; // Incrémente le compteur de lignes ajoutées
        });

        //fonction pour supprimer les lignes cochées
        $(".delete").click(function() {
            $("table.test").find('input[name="select[]"]').each(function() {
                if ($(this).is(":checked")) {
                    $(this).closest("tr").remove();
                }
            });
        });
        
    });  
</script>
    <title>Interface 2 projet</title>
</head>
<body>

@if (!empty(session('idscenario')))
    <?php $idscenario = session('idscenario'); ?>
@else
    <?php header("Location: inter1proj.php"); exit(); ?>
@endif

<form method="post" action="{{ route('saveParam') }}">
{!! csrf_field() !!}
    <input type="hidden" name="idscenario" value="{{ $idscenario }}">
    <table class="test">
        <tr>
            <th colspan="1">Sélectionner</th>
            <th colspan="1">Port</th>
            <th colspan="1">Type flux</th>
            <th colspan="1">Début</th>
            <th colspan="1">Fin</th>
        </tr>
        <tr>
            <td><input type="checkbox" name="select[]"></td>
            <td>
                <select name="port[]">
                    <option value="1">P1</option>
                    <option value="2">P2</option>
                    <option value="3">P3</option>
                </select>
            </td>
            <td>
                <select name="ud[]">
                    <option value="U">Upload</option>
                    <option value="D">Download</option>
                </select>
            </td>
            <td>
                <input type="number" id="subject" name="debut[]" required>
            </td>
            <td>
                <input type="number" id="subject2" name="fin[]" required>
            </td>
        </tr>
    </table>
    <input type="button" class="add" value="Ajouter une ligne">
    <input type="button" class="delete" value="Supprimer une ligne">  
    <input type="submit" value="Envoyer">
</form>
<div class="emplacement">
    <a href="{{ url('/') }}" class="boutonChx">Creer un nouveau scénario</a>
    <a href="{{ url('/chxscenario') }}" class="boutonChx">Consulter les résultats d'un scénario</a>
</div>
</body>
</html>