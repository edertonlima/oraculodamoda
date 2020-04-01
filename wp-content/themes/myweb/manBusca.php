<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php
	$title = '';
	$keywords = '';
	$pagAtiva = '';
?>
<?php include("includes/head.php");?>

</head>

<body class="lisArtigo<?php echo ' '.$pagAtiva; ?>" <?php echo $bg; ?> >

	<!-- GOOGLE ANALYTICS -->
	<?php include("includes/analytics.php");?>
	
	<!-- TOPO -->
	<?php include("includes/topo.php");?>

	<!-- CONTEÚDO -->
	<div class="container">
		<div class="Artigo">
	
			<!-- COLUNA ESQUERDA -->
			<div class="colEsquerda">
			
				<ul class="lisArtigoDet">

					<li>
						<div class="titArtigo">
							<h2>Buscar por: moda inverno</h2>
						</div>
					</li>
					
				</ul>
				
				<!-- MAIS ARTIGOS -->
				<div class="lisArtigoMais">
					
					<ul>
<?php
						for($i=1; $i<=9; $i++){
?>
							<li<?php if(!($i%3)){ echo ' class="ultimo"'; } ?>>
								<a href="detArtigo.php" title="">
									<img src="img/banco/img_maisArtigo.jpg" alt="" />
									<p><strong>Inovações nos Tecidos Fizeram Milagres</strong></p>
									<span></span>
								</a>
							</li>
<?php
						}
?>					
					</ul>
					<a href="" title="" class="vejaMais">ver mais</a>
				
				</div>
				
				<!-- PUBLICIDADE -->
				<?php include('includes/publicidadeColEsq.php'); ?>
			
			</div>
			
			<!-- COLUNA DIREITA -->
			<div class="colDireita">
				
				<!-- PUBLICIDADE -->
				<?php 
					$qtdPublicidade = 1;
					include('includes/publicidadeColDir.php'); 
				?>
				
				<!-- MAIS ARTIGOS -->
				<?php
					include('includes/categorias.php');
				?>
				
				<!-- SOBRE A AUTORA -->
				<?php include('includes/sobre.php'); ?>
				
				<!-- ANUNCIE AQUI -->
				<?php include('includes/anuncie.php'); ?>
				
				<!-- PUBLICIDADE -->
				<div class="boxDir publicidadeDir">
					<?php 
						$qtdPublicidade = 3;
						include('includes/publicidadeColDir.php'); 
					?>
				</div>
			
			</div>
		</div>
    </div>

	<!-- RODAPE -->
	<?php include("includes/rodape.php");?>
	<?php include("includes/footer.php");?>

</body>
</html>