<?php

$email = $_POST['email'];
$nome = $_POST['nome'];
$coment = $_POST['coment'];


if(empty($email and $coment)){
	echo "Por favor, insira os campos corretamente!";
} else {
	
	$sql = "insert into mensagem (email, nome, descricao) values ('$email', '$nome', '$coment');";
	
	// Definindo as variáveis do banco
	$host = "localhost";
	$user = "root";
	$pass = "aluno";
	$banco = "la_tribonera";
	
	// criando uma conexão
	$connect = new mysqli ($host, $user, $pass, $banco );

	// executando o insert
	$connect -> query($sql);

	echo "Sucesso";
	
	echo "<button>"; 
	echo "<a href='fale.php'>Voltar</a>";
	echo "</button>";
	
	
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = $email;
    $to = "latribonera@gmail.com";
    $subject = "Fale Conosco";
    $message = $coment;
    $headers = "From: " . $from;
    mail($to,$subject,$message, $headers);
    echo "Enviado com sucesso!";

	
}


?>