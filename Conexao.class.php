<?php

abstract class Conexao {
    
    private static $conn;
    
    private static function pegarConexao(){
        if(self::$conn == null){
            try{
                $dsn = "mysql:host=localhost;dbname=db_projetochatgpt";
                self::$conn = new PDO($dsn, "root", "");
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex) {
                echo "Erro: ".$ex->getMessage();
            }
        }
        return self::$conn;
    }

    protected static function preparaSQL($sql){
        return self::pegarConexao()->prepare($sql);
    }
}
