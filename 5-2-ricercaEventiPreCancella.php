<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Selezione Cancella</title>
  </head>
  <body>
    <h1>Seleziona Cancella</h1>
    <?php
    
        include "0-0-dbConfig.php";
        
        // Stabilisce la connessione al DBMS remoto
        $connessione = mysqli_connect($serverName, $username, $password, $db);
        
        // Verifica la connessione
        if (!$connessione) { die("Errore connessione");	}
        
        $titolo=((is_string($_POST['titoloEvento']))?$_POST['titoloEvento']:"")."%";
        $localita=((is_string($_POST['loc']))?$_POST['loc']:"")."%";
        $tipo="%".((is_string($_POST['r1']))?$_POST['r1']:"")."%";
        $accesso="";
        if (isset($_POST['r3'])) { foreach($_POST['r3'] as $voce){ $accesso .= $voce."%"; } }
        $accesso.="%";
        
        $istruzioneSQL = mysqli_prepare($connessione,"SELECT * FROM eventi WHERE titolo LIKE ? AND localita LIKE ? AND tipo LIKE ? AND accesso LIKE ?");

        mysqli_stmt_bind_param($istruzioneSQL,"ssss",$titolo,$localita,$tipo, $accesso);
        mysqli_stmt_execute($istruzioneSQL);
        
        $risultato = mysqli_stmt_get_result($istruzioneSQL);

        if (mysqli_num_rows($risultato) > 0) 
        {
            echo("<ul>");
            // output data of each row
            while($riga = mysqli_fetch_assoc($risultato)) 
            {  echo "<li><a href='5-3-cancellaEvento.php?id=" . $riga["id"]. "'>[Cancella]</a> - Titolo: " . $riga["titolo"] ."</li>";  }
            echo("</ul>");
        } 
        else 
            { echo "Nessun risultato"; }

        mysqli_close($connessione);
    ?> 	
  
  </body>
</html>
