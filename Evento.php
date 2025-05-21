<?php

 
 class Evento {  
    // Campi Tabella Argomento
    private $id;
    private $titolo;
    private $localita;
    private $descrizione;
    private $tipo;
    private $accesso;
    private $lat;
    private $lon;
    
    function __construct($id = 0, $titolo = "", $localita = "", $descrizione = "", $tipo = "", $accesso = "", $lat = "", $lon = "") {
        $this->id = $id;
        $this->titolo = $titolo;
        $this->localita = $localita;
        $this->descrizione = $descrizione;
        $this->tipo = $tipo;
        $this->accesso = $accesso;
        $this->lat = $lat;
        $this->lon = $lon;
    }
    
    function getId() { return $this->id; }
    function setId($id) { $this->id = $id; }
    
    function getTitolo() { return $this->titolo; }
    function setTitolo($titolo) { $this->titolo = $titolo; }

    function getLocalita() { return $this->localita; }
    function setLocalita($localita) { $this-> = $localita; }
    
    function getDescrizione() { return $this->descrizione; }
    function setDescrizione($descrizione) { $this->descrizione = $descrizione; }
    
    function getTipo() { return $this->tipo; }
    function set($Tipo) { $this->tipo = $tipo; }
    
    function getAccesso() { return $this->accesso; }
    function setAccesso($accesso) { $this->accesso = $accesso; }
    
    function getLat() { return $this->lat; }
    function setLat($lat) { $this->lat = $lat; }
    
    function getLon() { return $this->lon; }
    function setLon($lon) { $this->lon = $lon; }
    
}
?>