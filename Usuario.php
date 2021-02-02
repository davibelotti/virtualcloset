<?php

include_once "BancoDados.php";

class Usuario
{



    public static function cadastrarUsuario($nome, $genero, $biografia, $email, $senha, $historicoatividade, $nomeusuario)
    {



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("INSERT INTO usuario (nome, genero, biografia, email, senha, historicoatividade, nomeusuario) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nome, $genero, $biografia, $email, $senha, $historicoatividade, $nomeusuario]);
            $linhas_alteradas = $stmt->rowCount();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }



        if ($linhas_alteradas > 0) {
            return true;
        } else {
            return false;
        }



    }

    public static function deletarUsuario($id)
    {



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("DELETE FROM usuario WHERE id=?");
            $stmt->execute([$id]);
            $linhas_alteradas = $stmt->rowCount();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }



        if ($linhas_alteradas > 0) {
            return true;
        } else {
            return false;
        }



    }

    
    public static function editarUsuario($nome, $genero, $biografia, $email, $senha, $historicoatividade, $nomeusuario, $id)
    {



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("UPDATE usuario(nome, genero, biografia, email, senha, historicoatividade, nomeusuario) SET (?, ?, ?, ?, ?, ?, ?) WHERE id=?");
            $stmt->execute([$nome, $genero, $biografia, $email, $senha, $historicoatividade, $nomeusuario, $id]);
            $linhas_alteradas = $stmt->rowCount();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }



        if ($linhas_alteradas > 0) {
            return true;
        } else {
            return false;
        }



    }


    public static function retornarUsuarios()
    {



        $resultado = array();



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("SELECT u.id, u.nome, u.genero, u.biografia, u.email, u.senha, u.historicoatividade, u.nomeusuario FROM usuario u");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }



        return $resultado;



    }



}
