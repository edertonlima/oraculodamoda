<?php
	function selectPagina($id){ 
		if($id != ""){
			$where = "WHERE id_institucional = '" . $id . "'";
		}else{
			$where = "";
		}
		if($conn = conexao()){
			$selectPagina = "SELECT * FROM institucional ". $where ." ORDER BY nome_institucional";
			if($query = mysql_query($selectPagina)){
				if(mysql_num_rows($query) > 0){
					$selecao = mysql_fetch_assoc($query);							
					return $selecao;			
					closeConecao($conn);
				}else { return false; }	
			}else{ return false; }
		}
	}
	
	/* SELECT ARTIGOS */
	function selectArtigo($id){
		
		if(!$id){
			$query = "SELECT ca.id_catArtigo, ca.nome_catArtigo, a.id_artigo, a.catArtigo_id_catArtigo, a.nome_artigo, a.data_artigo, a.descricao_artigo, a.conteudo_artigo FROM artigo a JOIN catArtigo ca ON a.catArtigo_id_catArtigo = ca.id_catArtigo WHERE ((a.status_artigo = 1) && (ca.id_catArtigo != 1) && (ca.id_catArtigo != 9) && (ca.id_catArtigo != 12) && (ca.id_catArtigo != 13)) ORDER BY data_artigo DESC LIMIT 0,2";
		}else{
			$query = "SELECT ca.id_catArtigo, ca.nome_catArtigo, a.id_artigo, a.catArtigo_id_catArtigo, a.nome_artigo, a.data_artigo, a.descricao_artigo, a.conteudo_artigo FROM artigo a JOIN catArtigo ca ON a.catArtigo_id_catArtigo = ca.id_catArtigo WHERE id_artigo = ".$id;
		}
		
		if(conexao()){
			if($querySelect = mysql_query($query)){
				if(mysql_num_rows($querySelect) > 0){
					$selecao = array();
					while($linhaSelecao = mysql_fetch_assoc($querySelect)){
						$selecao[] = $linhaSelecao;
					}	
					return $selecao;
				}
				
			}else{ echo 'PROBLEMA NO SELECT';}
		}else{ echo 'PROBLEMA NA CONEXÃO';}
	}
	/* FIM -> SELECT ARTIGOS */
	
	
	/* SELECT MAIS ARTIGOS */
	function selectMaisArtigo(){
		
		$query = "SELECT ca.nome_catArtigo, a.id_artigo, a.catArtigo_id_catArtigo, a.nome_artigo, a.descricao_artigo, i.nome_img FROM artigo a JOIN catArtigo ca ON a.catArtigo_id_catArtigo = ca.id_catArtigo JOIN img i ON i.artigo_id_artigo = a.id_artigo WHERE ((a.status_artigo = 1) && (i.tipo_img = 1)) ORDER BY a.data_artigo DESC LIMIT 3,12";
		
		if(conexao()){
			if($querySelect = mysql_query($query)){
				if(mysql_num_rows($querySelect) > 0){
					$selecao = array();
					while($linhaSelecao = mysql_fetch_assoc($querySelect)){
						$selecao[] = $linhaSelecao;
					}	
					return $selecao;
				}
				
			}else{ echo 'PROBLEMA NO SELECT';}
		}else{ echo 'PROBLEMA NA CONEXÃO';}
	}
	/* FIM -> SELECT MAIS ARTIGOS */
	
	
	/* SELECT ARTIGOS POR CATEGORIA */
	function selectArtigoCat($cat,$qtd){
		
		if($qtd!=''){
			$query = "SELECT ca.nome_catArtigo, a.id_artigo, a.catArtigo_id_catArtigo, a.nome_artigo, a.descricao_artigo, i.nome_img FROM artigo a JOIN catArtigo ca ON a.catArtigo_id_catArtigo = ca.id_catArtigo JOIN img i ON i.artigo_id_artigo = a.id_artigo WHERE ((a.catArtigo_id_catArtigo = ".$cat.") && (a.status_artigo = 1) && (i.tipo_img = 1)) ORDER BY a.data_artigo DESC LIMIT 0,".$qtd;
		}else{
			$query = "SELECT ca.nome_catArtigo, a.id_artigo, a.nome_artigo, a.descricao_artigo, i.nome_img FROM artigo a JOIN catArtigo ca ON a.catArtigo_id_catArtigo = ca.id_catArtigo JOIN img i ON i.artigo_id_artigo = a.id_artigo WHERE ((a.catArtigo_id_catArtigo = ".$cat.") && (a.status_artigo = 1) && (i.tipo_img = 1)) ORDER BY a.data_artigo DESC";
		}
		
		if(conexao()){
			if($querySelect = mysql_query($query)){
				if(mysql_num_rows($querySelect) > 0){
					$selecao = array();
					while($linhaSelecao = mysql_fetch_assoc($querySelect)){
						$selecao[] = $linhaSelecao;
					}	
					return $selecao;
				}
				
			}else{ echo 'PROBLEMA NO SELECT';}
		}else{ echo 'PROBLEMA NA CONEXÃO';}
	}
	/* FIM -> SELECT ARTIGOS */
	
	
	/* SELECT IMG ARTIGOS */
	function selectImgArtigo($id,$status){
		if($status){
			$query = "SELECT * FROM img WHERE ((artigo_id_artigo = ".$id.") && (tipo_img = ".$status."))";
		}else{
			$query = "SELECT * FROM img WHERE artigo_id_artigo = ".$id;
		}
		
		if(conexao()){
			if($querySelect = mysql_query($query)){
				if(mysql_num_rows($querySelect) > 0){
					$selecao = array();
					while($linhaSelecao = mysql_fetch_assoc($querySelect)){
						$selecao[] = $linhaSelecao;
					}	
					return $selecao;
				}
				
			}else{ echo 'PROBLEMA NO SELECT';}
		}else{ echo 'PROBLEMA NA CONEXÃO';}
	}
	/* FIM -> SELECT IMG ARTIGOS */
	
	
	/* SELECT CATEGORIAS */
	function selectCategorias(){
		$query = "SELECT * FROM catArtigo WHERE status_catArtigo = 1";
		
		if(conexao()){
			if($querySelect = mysql_query($query)){
				if(mysql_num_rows($querySelect) > 0){
					$selecao = array();
					while($linhaSelecao = mysql_fetch_assoc($querySelect)){
						$selecao[] = $linhaSelecao;
					}	
					return $selecao;
				}
				
			}else{ echo 'PROBLEMA NO SELECT';}
		}else{ echo 'PROBLEMA NA CONEXÃO';}
	}
	/* FIM -> SELECT CATEGORIAS */
	
	
	/* SELECT NOME CATEGORIA */
	function nomeCategoria($id){
		$query = "SELECT nome_catArtigo FROM catArtigo WHERE id_catArtigo = ".$id;
		
		if(conexao()){
			if($querySelect = mysql_query($query)){
				if(mysql_num_rows($querySelect) > 0){
					$linhaSelecao = mysql_fetch_assoc($querySelect);
					return $linhaSelecao['nome_catArtigo'];
				}
				
			}else{ echo 'PROBLEMA NO SELECT';}
		}else{ echo 'PROBLEMA NA CONEXÃO';}
	}
	/* FIM -> SELECT NOME CATEGORIA  */
	
	
	/* FORMATA DATA */
	function mes($m){
		if($m<10){ $m = substr($m, 1, 2); }
		
		$mes[1] = 'janeiro';
		$mes[2] = 'fevereiro';
		$mes[3] = 'março';
		$mes[4] = 'abril';
		$mes[5] = 'maio';
		$mes[6] = 'junho';
		$mes[7] = 'julho';
		$mes[8] = 'agosto';
		$mes[9] = 'setembro';
		$mes[10] = 'outubro';
		$mes[11] = 'novembro';
		$mes[12] = 'dezembro';

		return $mes[$m];
	}
	function formataData($dataAnt) {
		$newData = explode('-', $dataAnt);
		$data['d'] = $newData[2];
		$data['m'] = mes($newData[1]);
		$data['a'] = $newData[0];

		return $data;
	}
	/* FIM -> FORMATA DATA */
	
?>