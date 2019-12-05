<?php


class Cliente {
    public $codCli;
    public $nombre;
    public $correo;
    public $pas;
    
    function __construct($codCli, $nombre, $correo, $pas) {
        $this->codCli = $codCli;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->pas = $pas;
    }
    function getCodCli() {
        return $this->codCli;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getPas() {
        return $this->pas;
    }

    function setCodCli($codCli) {
        $this->codCli = $codCli;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setPas($pas) {
        $this->pas = $pas;
    }


}
