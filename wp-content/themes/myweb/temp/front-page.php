<?php get_header(); ?>

<!-- slide --> 
<section class="box-content box-slide"> 
	<?php include 'slide.php'; ?>
</section>

<?php
	$receitas_list = array(
			'posts_per_page' => 10,
			'post_type' => 'receitas'
		);
	query_posts( $receitas_list );

	if(have_posts()){ 
		$imagem_receita = get_field('imagem_bloco_principal_receitas','option'); ?>

		<section class="box-content list-receita">
			<div class="bloco-img title-top" style="background-image: url('<?php echo $imagem_receita['sizes']['wide']; ?>');">
				<a href="<?php echo get_home_url(); ?>/receitas"><h2 class="center bg-cor2">RECEITAS</h2></a>
			</div>

			<div class="container mobile-750px-hide">
				<h3 class="center uppercase"><strong class="cor2">EXPLORE</strong> nossas receitas e descubra sabores sem igual!</h3>
					
				<div class="carousel-itens owl-carousel owl-theme owl-loaded">
					<div class="owl-stage-outer">
						<div class="owl-stage">

							<?php while ( have_posts() ) : the_post(); ?>
								<div class="owl-item">
									<?php get_template_part( 'content-receita', get_post_format() ); ?>
								</div>
							<?php endwhile;
							wp_reset_query(); ?>
								
						</div>
					</div>
				</div>	
			</div>
		</section>

	<?php }
?>

<section class="box-content list-linha-prod">
	<?php $imagem_produtos = get_field('imagem_bloco_principal_produtos','option'); ?>

	<div class="bloco-img title-top" style="background-image: url('<?php echo $imagem_produtos['sizes']['wide']; ?>');">
		<a href="<?php echo get_home_url(); ?>/produtos">
			<h2 class="title-mini center bg-cor3 mobile-750px-hide">LINHA DE PRODUTOS</h2>
			<h2 class="title-mini center bg-cor3 mobile-750px-show">PRODUTOS</h2>
		</a>
	</div>

	<div class="container mobile-750px-hide">
		<a href="<?php echo get_home_url(); ?>/produtos">
			<h3 class="center uppercase">Conheça nossa <strong class="cor3">LINHA COMPLETA</strong> de produtos daBoa!</h3>
		</a>

		<div class="row">
			<?php 
				$category = get_terms( array(
				    'taxonomy' => 'category',
				    'hide_empty' => false
				) );

				shuffle( $category );
				$qtd_linha = 0;

				if($category){ 
					foreach ($category as $key => $categoria) { //print_r($categoria);
						$qtd_linha = $qtd_linha+1; 
						if ($qtd_linha <= 2) { ?>
						 	
							<div class="col-6">
								
								<div class="carousel-itens-produtos owl-carousel owl-theme owl-loaded bg-cinza">
									<div class="owl-stage-outer">
										<div class="owl-stage">
											<?php
												$prods_categoria = get_posts(
													array(
														'post_type' => 'post',
														'category__in' => $categoria->term_id,
														'posts_per_page' => -1
													)
												);

												foreach ( $prods_categoria as $prod_categoria ) { 
													$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($prod_categoria->ID), '' ); 
													if($imagem[0]){ ?>
														<div class="owl-item">
															<a href="<?php echo get_term_link($categoria->term_id); ?>" class="hover-prod">
																<div class="vertical-center">
																	<div class="content-vertical">
																		<img src="<?php echo $imagem[0]; ?>">
																	</div>
																</div>
															</a>
														</div>
													<?php }
												}
											?>
										</div>
									</div>
								</div>

								<a href="<?php echo get_term_link($categoria->term_id); ?>">
									<h2 class="full center" style="background-color: <?php the_field('cor_categoria', $categoria->taxonomy.'_'.$categoria->term_id); ?>"><span><?php echo $categoria->name; ?></span></h2>
								</a>

							</div>

						<?php }
					}
				}
			?>
		</div>		
	</div>
</section>

<section class="box-content">
	<div class="container container-mobile">

		<?php
			$imagem = wp_get_attachment_image_src( get_post_thumbnail_id(get_page_by_path('contato')), 'detalhe-post-page' ); 
		?>

		<div class="bloco-img grande title-bottom block-img-hide" style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');">
			<h2 class="center bg-cor5">FALE CONOSCO</h2>
		</div>

		<h3 class="mobile-750px-hide center">Dúvidas ou sugestões, entre em <strong class="cor5">CONTATO</strong> preenchendo esse formulário, ou fale conosco via telefone ou e-mail.</h3>
		<h3 class="mobile-750px-show center">Dúvidas ou sugestões, entre em contato:</h3>

		<div class="content form">
			<form class="fale-conosco">
				<div class="row">
					<div class="col-6 esq">
						<fieldset>
							<input type="text" name="" placeholder="NOME">
						</fieldset>

						<fieldset>
							<input type="text" name="" placeholder="TELEFONE">
						</fieldset>

						<fieldset>
							<input type="text" name="" placeholder="E-MAIL">
						</fieldset>

						<fieldset>
							<input type="text" name="" placeholder="ASSUNTO">
						</fieldset>
					</div>

					<div class="col-6 dir">
						<fieldset>
							<textarea name="" placeholder="MENSAGEM"></textarea>
						</fieldset>
						<fieldset>
							<button class="enviar">ENVIAR</button>
						</fieldset>
					</div>
				</div>
			</form>
		</div>

	</div>
</section>


<?php get_footer(); ?>

<!-- CAROUSEL -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>

<script type="text/javascript">
	$('.carousel-itens').owlCarousel({
		loop:true,
		margin:40,
		responsiveClass:true,
		nav:true,
		navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
		//rtl:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:2,
				nav:false
			},
			1000:{
				items:2,
				nav:true,
				loop:false
			}
		}
	})

	$('.carousel-itens-produtos').owlCarousel({
		loop:true,
		margin:0,
		responsiveClass:true,
		nav:true,
		navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
		//rtl:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:1,
				nav:false
			},
			1000:{
				items:1,
				nav:true,
				loop:false
			}
		}
	})
</script>