<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Ricerca massiva</title>
  </head>
  <body>
    <h1>Ricerca Massiva</h1>
    <?php
        include "0-0-dbConfig.php";
        
        // Stabilisce la connessione al DBMS remoto
        $connessione = mysqli_connect($serverName, $username, $password, $db);
        
        // Verifica che la connessione sia attiva
        if (!$connessione) { die("Errore connessione"); }
        
        $istruzioneSQL = "SELECT id, titolo FROM eventi";
        $tuple = mysqli_query($connessione,$istruzioneSQL);
        
        if (mysqli_num_rows($tuple) > 0) 
            {
                echo("<ul>");
                // visualizzazione dei dati di ogni tupla
                while($record = mysqli_fetch_assoc($tuple)) 
                    {  echo "<li>id: " . $record["id"]. " - Titolo: " . $record["titolo"]. "</li>";  }
                echo("</ul>");
            } 
        else 
            { echo "Nessun dato presente nel data-base"; }
        mysqli_close($connessione);
        ?> 	
    <a href="./" style="margin-left: 30px;">Home comandi</a>
  </body>
</html>
