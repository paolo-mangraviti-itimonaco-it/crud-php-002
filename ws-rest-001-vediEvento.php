<?php
    header('Content-Type: application/xml');

	$idEvento = "";
    //if (strcmp($_SERVER['HTTP_'],"")==0)
      {
        switch ($_SERVER["REQUEST_METHOD"])
          {
          case "GET":
			$idEvento = $_GET["id"];
          break;
          case "POST":
			$idEvento = $_POST["id"];
          break;
          default:
          break;
          }
		  
		  $serverName = "localhost";
		  $IPserver = "127.0.1";
		  $username = "applicazioneWeb";
		  $password = "123456_Web&&";
		  $db = "listaeventi";
		  
		  // Stabilisce la connessione al DBMS remoto
		  $connessione = mysqli_connect($serverName, $username, $password, $db);
		  
		  // Check connection
		  if (!$connessione) { die("Errore connessione");	}
		  
		  $istruzioneSQL = "SELECT * FROM eventi WHERE id=" . $idEvento;
		  $tuple = mysqli_query($connessione,$istruzioneSQL);
		  
		  if (mysqli_num_rows($tuple) > 0) 
		  {
			echo("<dati>\n");
			// output data of each row
			while($record = mysqli_fetch_assoc($tuple)) 
			{
				echo "\t<evento>\n";
				echo "\t\t<id>". $record["id"]. "</id>\n"; 
				echo "\t\t<titolo>". $record["titolo"]. "</titolo>\n";
				echo "\t</evento>\n";
			}
			echo("</dati>");
		  } 
		  else 
		  { echo "0 results"; }
		  mysqli_close($connessione);
      }
?>
