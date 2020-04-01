<?php
	include("includes/header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php
	$title = '';
	$keywords = '';
	$pagAtiva = 'home';
?>
<?php include("includes/head.php");?>

<?php get_header(); ?>

</head>

<body class="<?php echo $pagAtiva; ?>" <?php echo $bg; ?> >

	<!-- GOOGLE ANALYTICS -->
	<?php //include("includes/analytics.php");?>
	
	<!-- TOPO -->
	<?php include("includes/topo.php");?>

	<!-- CONTEÚDO -->
	<div class="container">
		<div class="Artigo">
	
			<!-- COLUNA ESQUERDA -->
			<div class="colEsquerda">

				<?php
					$post_list = array(
							'posts_per_page' => 2,
							'post_type' => 'post'
						);
					query_posts( $post_list );

					if(have_posts()){ ?>
						<ul class="lisArtigoDet">

							<?php while ( have_posts() ) : the_post();
								$category = wp_get_post_terms( $post->ID, 'category' )[0];
								$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'detalhe-post' );
								?>
								<li>
									<div class="titArtigo">
										<div class="dataArtigo">
											<span class="dia" style="margin: 10px 0 2px 0;"><?php echo get_the_date('d'); ?></span>
											<span class="mesAno"><?php echo get_the_date(); ?></span>
											<!--<span class="mesAno"><?php echo $data['m'].'<br>'.$data['a']; ?></span>-->
										</div>
										<h2><span class="tableCell"><span><?php the_title(); ?></span></span></h2>
										<span class="catArtigo">
											<strong><a href="<?php echo get_term_link($category->term_id); ?>" title="<?php echo $category->name; ?>"><?php echo $category->name; ?></a></strong>
										</span>
									</div>

									<?php if($imagem[0]){ ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" />
										</a>
									<?php } ?>

									<p>
										<?php echo get_the_excerpt(); ?>
										<a href="<?php the_permalink(); ?>" title="veja mais +" class="vejaMais">veja mais +</a>
									</p>
								</li>
							<?php endwhile;
							wp_reset_query(); ?>

						</ul>
					<?php }
				?>
				
				<!-- PUBLICIDADE -->
				<?php 
					$qtdPublicidade = 1;
					include('includes/publicidadeColEsq.php'); 
				?>
				
				<!-- MAIS ARTIGOS -->
<?php
					$post_list = array(
							'posts_per_page' => 10,
							'post_type' => 'post',
							//'offset' => 4
						);
					query_posts( $post_list );

					if(have_posts()){
?>
						<div class="lisArtigoMais">					
							<h3>+ artigos</h3>						
							<ul>
	<?php
								$i = 1;
								while ( have_posts() ) : the_post();
									$category = wp_get_post_terms( $post->ID, 'category' )[0];
									$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mini-post' );
	?>
									<li<?php if(!($i%3)){ echo ' class="ultimo"'; } ?>>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" />
											<p><strong><?php echo $category->name; ?></strong><?php the_title(); ?></p>
											<span></span>
										</a>
									</li>
	<?php
									$i = $i+1;
								endwhile;
								wp_reset_query();
	?>
							</ul>
							<!--<a href="lisCategoria.php" title="" class="vejaMais">ver todos</a>-->
						
						</div>
<?php
				}
?>
				
				<!-- PUBLICIDADE -->
				<?php include('includes/publicidadeColEsq.php'); ?>
			
			</div>
			
			<!-- COLUNA DIREITA -->
			<div class="colDireita">
				
				<!-- PUBLICIDADE -->
				<?php //include('includes/publicidadeColDir.php'); ?>
				
				<!-- BATALHA DE LOOKS -->
				<?php //include('includes/batalhaDeLooks.php'); ?>
				
				<!-- O QUE ESTÁ USANDO -->
				<?php //include('includes/oQueEstaUsando.php'); ?>
				
				<!-- MELHOR DO DIA -->
				<?php //include('includes/melhorDoDia.php'); ?>
				
				<!-- CERTO OU ERRADO? -->
				<?php //include('includes/certoOuErrado.php'); ?>
				
				<!-- O ORÁCULO RESPONDE -->
				<?php //include('includes/oOraculoResponde.php'); ?>
				
				<!-- SOBRE A AUTORA -->
				<?php //include('includes/sobre.php'); ?>
				
				<!-- ANUNCIE AQUI -->
				<?php //include('includes/anuncie.php'); ?>
				
				<!-- PUBLICIDADE -->
				<div class="publicidadeDir">
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
	<?php include("includes/footer.php"); ?>

	<?php get_footer(); ?>

</body>
</html>