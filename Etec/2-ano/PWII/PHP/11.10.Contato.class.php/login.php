<?php
session_start();
require 'Contato.class.php';

if(isset($_POST['email']) && !empty($_POST['email'])){
	$nome  = $_POST['nome'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);

	$contato = new Contato();
	
	$chkUser = $contato->checkUser($email);

	if(!empty($chkUser)){
		$chkPass = $contato->checkPass($email, $senha);
		if(!empty($chkPass)){
			$_SESSION['nome'] =  $chkPass['nome'];
			header("location:index.php");
		}else{
			?>
			<script>
				var resultado = confirm("Usuario ou senha inválidos!\nClique OK para voltar para o login");
				if (resultado == true){
					window.location.replace('login.php')
				}
			</script>
			<?php  
		}
	}else{
		?>
		<script>
			var resultado = confirm("Usuario NÃO cadastrado!\nClique OK para Cadastrar");
			if (resultado == true){
				window.location.replace('login.php')
			}
		</script>
		<?php  
	}
}
?>
<!DOCTYPE html>
<head>
	<script src="js/acesso.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Login 3</title>
</head>
<body>	
	<div class = "topo verde">	
		<div class = "data verde borda" >
			<script>
				acesso();
			</script>	
		</div>
		<spam class="fonte">Logomarca
	</div>	
	<div class="container">
		<div class = "centraliza">
			<h3 style="text-align: center;">Login</h3>
			<form class = "form" method="post">
			<label for="nome"><b>Nome:</b></label>
                    <input type="text" name="nome" placeholder="Informe seu nome..." required>

                    <label for="email"><b>Email:</b></label>
                    <input type="text" name="email" placeholder="Informe seu email..." required>

                    <label for="senha"><b>Senha:</b></label>
                    <input type="password" name="senha" placeholder="Informe sua senha..." required><br><br>

				<p><a href="forgotpass.html" class="esqueceu">Esqueceu a senha?</a>
				<a href='cadastrar.php' class = "esqueceu">Cadastrar Novo Usuario</a></p><br><br>
				<input type="submit" name="botao" value="Enviar Dados" class = "botao">
			</form>
		</div>
	</div>
</body>
</html>
