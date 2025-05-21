<?php
/**
 * Description of ArgomentoException
 *
 * @author Dip. Informatica
 */
class ArgomentoException extends Exception {
    private $messaggio;
    
    function __construct($messaggio, $message = "", $code = 0, $previous = null) {
        parent::__construct($message, $code, $previous);
        $this->messaggio = $messaggio;
    }
    
    function getMessaggio() { return "Evento: " . $this->messaggio; }
    
    function getMessaggioEsteso() {
        return "Evento: " . $this->messaggio . " -> " . $this->getMessage();
    }
}
?>