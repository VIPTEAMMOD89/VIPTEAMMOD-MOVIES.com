<?php
// Conexão
require_once 'DB.php';

// Sessão
session_start();

// Botão enviar
if(isset($_POST['btn-entrar'])):
	$erros = array();
	$login = mysqli_escape_string($conn, $_POST['login']);
	$senha = mysqli_escape_string($conn, $_POST['senha']);

	if(isset($_POST['lembrar-senha'])):

		setcookie('login', $login, time()+3600);
		setcookie('senha', md5($senha), time()+3600);
	endif;

	if(empty($login) or empty($senha)):
		$erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
	else:
		// 105 OR 1=1 
	    // 1; DROP TABLE teste

		$sql = "SELECT login FROM usuarios WHERE login = '$login'";
		$resultado = mysqli_query($conn, $sql);		

		if(mysqli_num_rows($resultado) > 0):
		$senha = md5($senha);       
		$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";



		$resultado = mysqli_query($conn, $sql);

			if(mysqli_num_rows($resultado) == 1):
				$dados = mysqli_fetch_array($resultado);
				mysqli_close($conn);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $dados['id'];
				header('Location: painel2.php');
			else:
				$erros[] = "<li> Usuário e senha não conferem </li>";
			endif;

		else:
			$erros[] = "<li> Usuário inexistente </li>";
		endif;

	endif;

endif;
?>










<!DOCTYPE html>
<html>
  <head>
    <title>VIPTEAMMOD TAMIL 2023 MOVIES</title>
    <style>
  
      h2{text-align: center ;}
      h2{color: red;}
      h3{text-align: center ;}
      h3{color: red;}
      h4{text-align: center;}
      h4{background-color: red;}
    </style>
    <body>

		  
      <h2><font size ="5x" >VIPTEAMMOD TAMIL 2023 MOVIES</h2>
<div class="f"> <img src="/img/dir.gif" alt="[+]" /> <a href="leod.php"><font color ="blue" size ="3x">LEO</a> </div>

<br>

<div class="f"> <img src="/img/dir.gif" alt="[+]" /> <a href="leod.php"><font color ="blue" size ="3x">JAILER</a>
</div>

<br>

<div class="f"> <img src="/img/dir.gif" alt="[+]" /> <a href="https://www.1madrasrockers.world/"><font color ="blue" size ="3x">K.G.F CHAPTER 3</a>
</div>

<br>

<div class="f"> <img src="/img/dir.gif" alt="[+]" /> <a href="https://tamilkolly.com/"><font color ="blue" size ="3x" >MAMMANNAN</a>
</div>




<hr color ="red" size = "1x"

<br>


<h4> <a href="VipTeamModMovies.php"><font color="white" size = "4x">GO TO HOME PAGE</h4> 