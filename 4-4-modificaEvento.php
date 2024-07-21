<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Modifica Evento</title>
  </head>
  <body>
    <h1>Modifica evento</h1>
<?php

    $titolo=(is_string($_POST['titoloEvento'])?$_POST['titoloEvento']:"");
    $descrizione=(is_string($_POST['descrizione'])?$_POST['descrizione']:"");
    $localita=(is_string($_POST['localita'])?$_POST['localita']:"");
    $lat=(is_string($_POST['lat'])?$_POST['lat']:"");
    $lon=(is_string($_POST['lon'])?$_POST['lon']:"");
    $id=(is_string($_POST['id'])?$_POST['id']:"");

    $serverName = "localhost";
    $IPserver = "127.0.1";
    $username = "applicazioneWeb";
    $password = "123456_Web&&";
    $db = "listaeventi";

    // Stabilisce la connessione al DBMS remoto
    $connessione = mysqli_connect($serverName, $username, $password, $db);

    // Verifica che la connessione sia attiva
    if (!$connessione) { die("Errore connessione");	}

    // Predisposizione della query di modifica
    $istruzioneSQL = mysqli_prepare($connessione,"UPDATE eventi SET lat=?,lon=?,titolo=?,localita=?,descrizione=? WHERE id=?");

    /*
     * @param stringa di formato     
     * i corresponding variable has type <code>int</code>   
     * d corresponding variable has type <code>float</code>   
     * s corresponding variable has type <code>string</code>   
     * b corresponding variable is a blob and will be sent in packets
     */
    mysqli_stmt_bind_param($istruzioneSQL, "ddsssi", $lat, $lon, $titolo,$localita,$descrizione, $id);
    mysqli_stmt_execute($istruzioneSQL);

    mysqli_query($connessione,$istruzioneSQL);

    echo("<p>Operazione di modifica eseguita</p>");

    mysqli_close($connessione);
    
    ?> 	
  
  </body>
</html>