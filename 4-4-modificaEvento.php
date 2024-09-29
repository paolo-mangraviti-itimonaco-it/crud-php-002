<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Modifica Evento</title>
  </head>
  <body>
    <h1>Modifica evento</h1>
<?php
    include "0-0-dbConfig.php";
    
    // Stabilisce la connessione al DBMS remoto
    $connessione = mysqli_connect($serverName, $username, $password, $db);
    
    if (!$connessione) { die("Errore connessione");	}
    
    $titolo=(is_string($_POST['titoloEvento'])?$_POST['titoloEvento']:"");
    $descrizione=(is_string($_POST['descrizione'])?$_POST['descrizione']:"");
    $localita=(is_string($_POST['loc'])?$_POST['loc']:"");
    $lat=(is_string($_POST['lat'])?$_POST['lat']:"");
    $lon=(is_string($_POST['lon'])?$_POST['lon']:"");
    $id=(is_string($_POST['id'])?$_POST['id']:"");
    $tipo=((is_string($_POST['r1']))?$_POST['r1']:"");
    $accesso="";
    if (isset($_POST['r3'])) { foreach($_POST['r3'] as $voce){ $accesso .= $voce.":"; } }

    // Predisposizione della query di modifica
    $istruzioneSQL = mysqli_prepare($connessione,"UPDATE eventi SET lat=?,lon=?,titolo=?,localita=?,descrizione=?,tipo=?,accesso=? WHERE id=?");

    /*
     * @param stringa di formato     
     * i corresponding variable has type <code>int</code>   
     * d corresponding variable has type <code>float</code>   
     * s corresponding variable has type <code>string</code>   
     * b corresponding variable is a blob and will be sent in packets
     */
    mysqli_stmt_bind_param($istruzioneSQL, "ddsssssi", $lat,$lon,$titolo,$localita,$descrizione,$tipo,$accesso,$id);
    mysqli_stmt_execute($istruzioneSQL);

    echo("<p>Operazione di modifica eseguita</p>");

    mysqli_close($connessione);
    
    ?> 	
  
  </body>
</html>