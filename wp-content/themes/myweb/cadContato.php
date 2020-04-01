<?php
	include("includes/header.php");
	$selectConteudo = selectPagina(3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php
	$title = '';
	$keywords = '';
	$pagAtiva = 'cadContato';
?>
<?php include("includes/head.php");?>

</head>

<body class="<?php echo $pagAtiva; ?>" <?php echo $bg; ?> >

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
							<h2><?php echo $selectConteudo['nome_institucional']; ?></h2>
						</div>
					</li>
					
				</ul>				
				
				<!-- CONTEÚDO AC -->
				<div class="contAC">
					<?php echo $selectConteudo['conteudo_institucional']; ?>
				</div>
				
				<form action="cadContato.php" method="post" id="cadContato">
					<fieldset>
						<input type="text" value="Nome" name="nome" id="nome" />
						<input type="text" value="E-mail" name="email" id="email" />
						<textarea name="mensagem" id="mensagem">Insira sua mensagem aqui</textarea>
						<button type="submit">Enviar</button>
					</fieldset>
				</form>
				
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