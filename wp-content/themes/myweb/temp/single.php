<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); 

		//$cor = 'cor7';
		$imagem_produto = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'list-receita-produto' );
		$current_category = wp_get_post_terms( $post->ID, 'category' )[0]; 
		$current_prod = $post->ID;
		$cor_category = get_field('cor_categoria', $current_category->taxonomy.'_'.$current_category->term_id); ?>

		<style type="text/css">
			.list-receita .owl-carousel .owl-dots .owl-dot.active, 
			.owl-carousel .owl-dots .owl-dot.active {
			    background: <?php echo $cor_category; ?>
			}

			.owl-carousel .owl-nav {
				opacity: 0;
			}

			.detalhe-prod .modo-preparo .item-preparo li .txt-preparo strong {
				color: <?php echo $cor_category; ?>;
			}
		</style>
			
		<section class="box-content no-padding-top detalhe-prod">			
			<div class="bloco-img grande title-bottom" style="background-image: url('<?php the_field('imagem_principal_topo'); ?>);">
				<h2 class="center" style="background-color: <?php echo $cor_category; ?>"><span><?php the_title(); ?></span></h2>
			</div>

			<div class="container">	
				<div class="breadcrumbs">
					<ul>
						<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
						<li><a href="<?php echo get_permalink(get_page_by_path('produtos')); ?>" title="Produtos">Produtos</a></li>
						<li><a href="<?php echo get_term_link($current_category->term_id); ?>" title="<?php echo $current_category->name; ?>"><?php echo $current_category->name; ?></a></li>
						<li><?php the_title(); ?></li>
					</ul>
				</div>

				<div class="row">
					
					<div class="col-6">
						<div class="img-produto" style="border-color: <?php echo $cor_category; ?>">
							<div class="mask-item vertical-center">
								<span class="content-vertical">
									<img src="<?php if($imagem_produto[0]){ echo $imagem_produto[0]; } ?>" alt="<?php the_title(); ?>">
								</span>
							</div>
						</div>
					</div>
					<div class="col-6 no-padding cont-modo-preparo">
						<div class="modo-preparo">
							<h3 style="color: <?php echo $cor_category; ?>">Modo de Preparo: 
								<i class="fas fa-chevron-down cor7" id="toggle-preparo" style="color: <?php echo $cor_category; ?>"></i>
							</h3>
							<ul class="item-preparo">

								<?php if( have_rows('passos_modo_preparo_produto') ):
									$count_passo = 0;
									while ( have_rows('passos_modo_preparo_produto') ) : the_row(); 

										$count_passo = $count_passo+1; ?>

										<li class="bg-cinza">
											<span class="nun-preparo"><span style="background-color: <?php echo $cor_category; ?>"><?php echo $count_passo; ?></span></span>
											<img class="ico-preparo" src="<?php the_sub_field('icone_passo_modo_preparo_produto'); ?>">
											<span class="txt-preparo"><?php the_sub_field('texto_passo_modo_preparo_produto'); ?></span>
										</li>

									<?php endwhile;
								endif; ?>

							</ul>
						</div>
					</div>

				</div>
				<div class="row">

					<div class="col-6">
						<div class="img-tabela">
							<img src="<?php the_field('informacao_nutricional'); ?>">
						</div>
					</div>
					<div class="col-6">
						<div class="content ingredientes">
							<p style="color: <?php echo $cor_category; ?>"><strong class="tit-ingredientes" style="color: <?php echo $cor_category; ?>">INGREDIENTES:</strong><?php the_field('ingredientes'); ?></p>
							<p><strong style="color: <?php echo $cor_category; ?>"><?php the_field('informacoes'); ?></strong></p>
						</div>
					</div>

				</div>
			</div>
		</section>


		<?php include 'list-receita-cat.php'; ?>


		<section class="box-content no-padding padding-bottom-100 list-linha-prod">
			<?php
				$prods_categoria = get_posts(
					array(
						'post_type' => 'post',
						'category__in' => $current_category->term_id,
						'posts_per_page' => -1
					)
				); //var_dump($prods_categoria);

				if(count($prods_categoria) > 1){ ?>
				
					<div class="container">
						<h3 class="center">Veja outros produtos:</h3>
						<div class="carousel-itens-prod owl-carousel owl-theme owl-loaded owl-dots-off">
							<div class="owl-stage-outer">
								<div class="owl-stage" <?php if(count($prods_categoria) < 3){ echo 'style="margin: 0 auto;"'; }?>>

									<?php foreach ( $prods_categoria as $prod_categoria ) {
										if($prod_categoria->ID != $current_prod){

											$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($prod_categoria->ID), 'list-receita-produto' ); ?>

											<div class="owl-item">
												<a href="<?php the_permalink($prod_categoria->ID); ?>" class="hover-prod">

													<?php if($imagem[0]){ ?>
														<img src="<?php echo $imagem[0]; ?>">
													<?php } ?>
													<h2 class="full center bg-mini det-mini" style="background-color: <?php echo $cor_category; ?>"><span><?php echo $prod_categoria->post_title; ?></span></h2>
												</a>
											</div>

										<?php }
									} ?>

								</div>
							</div>
						</div>
					</div>				

				<?php }
			?>
		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>

<!-- CAROUSEL -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>

<script type="text/javascript">
	if($(window).width() < 981){
		$('#toggle-preparo').click(function(){
			if($(this).hasClass('on')){
				$('.item-preparo').slideUp();
				$(this).removeClass('on');
				$(this).removeClass('fa-flip-vertical');
			}else{
				$('.item-preparo').slideDown('show');
				$(this).addClass('on');
				$(this).addClass('fa-flip-vertical');
			}
		});
	}

	if($(window).width() > 1201){
		height_img = $('.img-produto').height();
		height_preparo = $('.modo-preparo').height();
		if((height_preparo > height_img) && (height_preparo < (height_img*1.5))){
			$('.img-produto').height(height_preparo);
		}
	}

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
			}
		}
	})

	$('.carousel-itens-prod').owlCarousel({
		loop:false,
		margin:15,
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
				nav:true
			},
			1000:{
				items:3,
				nav:true
			}
		}
	})
</script>