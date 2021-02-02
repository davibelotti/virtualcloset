<?php

include_once "BancoDados.php";

class Comentario
{

    public static function cadastrarComentario($nomeusuario, $conteúdo, $autor, $datapublicacao, $horapublicacao, $quantidadedenuncias, $codigo)
    {



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("INSERT INTO comentario(nomeusuario, conteúdo, autor, datapublicacao, horapublicacao, quantidadedenuncias) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nomeusuario, $conteúdo, $autor, $datapublicacao, $horapublicacao, $quantidadedenuncias, $codigo]);
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

    public static function deletarComentario($id)
    {
        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("DELETE FROM comentario WHERE id=?");
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

    
    public static function editarComentario($nomeusuario, $conteúdo, $autor, $datapublicacao, $horapublicacao, $quantidadedenuncias, $codigo, $id)
    {
        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("UPDATE comentario SET (nomeusuario, conteúdo, autor, datapublicacao, horapublicacao, quantidadedenuncias, codigo) VALUES (?, ?, ?, ?, ?, 0, ?) WHERE id=?");
            $stmt->execute([$nomeusuario, $conteúdo, $autor, $datapublicacao, $horapublicacao, $quantidadedenuncias, $codigo, $id]);
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


    public static function retornarComentarios()
    {
        $resultado = array();
        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("SELECT c.nomeusuario, c.conteudo, c.autor, c.datapublicacao, c.horapublicacao, c.quantidadedenuncias, c.codigo FROM comentario c");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        return $resultado;
    }
}
