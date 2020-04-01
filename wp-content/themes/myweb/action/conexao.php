<?php

	// SQL
	function conexao(){
		
		$servidor = "bm88.webservidor.net";
		$banco = "oraculod_ac";
		$bancoUsuario = "oraculod_admin";
		$senhaUsuario = "twmiepl3qq94";
		
		$conexao = mysql_connect($servidor, $bancoUsuario, $senhaUsuario);
		
		if($conexao){
			
			if(mysql_select_db($banco)){
				mysql_query("SET NAMES 'utf8'");
				mysql_query('SET character_set_connection=utf8');
				mysql_query('SET character_set_client=utf8');
				mysql_query('SET character_set_results=utf8');
				
				mysql_set_charset('utf8');
				ini_set('default_charset','UTF-8');							
				
				return true;
				
			}else{
				
				die(trigger_error("<br>Não foi possível selecionar o banco de dados."));
				return false;
			}
			
		}else{
			
			die(trigger_error("<br>Não foi possível estabelecer conexão com servidor"));
			return false;
			
		}
	}
	
	
	function closeConecao($conn){
	
		$close = mysql_close($conn);		 
		
		if(!$close){		 
			echo "<br>Impossivel Fechar Conexao !!!<br>";
			return false;		 
		}else{
			
			return true;
		}
	 
	}	
?>