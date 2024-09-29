<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Selezione Modifica</title>
  </head>
  <body>
    <h1>Seleziona Modifica</h1>
    <?php
        include "0-0-dbConfig.php";
        
        $titolo=((is_string($_POST['titoloEvento']))?$_POST['titoloEvento']:"")."%";
        $localita=((is_string($_POST['loc']))?$_POST['loc']:"")."%";
        $tipo="%".((is_string($_POST['r1']))?$_POST['r1']:"")."%";
        $accesso="";
        if (isset($_POST['r3'])) { foreach($_POST['r3'] as $voce){ $accesso .= $voce."%"; } }
        $accesso.="%";

        // Stabilisce la connessione al DBMS remoto
        $connessione = mysqli_connect($serverName, $username, $password, $db);

        // Check connection
        if (!$connessione) { die("Errore connessione");	}

        // Predisposizione della query di modifica
        $istruzioneSQL = mysqli_prepare($connessione,"SELECT * FROM eventi WHERE titolo LIKE ? AND localita LIKE ? AND tipo LIKE ? AND accesso LIKE ?");

        mysqli_stmt_bind_param($istruzioneSQL,"ssss",$titolo,$localita,$tipo, $accesso);
        mysqli_stmt_execute($istruzioneSQL);
        $risultato = mysqli_stmt_get_result($istruzioneSQL);

        if (mysqli_num_rows($risultato) > 0) 
        {
            echo("<ul>");
            // output data of each row
            while($riga = mysqli_fetch_assoc($risultato)) 
                { echo "<li><a href='4-3-formModificaEvento.php?id=" . $riga["id"]. "'>[Modifica]</a> - Titolo: " . $riga["titolo"] ."</li>"; }
            echo("</ul>");
        } 
        else { echo "Nessun risultato"; }

        mysqli_close($connessione);
    ?> 	
  
  </body>
</html>