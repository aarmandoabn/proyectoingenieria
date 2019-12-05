<?php


class DetallePedido {
    public $num;
    public $codpro;
    public $can;
    
    function __construct($num, $codpro, $can) {
        $this->num = $num;
        $this->codpro = $codpro;
        $this->can = $can;
    }
    function getNum() {
        return $this->num;
    }

    function getCodpro() {
        return $this->codpro;
    }

    function getCan() {
        return $this->can;
    }

    function setNum($num) {
        $this->num = $num;
    }

    function setCodpro($codpro) {
        $this->codpro = $codpro;
    }

    function setCan($can) {
        $this->can = $can;
    }


}
