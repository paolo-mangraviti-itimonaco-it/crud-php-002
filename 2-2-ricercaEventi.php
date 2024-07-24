<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Risultato Ricerca</title>
  </head>
  <body>
    <h1>Risultato Ricerca</h1>
    <?php
	include "0-0-dbConfig.php";
		
        $titolo=((is_string($_POST['titoloEvento']))?$_POST['titoloEvento']:"")."%";
        $localita=((is_string($_POST['loc']))?$_POST['loc']:"")."%";
        $tipo="%".((is_string($_POST['r1']))?$_POST['r1']:"")."%";
        $accesso="%".((is_string($_POST['r3']))?$_POST['r3']:"")."%";

        // Stabilisce la connessione al DBMS remoto
        $connessione = mysqli_connect($serverName, $username, $password, $db);

        // Verifica la connessione
        if (!$connessione) { die("Errore connessione");	}
		
        // Predisposizione della query di modifica
        $istruzioneSQL = mysqli_prepare($connessione,"SELECT * FROM eventi WHERE titolo LIKE ? AND localita LIKE ? AND tipo LIKE ? AND accesso LIKE ?");

        mysqli_stmt_bind_param($istruzioneSQL,"ssss",$titolo,$localita,$tipo, $accesso);
		
	mysqli_stmt_execute($istruzioneSQL);
        
	$risultato = mysqli_stmt_get_result($istruzioneSQL);

        // Visualizzazione del risultato della query
        if (mysqli_num_rows($risultato) > 0) 
        {
            echo("<ul>");
            while($riga = mysqli_fetch_assoc($risultato)) 
            {
            echo "<li>id: " . $riga["id"]. " - Titolo: " . $riga["titolo"]. " - Descrizione: " . $riga["descrizione"] . " - Latitudine: " . $riga["lat"] ."</li>";
            }
            echo("</ul>");
        } 
        else { echo "Nessun risultato"; }

        mysqli_close($connessione);
    ?> 	
  
  </body>
</html>
