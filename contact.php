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











<html>
  <head>
    <title>VIPTEAMMOD MOVIES WEBSITES</title>
    <style>
  
      h2{text-align: center ;}
      h2{color: red;}
      h3{text-align: center ;}
      h3{color: red;}
      h4{text-align: center;}
      h4{background-color: red;}
    </style>
    <body>

		  
      <h2><font size ="5x" >VIPTEAMMOD TAMIL MOVIES WEBSITES</h2>
<div class="f"> <img src="/img/dir.gif" alt="[+]" /> <a href="https://isaimini.sbs/"><font color ="red" >ISAIMINI VIP SERVER</a> </div>



<div class="f"> <img src="/img/dir.gif" alt="[+]" /> <a href="https://kuttymovies1.com/"><font color ="green" >KUTTYMOVIES SERVER</a>
</div>

<div class="f"> <img src="/img/dir.gif" alt="[+]" /> <a href="https://www.1madrasrockers.world/"><font text-align="center" ><font color ="blue">MADRAS ROCKERS SERVER</a>
</div>

<div class="f"> <img src="/img/dir.gif" alt="[+]" /> <a href="https://tamilkolly.com/"><font color ="darkblack" >TAMIL KOLLY SERVER</a>
</div>

<hr color ="red" size = "1x"

<br>

<h3><font size ="5x" >VIPTEAMMOD DUBBED MOVIES WEBSITES</h3>


<div class="f"> <img src="/img/dir.gif" alt="[+]" /> <a href="https://isaimini.sbs/isaidub-2023-movies.html"><font color ="red" >ISAIMINI VIP DUB SERVER</a> </div>



<div class="f"> <img src="/img/dir.gif" alt="[+]" /> <a href="https://kuttymovies1.com/tamil_dubbed_movies_download"><font color ="green" >KUTTYMOVIES DUB SERVER</a>
</div>

<div class="f"> <img src="/img/dir.gif" alt="[+]" /> <a href="https://www.madrasdub.pro/"><font text-align="center" ><font color ="blue">MADRAS ROCKERS DUB SERVER</a>
</div>

<div class="f"> <img src="/img/dir.gif" alt="[+]" /> <a href="https://www.jiorockers.space/"><font color ="darkblack" >JIO ROCKERS DUB SERVER</a>
</div>

<hr color ="red" size = "1x"

<br>


<h4> <a href="VipTeamModMovies.php"><font color="white" size = "5x">GO TO HOME PAGE</h4> 