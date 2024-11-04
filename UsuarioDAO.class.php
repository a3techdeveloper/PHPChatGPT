<?php

include_once 'Conexao.class.php';

class UsuarioDAO extends Conexao {
    
    private $entidade = "tb_usuario";
    
    public function cadastra(Usuario $u){
        $sql = "INSERT INTO {$this->entidade}(nomecompleto, email, usuario, senha)
            VALUES(?,?,?,?)";
        $stmt = UsuarioDAO::preparaSQL($sql);
        $stmt->bindValue(1, $u->getNomeCompleto());
        $stmt->bindValue(2, $u->getEmail());
        $stmt->bindValue(3, $u->getUsuario());
        $stmt->bindValue(4, $u->getSenha());
        return $stmt->execute();
    }
    
    public function edita(Usuario $u){
        $sql = "UPDATE {$this->entidade} SET nomecompleto = ?, email = ?, usuario = ?, 
            senha = ? WHERE id = ?";
        $stmt = UsuarioDAO::preparaSQL($sql);
        $stmt->bindValue(1, $u->getNomeCompleto());
        $stmt->bindValue(2, $u->getEmail());
        $stmt->bindValue(3, $u->getUsuario());
        $stmt->bindValue(4, $u->getSenha());
        $stmt->bindValue(5, $u->getId());
        return $stmt->execute();
    }
    
    public function selecionaTudo(){
        $sql = "SELECT * FROM {$this->entidade}";
        $stmt = UsuarioDAO::preparaSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function seleciona(Usuario $u){
        $sql = "SELECT * FROM {$this->entidade} WHERE id = ?";
        $stmt = UsuarioDAO::preparaSQL($sql);
        $stmt->bindValue(1, $u->getId());
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }  
    
    public function exclui(Usuario $u){
        $sql = "DELETE FROM {$this->entidade} WHERE id = ?";
        $stmt = UsuarioDAO::preparaSQL($sql);
        $stmt->bindValue(1, $u->getId());
        return $stmt->execute();
    }

    public function logar(Usuario $u){
        $sql = "SELECT * FROM {$this->entidade} WHERE usuario = ? AND senha = ?";
        $stmt = UsuarioDAO::preparaSQL($sql);
        $stmt->bindValue(1, $u->getUsuario());
        $stmt->bindValue(2, $u->getSenha());
        $stmt->execute();
        if($stmt->rowCount()){
            $_SESSION['autenticado'] = true;
            return true;
        }else{
            return false;
        }
    }
    
    public static function deslogar(){
        if($_SESSION['autenticado']){
            session_unset();
            session_destroy();
            header("Location:index.php");
        }
    }
}
