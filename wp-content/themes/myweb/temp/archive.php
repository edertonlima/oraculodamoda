<?php get_header(); ?>

<!-- slide --> 
<section class="box-content box-slide">
	
	<?php include 'slide.php'; ?>

	<?php 
		$category = get_terms( array(
		    'taxonomy' => 'categoria_receitas',
		    'hide_empty' => false,
		) );

		if($category){ ?>
			<div class="list-category bg-cor2">
				<div class="container">

						<div class="carousel-list-category owl-carousel owl-theme owl-loaded">
							<div class="owl-stage-outer">
								<div class="owl-stage">

									<?php foreach ($category as $key => $categoria) { ///var_dump($categoria); ?>
										<div class="owl-item">
											<div class="item-category <?php //if($category->term_id != 3): echo 'off'; endif; ?>">
												<a href="<?php echo get_term_link($categoria->term_id); ?>" rel="<?php echo $categoria->slug; ?>">
													<img src="<?php the_field('icone_categoria_receitas', $categoria->taxonomy.'_'.$categoria->term_id); ?>" align="">
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
				<li>Receitas</li>
			</ul>
		</div>
	</div>
</section>

<section class="box-content list-linha-prod no-padding-top">
	<div class="container">
		<div class="row">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="col-6 padding-bottom-60">

					<?php get_template_part( 'content-receita', get_post_format() ); ?>
					
				</div>

			<?php endwhile; ?>

		</div>		
	</div>
</section>

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
	});
</script>