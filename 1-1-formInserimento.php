<!DOCTYPE html>
<html lang="it">
	<head>
		<title>Form Inserimento</title>
	</head>
	<body>
		<h1>Form Inserimento Dati</h1>
		<form method="post" action="1-2-inserimentoEvento.php">
			<fieldset>
				<legend>Dati obbligatori</legend>
				<label for="titoloEvento">Titolo evento</label>
				<input type="text" name="titoloEvento" id="titoloEvento">
				<label for="loc">Localit&agrave;</label>
				<input type="text" name="loc" id="loc">
				<label for="descrizione">Descrizione</label>
				<input type="text" name="descrizione" id="descrizione">
			</fieldset>
			<fieldset>
				<legend>Dati Descrittivi</legend>
				<input type="radio" name="r1" id="r1_1" value="concerto" checked><label for="r1_1">Concerto</label><br>
				<input type="radio" name="r1" id="r1_2" value="teatro"><label for="r1_2">Teatro</label><br>
				<input type="radio" name="r1" id="r1_3" value="sport"><label for="r1_3">Sport</label>
				<br><br>
				<input type="checkbox" value="libero" name="r3[]" id="r3_1"><label for="r3_1">Libero</label><br>
				<input type="checkbox" value="prenotazione" name="r3[]" id="r3_2"><label for="r3_2">Prenotazione</label><br>
				<input type="checkbox" value="biglietto" name="r3[]" id="r3_3"><label for="r3_3">Biglietto</label><br>
			</fieldset>
			<fieldset>
				<legend>Coordinate</legend>
				<label for="lat">latitudine</label> <input type="text" name="lat" id="lat"><br>
				<label for="lon">longitudine</label> <input type="text" name="lon" id="lon">
			</fieldset>
			<input type="submit" value="Inserisci">
			<a href="./" style="margin-left: 30px;">Home comandi</a>
		</form>
	</body>
</html>
