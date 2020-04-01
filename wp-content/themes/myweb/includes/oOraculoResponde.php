<?php 
	$artigo = selectArtigoCat(1,1);
	if(($artigo == true) and (count($artigo) > 0)){
?>
		<div class="boxDir">
			<h3><?php echo $artigo[0]['nome_catArtigo']; ?></h3>
			<a href="detArtigo.php?id=<?php echo $artigo[0]['id_artigo']; ?>" title="Batalha de Looks ->">
				<img src="img/banco/artigo/<?php echo $artigo[0]['id_artigo']; ?>/<?php echo $artigo[0]['nome_img']; ?>" alt="<?php echo $artigo[0]['nome_artigo']; ?> ->" />
				<p><strong><?php echo $artigo[0]['nome_artigo']; ?></strong><?php echo $artigo[0]['descricao_artigo']; ?></p>
			</a>
		</div>
<?php
	}else{
?>
		<div class="boxDir">
			<h3>O Oráculo responde</h3>
			<p>Nenhum artigo encontrado</p>
		</div>
<?php
	}
?>