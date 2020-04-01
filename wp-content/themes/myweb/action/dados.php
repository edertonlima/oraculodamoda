<?php	

	$URLsite = "";
	$URLhttp = "lab.edesignn.com.br/oraculodamoda";
		
	include('conexao.php');
	
	// SELECT TITULO
	/*
	function titulo(){
		
		$selectDados = "SELECT info_nome FROM informacao";
		
		if($conn = conexao()){
			if($query = mysql_query($selectDados)){		
				if(mysql_num_rows($query) > 0){
										
					$selecao = mysql_fetch_assoc($query);		
					return $selecao['info_nome'];					
					closeConecao($conn);
			
				}else { return false; }								
			}else{ return false; }			
		}		 
	}
	// FIM SELECT TITULO
	*/
	
	/*
	$nome = $_SESSION['nome'];
	if(!isset($nome)){
		$_SESSION['nome'] = titulo('');
	}
	*/
	
	$dados = array();
	
	$dados['usuarioId'] = $usuarioId;
	$dados['usuario'] = $usuario;
	$dados['usuarioSenha'] = $usuarioSenha;
	$dados['usuarioEmail'] = $usuarioEmail;
	$dados['nome'] = $nome;
	$dados['URLsite'] = $URLsite;
	$dados['servidor'] = $servidor;
	$dados['banco'] = $banco;
	$dados['bancoUsuario'] = $bancoUsuario;
	$dados['senhaUsuario'] = $senhaUsuario;
	
?>