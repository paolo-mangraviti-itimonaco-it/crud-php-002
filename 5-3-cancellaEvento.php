<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Cancellazione</title>
  </head>
  <body>
    <h1>Cancellazione</h1>
    <?php
    
        include "0-0-dbConfig.php";
        
        // Stabilisce la connessione al DBMS remoto
        $connessione = mysqli_connect($serverName, $username, $password, $db);
        
        // Verifica la connessione
        if (!$connessione) { die("Errore connessione");	}
        
        $id=(is_string($_GET['id'])?$_GET['id']:"");
        $istruzioneSQL = mysqli_prepare($connessione,"DELETE FROM eventi WHERE id=?");
        mysqli_stmt_bind_param($istruzioneSQL,"i",$id);
        mysqli_stmt_execute($istruzioneSQL);  

        mysqli_close($connessione);
    ?> 	
	<a href="./">Home comandi</a>
  </body>
</html>
