<!DOCTYPE html>
<html lang="it">
	<head>
		<title>Form Inserimento</title>
	</head>
	<body>
		<h1>Scheda di Inserimento Dati</h1>
		<form method="POST" action="inserimentoEvento.php">
			Titolo evento
			<input type="text" name="titoloEvento" id="titoloEvento"/><br>
			Localit&agrave;
			<input type="text" name="loc" id="loc">
			Descrizione
			<input type="text" name="descrizione" id="descrizione">
			<br><br>
			<input type="radio" name="r1" id="r1_1" value="concerto" checked>Cocerto<br>
			<input type="radio" name="r1"  id="r1_2" value="teatro">Teatro<br>
			<input type="radio" name="r1" id="r1_3" value="sport">Sport
			<br><br>
			<input type="checkbox" value="libero" name="r3[]" id="r3_1">Libero<br>
			<input type="checkbox" value="prenotazione" name="r3[]" id="r3_2">Prenotazione<br>
			<input type="checkbox" value="biglietto" name="r3[]" id="r3_3">Biglietto<br>
			<br><br>
			latitudine <input type="text" name="lat" id="lat"><br>
			longitudine <input type="text" name="lon" id="lon">
			<br><br>
			<input type="submit" value="Cerca">
		</form>
	</body>
</html>
