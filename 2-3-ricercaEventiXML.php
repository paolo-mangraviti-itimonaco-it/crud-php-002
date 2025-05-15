<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet href="2-4-trasformazione.xsl" type="text/xsl" ?> 
<ElencoEventi>
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
        
        // Verifica la connessione
        if (!$connessione) { die("<messaggio>Errore connessione</messaggio>");	}
        
        // Predisposizione della query di modifica
        $istruzioneSQL = mysqli_prepare($connessione,"SELECT * FROM eventi WHERE titolo LIKE ? AND localita LIKE ? AND tipo LIKE ? AND accesso LIKE ?");
        
        mysqli_stmt_bind_param($istruzioneSQL,"ssss",$titolo,$localita,$tipo, $accesso);
        
        mysqli_stmt_execute($istruzioneSQL);
        
        $risultato = mysqli_stmt_get_result($istruzioneSQL);
        
        // Visualizzazione del risultato della query
        if (mysqli_num_rows($risultato) > 0) 
        {
            echo("<evento>");
            while($riga = mysqli_fetch_assoc($risultato)) 
                { echo "<id>" . $riga["id"]. "</id>" . "<titolo>" . $riga["titolo"]. "</titolo>". "<descrizione>" . $riga["descrizione"] . "</descrizione>" . "<latitudine>" . $riga["lat"] ."</latitudine>" . "<longitudine>" . $riga["lat"] ."</longitudine>"; }
            echo("</evento>");
        } 
        else { echo "<messaggio>Nessun risultato</messaggio>"; }
        
        mysqli_close($connessione);
    ?> 	
  
</ElencoEventi>
