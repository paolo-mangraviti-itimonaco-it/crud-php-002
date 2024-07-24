<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Inserimento Evento</title>
  </head>
  <body>
    <h1>Inserimento</h1>
    <?php
        include "0-0-dbConfig.php";

        $titolo=((is_string($_POST['titoloEvento']))?$_POST['titoloEvento']:"");
        $descrizione=((is_string($_POST['descrizione']))?$_POST['descrizione']:"");
        $localita=((is_string($_POST['loc']))?$_POST['loc']:"");
        $lat=((is_string($_POST['lat']))?$_POST['lat']:"");
        $lon=((is_string($_POST['lon']))?$_POST['lon']:"");
        $tipo=((is_string($_POST['r1']))?$_POST['r1']:"");
        $accesso="";
        if ((is_string($_POST['r3'])))
            { foreach($_POST['r3'] as $voce){ $accesso .= $voce.":"; } }
        

        // Stabilisce la connessione al DBMS remoto
        $connessione = mysqli_connect($serverName, $username, $password, $db);

        // Verifica che la connessione sia attiva
        if (!$connessione) { die("Errore connessione");	}

        // Predisposizione della query di modifica
        $istruzioneSQL = mysqli_prepare($connessione,"INSERT INTO eventi (titolo, localita, descrizione, tipo, accesso,lat, lon) VALUES (?,?,?,?,?,?,?)");

        mysqli_stmt_bind_param($istruzioneSQL, "sssssdd",$titolo,$localita,$descrizione,$tipo, $accesso, $lat, $lon);
        mysqli_stmt_execute($istruzioneSQL);

        echo("<p>Operazione di inserimento eseguita</p>");

        mysqli_close($connessione);
    ?> 	
  
  </body>
</html>
