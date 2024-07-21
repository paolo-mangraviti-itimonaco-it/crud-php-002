<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Inserimento Evento</title>
  </head>
  <body>
    <h1>Inserimento</h1>
    <?php
        $serverName = "localhost";
        $IPserver = "127.0.1";
        $username = "applicazioneWeb";
        $password = "123456_Web&&";
        $db = "listaeventi";

        $titolo=(isset(is_string($_POST['titoloEvento']))?$_POST['titoloEvento']:"");
        $descrizione=(isset(is_string($_POST['descrizione']))?$_POST['descrizione']:"");
        $localita=(isset(is_string($_POST['localita']))?$_POST['localita']:"");
        $lat=(isset(is_string($_POST['lat']))?$_POST['lat']:"");
        $lon=(isset(is_string($_POST['lon']))?$_POST['lon']:"");
        $tipo=(isset(is_string($_POST['r1']))?$_POST['r1']:"");
        $accesso="";
        if (isset(is_string($_POST['r3'])))
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
