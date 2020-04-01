<?php get_header(); ?>

<!-- slide --> 
<section class="box-content box-slide no-padding-bottom"> 
	
	<?php include 'slide.php'; ?>

	<?php 
		$category = get_terms( array(
		    'taxonomy' => 'category',
		    'hide_empty' => false,
		) );

		if($category){ ?>
			<div class="list-category bg-cor3">
				<div class="container">

						<div class="carousel-list-category owl-carousel owl-theme owl-loaded">
							<div class="owl-stage-outer">
								<div class="owl-stage">

									<?php foreach ($category as $key => $categoria) { ?>
										<div class="owl-item">
											<div class="item-category <?php //if($category->term_id != 3): echo 'off'; endif; ?>">
												<a href="<?php echo get_term_link($categoria->term_id); ?>">
													<img src="<?php the_field('icone_categoria', $categoria->taxonomy.'_'.$categoria->term_id); ?>" align="">
													<span class="txt cor3"><span><?php echo $categoria->name; ?></span></span>
												</a>
											</div>
										</div>
									<?php } ?>

								</div>
							</div>
						</div>

				</div>
			</div>
		<?php }
	?>

	<div class="container">	
		<div class="breadcrumbs">
			<ul>
				<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
				<li>Produtos</li>
			</ul>
		</div>
	</div>
</section>

<section class="box-content home list-linha-prod no-padding">
	<div class="container">

		<div class="row">
			<?php 
				$category = get_terms( array(
				    'taxonomy' => 'category',
				    'hide_empty' => false
				) );

				if($category){ 
					foreach ($category as $key => $categoria) { ?>
						 	
						<div class="col-6 padding-bottom-100">
							
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
												$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($prod_categoria->ID), 'list-receita-produto' ); 
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
			?>
		</div>

	</div>
</section>

<section class="box-content no-padding padding-bottom-100"></section>

<?php get_footer(); ?>

<!-- CAROUSEL -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>

<script type="text/javascript">
	$('.carousel-list-category').owlCarousel({
		loop:false,
		margin:10,
		responsiveClass:true,
		nav:true,
		navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
		//rtl:true,
		responsive:{
			0:{
				items:2,
				nav:true
			},
			350:{
				items:3,
				nav:true
			},
			540:{
				items:4,
				nav:true
			},
			640:{
				items:6,
				nav:true
			},
			740:{
				items:8,
				nav:true
			}
		}
	})

	$('.carousel-itens-produtos').owlCarousel({
		loop:false,
		margin:0,
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
</script>