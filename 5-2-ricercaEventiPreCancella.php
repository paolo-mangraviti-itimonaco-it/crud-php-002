<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Selezione Cancella</title>
  </head>
  <body>
    <h1>Seleziona Cancella</h1>
    <?php
    
        $titolo=(isset(is_string($_POST['titoloEvento']))?$_POST['titoloEvento']:"");
        $localita=(isset(is_string($_POST['localita']))?$_POST['localita']:"");
        $tipo="%".(isset(is_string($_POST['r1']))?$_POST['r1']:"")."%";
        $accesso="%".(isset(is_string($_POST['r3']))?$_POST['r3']:"")."%";
        
        $serverName = "localhost";
        $IPserver = "127.0.1";
        $username = "applicazioneWeb";
        $password = "123456_Web&&";
        $db = "listaeventi";

	// Predisposizione della query di modifica
        $istruzioneSQL = mysqli_prepare($connessione,"SELECT * FROM eventi WHERE titolo LIKE ? AND localita LIKE ? AND tipo LIKE ? AND accesso LIKE ?");

        mysqli_stmt_bind_param($istruzioneSQL,"ssss",$titolo,$localita,$tipo, $accesso);
        $risultato=mysqli_stmt_execute($istruzioneSQL);

        echo("<p>".$istruzioneSQL."</p>");

        if (mysqli_num_rows($risultato) > 0) 
        {
            echo("<ul>");
            // output data of each row
            while($riga = mysqli_fetch_assoc($risultato)) 
            {
            echo "<li><a href='5-3-cancellaEvento.php?id=" . $riga["id"]. "'>[Cancella]</a> - Titolo: " . $riga["titolo"] ."</li>";
            }
            echo("</ul>");
        } 
        else 
            { echo "Nessun risultato"; }

        mysqli_close($connessione);
    ?> 	
  
  </body>
</html>
