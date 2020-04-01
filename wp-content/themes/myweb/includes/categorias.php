<div class="boxDir">
	<h3>+ Categorias</h3>
	
<?php
	$selectCategorias = selectCategorias();
	if(($selectCategorias == true) and (count($selectCategorias) > 0)){
?>
		<ul class="maisCategorias">
<?php
			foreach($selectCategorias as $categorias){
				$class = '';
				if($categorias['id_catArtigo'] == $_GET['id']){
					$class = 'class="ativo"';
				}
?>
				<li><a href="lisArtigo.php?id=<?php echo $categorias['id_catArtigo']; ?>" <?php echo $class; ?> title="<?php echo $categorias['nome_catArtigo']; ?>"><?php echo $categorias['nome_catArtigo']; ?></a></li>
<?php
			}
?>
		</ul>
<?php
	}
?>
</div>