<?php

include_once "BancoDados.php";

class Material
{



    public static function cadastrarMaterial($nomeusuario, $titulo, $tema, $genero, $conteudo, $datapublicacao, $quantidadedenuncias)
    {



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("INSERT INTO material(nomeusuario, titulo, tema, genero, conteudo, datapublicacao, quantidadedenuncias) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nomeusuario, $titulo, $tema, $genero, $conteudo, $datapublicacao, $quantidadedenuncias]);
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

    public static function deletarMaterial($id)
    {



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("DELETE FROM material WHERE id=?");
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

    
    public static function editarMaterial($nomeusuario, $titulo, $tema, $genero, $conteudo, $datapublicacao, $quantidadedenuncias, $id)
    {



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("UPDATE material SET (nomeusuario, titulo, tema, genero, conteudo, datapublicacao, quantidadedenuncias) VALUES (?, ?, ?, ?, ?, ?, ?) WHERE id=?");
            $stmt->execute([$nomeusuario, $titulo, $tema, $genero, $conteudo, $datapublicacao, $quantidadedenuncias, $id]);
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


    public static function retornarMateriais()
    {



        $resultado = array();



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("SELECT m.nomeusuario, m.titulo, m.tema, m.genero, m.conteudo, m.datapublicacao, m.quantidadedenuncias FROM material m"z);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }



        return $resultado;



    }



}
