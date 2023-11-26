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
    <title>VIPTEAMMOD HUKUM DOWNLOAD</title>
    <style>
  
      h2{text-align: center ;}
      h2{color: red;}
      h3{text-align: center;}
      h3{color: white;}
      h3{background-color:red;}
      h4{text-align: center;}
      h4{background-color: red;}
      h4{color:white;}
      h5{text-align: center;}
      h5{background-color: red;}
      h5{color:white;}
      
    </style>
    <body>

		  
      <h2><font size ="5x" >🎶VIPTEAMMOD HUKUM SONG DOWNLOAD🎶</h2>

<hr color ="red" size = "2x"

<br> 

<h3><font size = "3x" >✨SONGNAME : HUKUM✨</h3>

<br>

<hr color ="red" size ="2x"

<br>
<h6><font size ="3x" >HUKUM MUSIC PLAY</h6>
 <audio controls>
        <source src="/songs/Hukum.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
<br>
<br>
<hr color ="black" size ="2x"
<br>
<br>
<h5> <a href="/songs/Hukum.mp3"download><font color="white" size = "4x">✅CLICK TO SONG DIRECT DOWNLOAD✅</h5> 

<br>

<hr color ="red" size = "2x"

<br>

<h4> <a href="VipTeamModMovies.php"><font color="white" size = "4x">↪️GO TO HOME PAGE↩️</h4>