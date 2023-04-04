<?php
	require_once 'CLASSES/Usuarios.php';
	$u=new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>Cadastar</title>
	<link rel="stylesheet" href="CSS/estilo1.css">
</head>
<body>
<div id="corpo-form">
<h1>Entrar</h1>
	<form method="POST">
		<input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
		<input type="text" name="telefone" placeholder="Telefone" maxlength="30">
		<input type="email" name="email" placeholder="Usuario ou email" maxlength="40">
		<input type="passaword" name="senha" placeholder="Senha" maxlength="15">
		<input type="passaword" name="confsenha" placeholder="Confirma Senha" maxlength="30">
		<input type="submit" value="Cadastrar">
	</form>
	</div>
	<?php
	//verificar se clicou no botao cadastrar
	if(isset($_POST['nome']))
	{
		$nome=addslashes($_POST['nome']);
		$telefone=addslashes($_POST['telefone']);
		$email=addslashes($_POST['email']);
		$senha=addslashes($_POST['senha']);
		$confirmarSenha=addslashes($_POST['confsenha']);
		//verifica se esta preenchido e addslashes impede rackers
		if (!empty($nome) && !empty($telefone) && !empty($email) && !empty(
			$senha) && !empty($confirmarSenha))
		{
			$u->conectar("296657","localhost","root","usbw");
			if ($u->msgErro == "")//se esta vazio tudo ok
			{
				if($senha==$confirmarSenha)
				{
					if($u->cadastrar($nome, $telefone, $email, $senha))
					{
						?>
						<div id="msg-sucesso">
						Cadastrado com sucesso! Acesse pra Entrar!
						</div>
						<?php
					}
					else
					{
						?>
						<div class="msg-erro">
						Email ja Cadastrado!
						</div>
						<?php
					}
				}
				else
					{					
					?>
					<div class="msg-erro">
					Senha e confirmar Senha não é igual!
					</div>
					<?php
					}
				}
			}
			else
			{
				?>	
			<div class="msg-erro">
			<?php echo "Erro: ".$u->msgErro; ?>
			</div>
			<?php
			}
		}
		else
		{		
			?>	
			<div class="msg-erro">
			Preencha todos os campos!
			</div>
			<?php
		}		
	?>
</body>
</html>