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
        
        include "0-0-dbConfig.php";
        
        // Stabilisce la connessione al DBMS remoto
        $connessione = mysqli_connect($serverName, $username, $password, $db);
        
        // Check connection
        if (!$connessione) { die("Errore connessione");	}
        
        $istruzioneSQL = mysqli_prepare($connessione,"SELECT * FROM eventi WHERE id=?");
        mysqli_stmt_bind_param($istruzioneSQL,"i",$id);
        mysqli_stmt_execute($istruzioneSQL);
        $tuple = mysqli_stmt_get_result($istruzioneSQL);
            
        
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
        else { echo "0 results"; }
        mysqli_close($connessione);
    }
?>
