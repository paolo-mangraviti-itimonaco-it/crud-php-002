<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Ricerca massiva</title>
  </head>
  <body>
    <h1>Ricerca Massiva</h1>
    <?php
      $serverName = "localhost";
      $IPserver = "127.0.1";
      $username = "applicazioneWeb";
      $password = "123456_Web&&";
      $db = "listaeventi";
      
      // Stabilisce la connessione al DBMS remoto
      $connessione = mysqli_connect($serverName, $username, $password, $db);
      
      // Check connection
      if (!$connessione) { die("Errore connessione");	}
      
      $istruzioneSQL = "SELECT id, titolo FROM eventi";
      $tuple = mysqli_query($connessione,$istruzioneSQL);
      
      if (mysqli_num_rows($tuple) > 0) 
      {
        echo("<ul>");
        // output data of each row
        while($record = mysqli_fetch_assoc($tuple)) 
        {
        echo "<li>id: " . $record["id"]. " - Titolo: " . $record["titolo"]. "</li>";
        }
        echo("</ul>");
      } 
      else 
      { echo "0 results"; }
      mysqli_close($connessione);
    ?> 	
    <a href="./" style="margin-left: 30px;">Home comandi</a>
  </body>
</html>
