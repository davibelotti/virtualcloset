<?php

include_once "BancoDados.php";

class Denuncia
{



    public static function cadastrarDenuncia($nomeusuario, $justificativa, $datapublicacao, $horapublicacao)
    {



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("INSERT INTO denuncia(nomeusuario, justificativa, tema, datapublicacao, horapublicacao) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$nomeusuario, $justificativa, $tema, $datapublicacao, $horapublicacao]);
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

    public static function deletarDenuncia($id)
    {



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("DELETE FROM denuncia WHERE id=?");
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

    
    public static function editarDenuncia($nomeusuario, $justificativa, $tema, $datapublicacao, $horapublicacao, $id)
    {



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("UPDATE denuncia SET (nomeusuario, justificativa, tema, datapublicacao, horapublicacao) VALUES (?, ?, ?, ?, ?) WHERE id=?");
            $stmt->execute([$nomeusuario, $justificativa, $tema, $datapublicacao, $horapublicacao, $id]);
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


    public static function retornarDenuncias()
    {



        $resultado = array();



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("SELECT d.nomeusuario, d.justificativa, d.datapublicacao, d.horapublicacao FROM denuncia d");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }



        return $resultado;



    }



}
