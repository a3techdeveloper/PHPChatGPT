<?php

class Usuario {
    
    private $id;
    private $nomeCompleto;
    private $email;
    private $usuario;
    private $senha;
    
    function getId() {
        return $this->id;
    }

    function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    function getEmail() {
        return $this->email;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNomeCompleto($nomeCompleto) {
        $this->nomeCompleto = $nomeCompleto;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }    
}