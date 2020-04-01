<?php get_header(); ?>
<?php 
	$current_category = get_queried_object();
	$cor_category = get_field('cor_categoria', $current_category->taxonomy.'_'.$current_category->term_id);
?>

		<style type="text/css">
			.list-receita .owl-carousel .owl-dots .owl-dot.active {
			    background: <?php echo $cor_category; ?>
			}
		</style>

	<section class="box-content box-slide no-padding-bottom"> 
		
		<?php include 'slide.php'; ?>

		<h2 class="center title-solo-bottom" style="background-color: <?php echo $cor_category; ?>">
			<span><?php echo $current_category->name; ?></span>
		</h2>

	</section>

	<section class="box-content no-padding">
		<div class="container">	
			<div class="breadcrumbs">
				<ul>
					<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
					<li><a href="<?php echo get_permalink(get_page_by_path('produtos')); ?>" title="Produtos">Produtos</a></li>
					<li><?php echo $current_category->name; ?></li>
				</ul>
			</div>
		</div>
	</section>

	<section class="box-content no-padding list-prod">
		<div class="container">
			<div class="row">
				<?php
					while ( have_posts() ) : the_post(); ?>

						<div class="col-4">
							
							<div class="carousel-itens-produtos owl-carousel owl-theme owl-loaded bg-cinza">
								<div class="owl-stage-outer">
									<div class="owl-stage">

										<div class="owl-item">
											<a href="<?php the_permalink(); ?>" class="">

												<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($prod_categoria->ID), '' );
													if($imagem[0]){ ?>

														<img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>">

													<?php } ?>

												<h4 style="color: <?php echo $cor_category; ?>"><?php the_title(); ?></h4>
											</a>
										</div>

									</div>
								</div>
							</div>

						</div>

					<?php endwhile;
				?>

				<?php paginacao(); ?>
			</div>
		</div>
	</section>

	<?php include 'list-receita-cat.php'; ?>

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
			}
		}
	})

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
</script>