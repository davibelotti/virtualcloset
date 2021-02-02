<!DOCTYPE html>
<html lang="pt-br">



<head>

    <meta charset="utf-8">
    <title>Virtual Closet</title>

</head>



<body>



    <?php



    include "Usuario.php";

    if (isset($_POST["nome"]) && isset($_POST["genero"]) && isset($_POST["biografia"]) && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["historicoatividade"]) && isset($_POST["nomeusuario"])) {
        $nome = $_POST["nome"];
        $genero = $_POST["genero"];
        $biografia = $_POST["biografia"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	$historicoatividade = $_POST["historicoatividade"];
	$nomeusuario = $_POST["nomeusuario"];
        $resultado = Usuario::cadastrarUsuario($nome, $genero, $biografia, $email, $senha, $historicoatividade, $nomeusuario);
        
	if ($resultado) {
            echo "<p>Usuário Cadastrado!</p>";
        } else {
            echo "<p>Houve algum erro! Tente novamente.</p>";
        }

    }


	
    include "Topico.php";

    if (isset($_POST["nomeusuario"]) && isset($_POST["codigo"]) && isset($_POST["titulo"]) && isset($_POST["tema"]) && isset($_POST["conteudo"]) && isset($_POST["respostas"]) && isset($_POST["datapublicacao"]) && isset($_POST["autor"]) && isset($_POST["quantidadedenuncias"])) {
        $nomeusuario = $_POST["nomeusuario"];
        $codigo = $_POST["codigo"];
        $titulo = $_POST["titulo"];
	$tema = $_POST["tema"];
	$conteudo = $_POST["conteudo"];
	$respostas = $_POST["respostas"];
	$datapublicacao = $_POST["datapublicacao"];
	$autor = $_POST["autor"];
	$quantidadedenuncias = $_POST["quantidadedenuncias"];
        $resultado = Topico::cadastrarTopico($nomeusuario, $codigo, $titulo, $tema, $conteudo, $respostas, $datapublicacao, $autor, $quantidadedenuncias);
       
	if ($resultado) {
            echo "<p>Tópico de Discussão Cadastrado!</p>";
        } else {
            echo "<p>Houve algum erro! Tente novamente.</p>";
        }

    }



    include "Material.php";

    if (isset($_POST["nomeusuario"]) && isset($_POST["titulo"]) && isset($_POST["tema"]) && isset($_POST["genero"]) && isset($_POST["conteudo"]) && isset($_POST["datapublicacao"]) && isset($_POST["quantidadedenuncias"])) {
        $nomeusuario = $_POST["nomeusuario"];
        $titulo = $_POST["titulo"];
	$tema = $_POST["tema"];
	$genero = $_POST["genero"];
	$conteudo = $_POST["conteudo"];
	$datapublicacao = $_POST["datapublicacao"];
	$quantidadedenuncias = $_POST["quantidadedenuncias"];
        $resultado = Material::cadastrarMaterial($nomeusuario, $titulo, $tema, $genero, $conteudo, $datapublicacao, $quantidadedenuncias);
       
	if ($resultado) {
            echo "<p>Material Cadastrado!</p>";
        } else {
            echo "<p>Houve algum erro! Tente novamente.</p>";
        }

    }



    include "Denuncia.php";

    if (isset($_POST["nomeusuario"]) && isset($_POST["justificativa"]) && isset($_POST["datapublicacao"]) && isset($_POST["horapublicacao"])) {
        $nomeusuario = $_POST["nomeusuario"];
	$justificativa = $_POST["justificativa"];
	$datapublicacao = $_POST["datapublicacao"];
	$horapublicacao = $_POST["datapublicacao"];
	$resultado = Denuncia::cadastrarDenuncia($nomeusuario, $justificativa, $datapublicacao, $horapublicacao);

	if ($resultado) {
            echo "<p>Denuncia Cadastrada!</p>";
        } else {
            echo "<p>Houve algum erro! Tente novamente.</p>";
        }

    }



    include "Comentario.php";

    if (isset($_POST["nomeusuario"]) && isset($_POST["conteudo"]) && isset($_POST["autor"]) && isset($_POST["datapublicacao"]) && isset($_POST["horapublicacao"]) && isset($_POST["quantidadedenuncias"]) && isset($_POST["codigo"])) {
        $nomeusuario = $_POST["nomeusuario"];
	$conteudo = $_POST["conteudo"];
	$autor = $_POST["autor"];
	$datapublicacao = $_POST["datapublicacao"];
	$horapublicacao = $_POST["horapublicacao"];
	$quantidadedenuncias = $_POST["quantidadedenuncias"];
	$codigo = $_POST["codigo"];
        $resultado = Comentario::cadastrarComentario($nomeusuario, $conteúdo, $autor, $datapublicacao, $horapublicacao, $quantidadedenuncias, $codigo);
       
	if ($resultado) {
            echo "<p>Comentário Cadastrado!</p>";
        } else {
            echo "<p>Houve algum erro! Tente novamente.</p>";
        }

    }



    ?>

 

    <form method="POST">
        <p>Informe seu nome:</p>
        <input type="text" name="nome" required>
	<p>Informe seu gênero:</p>
        <input type="radio" name="sexo" value="M" checked>Masculino<br>
        <input type="radio" name="sexo" value="F">Feminino<br>
	<input type="radio" name="sexo" value="Outro" checked>Outro<br>
	<p>Escreva uma biografia (opcional):</p>
        <input type="text" name="biografia" required>
	<p>Informe seu e-mail:</p>
        <input type="text" name="email" required>
	<p>Crie uma senha:</p>
        <input type="text" name="senha" required>
	<p>Crie um nome de usuario:</p>
        <input type="text" name="nomeusuario" required>
        <button>Cadastrar</button>
    </form>



    <br>



    <table border="1">

        <thead>

            <tr>
                <th>Nome</th>
                <th>Gênero</th>
                <th>Biografia</th>
                <th>E-mail</th>
                <th>Nome de usuário</th>
            </tr>

        </thead>

        <tbody>

            <?php

            $usuarios = Usuario::retornarUsuario();
            for ($i = 0; $i < count($usuarios); $i++) {
                echo "<tr>";
                echo "<td>" . $usuarios[$i]["nome"] . "</td>";
		echo "<td>" . $usuarios[$i]["genero"] . "</td>";
		echo "<td>" . $usuarios[$i]["biografia"] . "</td>";
		echo "<td>" . $usuarios[$i]["email"] . "</td>";
		echo "<td>" . $usuarios[$i]["nomeusuario"] . "</td>";
                $id = $usuarios[$i]["id"];
                echo "<td></td>";                
                echo "<td><a href='deletar.php?id=$id'>Deletar</a></td>";
                echo "</tr>";
            }

            ?>

        </tbody>

    </table>

    <?php

    ?>



</body>

</html>