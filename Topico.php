<?php

include_once "BancoDados.php";

class Topico
{



    public static function cadastrarTopico($nomeusuario, $codigo, $titulo, $tema, $conteudo, $respostas, $datapublicacao, $autor, $quantidadedenuncias)
    {



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("INSERT INTO topico(nomeusuario, codigo, titulo, tema, conteudo, respostas, datapublicacao, autor, quantidadedenuncias) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nomeusuario, $codigo, $titulo, $tema, $conteudo, $respostas, $datapublicacao, $autor, $quantidadedenuncias]);
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

    public static function deletarTopico($id)
    {



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("DELETE FROM topico WHERE id=?");
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

    
    public static function editarTopico($nomeusuario, $codigo, $titulo, $tema, $conteudo, $respostas, $datapublicacao, $autor, $quantidadedenuncias, $id)
    {



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("UPDATE topico(nomeusuario, codigo, titulo, tema, conteudo, respostas, datapublicacao, autor, quantidadedenuncias) SET (?, ?, ?, ?, ?, ?, ?, ?, ?) WHERE id=?");
            $stmt->execute([$nomeusuario, $codigo, $titulo, $tema, $conteudo, $respostas, $datapublicacao, $autor, $quantidadedenuncias, $id]);
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


    public static function retornarTopicos()
    {



        $resultado = array();



        try {
            $conexao = BancoDados::getInstance()->getConnection();
            $stmt = $conexao->prepare("SELECT t.nomeusuario, t.codigo, t.titulo, t.tema, t.conteudo, t.respostas, t.datapublicacao, t.autor, t.quantidadedenuncias FROM topicodediscussao t");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }



        return $resultado;



    }



}
