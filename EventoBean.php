<?php
/**

 * Classe di gestione record Evento: contiene
 * tutti i metodi necessari per il database.
        `id` int(11) NOT NULL,
        `titolo` varchar(25) NOT NULL,
        `localita` varchar(50) NOT NULL,
        `descrizione` text NOT NULL,
        `tipo` varchar(30) NOT NULL,
        `accesso` varchar(30) NOT NULL,
        `lat` float NOT NULL,
        `lon` float NOT NULL
 */
 class EventoBean extends Evento {
     
    /** Costruttore della classe. */
    function __construct($id = 0, $titolo = "", $localita = "", $descrizione = "", $tipo = "", $accesso = "", $lat = "", $lon = "") {
        parent::__construct($id, $titolo, $localita, $descrizione, $tipo, $accesso, $lat, $lon);
        
        // Registra Record nel Database
        if ($id == 0) { $this->inserisce($idMateria, $idClasse, $descrizione); }
        else { $this->carica($id); }
    }
    
    static function caricaArgomenti($classe, $materia) {
        // Connessione al Database
        $conDB = Database::getConnessione();

        // Imposta Array
        $argomenti = array();

        // Verifica Connessione
        if ($conDB->connect_error) {
            $argomenti["?"] = "Errore Database";
        }
        else {
            $pos = 0;
            $sql = "SELECT idArgomento, Descrizione FROM Argomento ";
            if ( strlen($classe) > 0 ) {
                $sql = $sql . "WHERE idClasse = '" . $classe . "'";
                $pos = 1;
            }
            if ( strlen($materia) > 0 ) {
                if ($pos == 0) {
                    $sql = $sql . "WHERE idMateria = '" . $materia . "'";
                }
                else {
                    $sql = $sql . " AND idMateria = '" . $materia . "'";
                }
            }
            $rs = $conDB->query($sql);  
            while($row = $rs->fetch_assoc()) {
                $argomenti[$row["idArgomento"]]  = $row["Descrizione"];
            }    
        }
        $conDB->close();
        return $argomenti;
    }
    
    private function inserisce($id = 0, $titolo, $localita, $descrizione, $tipo, $accesso, $lat, $lon) {
        try {
            // Connessione al Database
            $conDB = Database::getConnessione();
            
            include "EventoQuery.php";

            $stmt = $conDB->prepare($querySQL["inserimento"]);
            $stmt -> bind_param($titolo, $localita, $descrizione, $tipo, $accesso, $lat, $lon);
            $result = $stmt->execute();

            // Verifica Inserimento
            if ($result) {
                $this->setId($conDB->insert_id);
            }
            else {
                throw new ArgomentoException("Errore Inserimento");
            }
            $conDB->close();
        }
        catch (DatabaseException $e) {
            throw new ArgomentoException($e->getMessaggio());
        }
    }

    private function carica($id) {
        try {
            // Connessione al Database
            $conDB = Database::getConnessione();
          
            // Esegue Query di Ricerca
            $sql = "SELECT idMateria, idClasse, Descrizione " .
                   "FROM Argomento WHERE idArgomento = " . $id;
            $rs = $conDB->query($sql);
            if ($row = $rs->fetch_assoc()) {
                $this->setId($id);
                $this->setIdMateria($row["idMateria"]);
                $this->setIdClasse($row["idClasse"]);
                $this->setDescrizione($row["Descrizione"]);
            }
            else {
                throw new ArgomentoException("Record NON Trovato");
            }
            $conDB->close();
        }
        catch (DatabaseException $e) {
            throw new ArgomentoException($e->getMessaggio());
        }
    }
    
    function aggiorna($id, $mat, $cla, $des) {
        try {
            // Connessione al Database
            $conDB = Database::getConnessione();

            if ($id != $this->getId()) {
                throw new ArgomentoException("ID Errato");
            }
            else {
                $sql = "UPDATE Argomento " .
                       "SET idMateria = ?, " .
                       "    idClasse = ?, " .
                       "    Descrizione = ? " .
                       "WHERE idArgomento = ? ";

                $stmt = $conDB->prepare($sql);
                $stmt -> bind_param('sssd', $mat, $cla, $des, $id);
                $result = $stmt->execute();

                // Verifica Modifica
                if ($result) {
                    $this->setIdMateria($mat);
                    $this->setIdClasse($cla);
                    $this->setDescrizione($des);
                }
                else {
                    throw new ArgomentoException("Errore Modifica");
                }
            }
            $conDB->close();
        }
        catch (DatabaseException $e) {
            throw new ArgomentoException($e->getMessaggio());
        }
    }
    
    function elimina() {
        try {
            // Connessione al Database
            $conDB = Database::getConnessione();

            $sql = "DELETE FROM Argomento " .
                   "WHERE idArgomento = " . $this->getId();       
            $result = $conDB->query($sql);

            // Verifica Eliminazione
            if (! $result) {
                throw new ArgomentoException("Errore Elimina");
            }
            $conDB->close();
        }
        catch (DatabaseException $e) {
            throw new ArgomentoException($e->getMessaggio());
        }
    }
}
?>