<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Cancellazione</title>
  </head>
  <body>
    <h1>Cancellazione</h1>
    <?php
    
        $id=(isset(is_string($_POST['id']))?$_POST['id']:"");

        $serverName = "localhost";
        $IPserver = "127.0.1";
        $username = "applicazioneWeb";
        $password = "123456_Web&&";
        $db = "listaeventi";

        // Stabilisce la connessione al DBMS remoto
        $connessione = mysqli_connect($serverName, $username, $password, $db);

        // Check connection
        if (!$connessione) { die("Errore connessione");	}
        
        $istruzioneSQL = mysqli_prepare($connessione,"DELETE FROM eventi WHERE id=?");
        mysqli_stmt_bind_param($istruzioneSQL,"i",$id);
        mysqli_stmt_execute($istruzioneSQL);  

		
        echo("<p>".$istruzioneSQL."</p>");

        mysqli_close($connessione);
    ?> 	
	<a href="./">Home comandi</a>
  </body>
</html>
