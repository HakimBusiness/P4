<html>
<head>
    <meta charset="UTF-8">
    <title>Classement des joueurs</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
</head>
<body>

<p></p>

<div class="container col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">Classement des joueurs</div>
        <div class="panel-body">

            <table class="table table-striped">

                <tr>
                    <th>NOM DU JOUEUR</th>
                    <th>SCORE</th>
                </tr>

                <?php
                while ($DATA = $resultat->fetch()) {
                    $nom = $DATA["NOM_JOUEUR"];
                    $score = $DATA["SCORE"];
                    echo("<tr> <td>" . $nom . "</td>  <td>" . $score . "</td> </tr>");
                }
                ?>
            </table>