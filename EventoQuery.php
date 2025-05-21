<?php
/**
 * Classe di gestione record Argomento: contiene
 * tutti i metodi necessari per il database.
 */
 
    $querySQL = array   (
                        "inserimentoTupla"  => "INSERT INTO evento (titolo, localita, descrizione, tipo, accesso, lat, lon) VALUES (?, ?, ?, ?, ?, ?, ?)",
                        "cancellaTupla"     => "DELETE FROM evento WHERE id = ?",
                        "ricercaTupla"      => "SELECT * FROM eventi WHERE id=?",
                        "ricercaTuple"      => "SELECT * FROM eventi WHERE titolo LIKE ? AND localita LIKE ? AND tipo LIKE ? AND accesso LIKE ?",
                        "modificaTupla"     => "UPDATE eventi SET lat=?,lon=?,titolo=?,localita=?,descrizione=?,tipo=?,accesso=? WHERE id=?"
                        );
                            
?>