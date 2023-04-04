<?php
require_once 'CLASSES/Usuarios.php';
$u = new Usuario;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>Login</title>
	<link rel="stylesheet" href="CSS/estilo1.css">
</head>
<body>
<div id="corpo-form">
<h1>Entrar</h1>
	<form method="POST" >
		<input type="email" name="email" placeholder="Usuario">
		<input type="passaword" name="senha" placeholder="Senha">
		<input type="submit" value="ACESSAR">
		<a href="Cadastrar.php">Ainda não é inscrito?<strong> Cadastre-se!</strong></a>
	</form>
	</div>
	<?php
	if(isset($_POST['email']))
	{
		
		$email=addslashes($_POST['email']);
		$senha=addslashes($_POST['senha']);
		
		if (!empty($email) && !empty($senha))
		{
			$u->conectar("296657","localhost","root","usbw");
			if ($u->msgErro == "")//se esta vazio tudo ok

			if ($u ->logar($email, $senha))
			{
				header("location: AreaPrivada.php");
			}
			else
			{
				?>
				<div class="msg-erro">
				Email ou senha estão incorretos!
				</div>
				<?php
			}
			else
			{
				echo "Erro: ".$u->msgErro;
			}

		}else
		{
			?>
			<div class="msg-erro">
				Preencha todos os campos
			</div>
			<?php
		}
	}	
	?>
</body>
</html>