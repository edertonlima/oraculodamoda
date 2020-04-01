<?php
	include("includes/header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php
	$title = '';
	$keywords = '';
	$pagAtiva = $_GET['id'];
?>
<?php include("includes/head.php");?>

<?php $category = get_queried_object(); ?>

<?php get_header(); ?>

</head>

<body class="lisArtigo<?php echo ' '.$pagAtiva; ?>" <?php echo $bg; ?> >

	<!-- GOOGLE ANALYTICS -->
	<?php //include("includes/analytics.php");?>
	
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
							<h2><?php echo $category->name; ?></h2>
						</div>
					</li>
				</ul>

					<?php
						if(have_posts()){ ?>

					<div class="lisArtigoMais">						
						<ul>
<?php
							$i = 1;
							while ( have_posts() ) : the_post();
								$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mini-post' );
?>
								<li<?php if(!($i%3)){ echo ' class="ultimo"'; } ?>>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

										<?php if($imagem[0]){ ?>
											<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" />
										<?php } ?>

										<p><strong><?php echo $category->name; ?></strong><?php the_title(); ?></p>
										<span></span>
									</a>
								</li>
<?php
								
								$i = $i+1;
							endwhile;
?>
						</ul>
						<!--<a href="lisCategoria.php" title="" class="vejaMais">ver todos</a>-->
					
					</div>
<?php
				}else{
?>
					<p>Nenhum conteúdo encontrado.</p>
<?php
				}
?>

				<!-- PUBLICIDADE -->
				<?php include('includes/publicidadeColEsq.php'); ?>
			
			</div>
			
			<!-- COLUNA DIREITA -->
			<div class="colDireita">
				
				<!-- PUBLICIDADE -->
				<?php 
					$qtdPublicidade = 1;
					//include('includes/publicidadeColDir.php'); 
				?>
				
				<!-- MAIS ARTIGOS -->
				<?php
					//include('includes/categorias.php');
				?>
				
				<!-- SOBRE A AUTORA -->
				<?php //include('includes/sobre.php'); ?>
				
				<!-- ANUNCIE AQUI -->
				<?php //include('includes/anuncie.php'); ?>
				
				<!-- PUBLICIDADE -->
				<div class="boxDir publicidadeDir">
					<?php 
						$qtdPublicidade = 3;
						//include('includes/publicidadeColDir.php'); 
					?>
				</div>
			
			</div>
		</div>
    </div>

	<!-- RODAPE -->
	<?php include("includes/rodape.php");?>
	<?php include("includes/footer.php");?>

	<?php get_footer(); ?>

</body>
</html>