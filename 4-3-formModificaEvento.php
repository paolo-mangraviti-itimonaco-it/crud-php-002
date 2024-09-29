<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Selezione Modifica</title>
  </head>
  <body>
    <h1>Seleziona Modifica</h1>
    <?php        
        include "0-0-dbConfig.php";

        // Stabilisce la connessione al DBMS remoto
        $connessione = mysqli_connect($serverName, $username, $password, $db);

        // Check connection
        if (!$connessione) { die("Errore connessione");	}

        // Predisposizione della query di modifica
        $istruzioneSQL = mysqli_prepare($connessione,"SELECT * FROM eventi WHERE id=?");
        
        $id=(is_string($_GET['id']))?$_GET['id']:"";
        mysqli_stmt_bind_param($istruzioneSQL,"i",$id);
        mysqli_stmt_execute($istruzioneSQL);   
        $risultato = mysqli_stmt_get_result($istruzioneSQL);
        if (mysqli_num_rows($risultato) > 0) 
        {
                $riga = mysqli_fetch_assoc($risultato);
	?>
		<form method="post" action="4-4-modificaEvento.php">
			<input type="hidden" name="id" value="<?php echo($riga['id']);?>">
			<fieldset>
				<legend>Dati obbligatori</legend>
				<label for="titoloEvento">Titolo Evento</label>
				<input type="text" name="titoloEvento" id="titoloEvento"  value="<?php echo($riga['titolo']);?>">
				<label for="loc">Localit&agrave;</label>
				<input type="text" name="loc" id="loc" value="<?php echo($riga['localita']);?>">
				<label for="descrizione">Descrizione</label>
				<input type="text" name="descrizione" id="descrizione" value="<?php echo($riga['descrizione']);?>">
			</fieldset>
			<fieldset>
				<legend>Dati Descrittivi</legend>
				<input type="radio" name="r1" id="r1_1" value="concerto" <?php if (str_contains($riga['tipo'], 'concerto')) echo("checked"); ?>>
				<label for="r1_1">Concerto</label><br>
				<input type="radio" name="r1" id="r1_2" value="teatro" <?php if (str_contains($riga['tipo'], 'teatro')) echo("checked"); ?>>
				<label for="r1_2">Teatro</label><br>
				<input type="radio" name="r1" id="r1_3" value="sport" <?php if (str_contains($riga['tipo'], 'sport')) echo("checked"); ?>>
				<label for="r1_3">Sport</label>
				<br><br>
				<input type="checkbox" value="libero" name="r3[]" id="r3_1" <?php if (str_contains($riga['accesso'], 'libero')) echo("checked"); ?>>
				<label for="r3_1">Libero</label><br>
				<input type="checkbox" value="prenotazione" name="r3[]" id="r3_2" <?php if (str_contains($riga['accesso'], 'prenotazione')) echo("checked"); ?>>
				<label for="r3_2">Prenotazione</label><br>
				<input type="checkbox" value="biglietto" name="r3[]" id="r3_3" <?php if (str_contains($riga['accesso'], 'biglietto')) echo("checked"); ?>>
				<label for="r3_3">Biglietto</label><br>
			</fieldset>
			<fieldset>
				<legend>Coordinate</legend>
				<label for="lat">latitudine</label> <input type="text" name="lat" id="lat" value="<?php echo($riga['lat']);?>"><br>
				<label for="lon">longitudine</label> <input type="text" name="lon" id="lon" value="<?php echo($riga['lon']);?>">
			</fieldset>
			<input type="submit" value="Modifica">
			</form>
			<a href="./" style="margin-left: 30px;">Home comandi</a>
	<?php
		} 
		else 
			{ echo "Nessun risultato"; }

		mysqli_close($connessione);
    ?> 	
  
  </body>
</html>
