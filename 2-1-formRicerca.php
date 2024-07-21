<!DOCTYPE html>
<html lang="it">
	<head>
		<title>Form Ricerca</title>
	</head>
	<body>
		<h1>Form Ricerca Dati</h1>
		<form method="post" action="2-2-ricercaEventi.php">
			<fieldset>
				<legend>Dati di ricerca</legend>
				<label for="titoloEvento">Titolo Evento</label>
				<input type="text" name="titoloEvento" id="titoloEvento">
				<label for="loc">Localit&agrave;</label>
				<input type="text" name="loc" id="loc">

				<br><br>
				<input type="radio" name="r1" id="r1_1" value="concerto" checked><label for="r1_1">Concerto</label><br>
				<input type="radio" name="r1" id="r1_2" value="teatro"><label for="r1_2">Teatro</label><br>
				<input type="radio" name="r1" id="r1_3" value="sport"><label for="r1_3">Sport</label><br>
				<input type="radio" name="r1" id="r1_4" value="%"><label for="r1_4">Tutti</label><br>
				<br><br>
				<input type="radio" value="libero" name="r3" id="r3_1"><label for="r3_1">Libero</label><br>
				<input type="radio" value="prenotazione" name="r3" id="r3_2"><label for="r3_2">Prenotazione</label><br>
				<input type="radio" value="biglietto" name="r3" id="r3_3"><label for="r3_3">Biglietto</label><br>
				<input type="radio" value="%" name="r3" id="r3_4"><label for="r3_4">Tutti</label><br>
			<input type="submit" value="Ricerca">
		</form>
	</body>
</html>