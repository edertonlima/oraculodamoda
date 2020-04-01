<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); 

		//$cor = 'cor7';
		$produto_img = 'massaparalasanha.jpg';
		$categorias = wp_get_post_terms( $post->ID, 'categoria_receitas' )[0]; 
		$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'detalhe-post-page' );
		$current_ID = $post->ID;
	?>
			

		<section class="box-content no-padding detalhe-prod">			
			<div class="bloco-img grande title-bottom" style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');">
				<h2 class="center bg-cor2"><span><?php the_title(); ?></span></h2>
			</div>

			<div class="container">	
				<div class="breadcrumbs">
					<ul>
						<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
						<li><a href="<?php echo get_home_url(); ?>/receitas" title="Receitas">Receitas</a></li>
						<li><a href="<?php echo get_term_link($categorias->term_id); ?>" title="<?php echo $categorias->name; ?>"><?php echo $categorias->name; ?></a></li>
						<li><?php the_title(); ?></li>
					</ul>
				</div>

				<h3 class="tit-receita"><?php echo get_the_excerpt(); ?></h3>

				<div class="row">
					
					<div class="col-6">
						<h2 class="full center center bg-cor2"><span>INGREDIENTES</span></h2>
						<ul class="list-receita-passo">

							<?php if( have_rows('itens_ingredientes_receita') ):
								while ( have_rows('itens_ingredientes_receita') ) : the_row(); 

									echo '<li>. ', get_sub_field('item_ingrediente_receita'), '</li>';

								endwhile;
							endif; ?>

						</ul>
					</div>

					<div class="col-6">
						<h2 class="full center center bg-cor2"><span>MODO DE PREPARO</span></h2>
						<ul class="list-receita-passo">

							<?php if( have_rows('passos_modo_preparo_receita') ):
								$i = 0;
								while ( have_rows('passos_modo_preparo_receita') ) : the_row(); 

									$i = $i+1;
									echo '<li><span>', $i, '.</span>',  get_sub_field('passo_modo_preparo_receita'), '</li>';

								endwhile;
							endif; ?>

						</ul>
					</div>

				</div>
			</div>
		</section>

		<div class="rede-social-receita">
			<h3 class="center cor2 uppercase">COMPARTILHE OS RESULTADOS!</h3>
			<a href="<?php the_field('facebook','option'); ?>" title=""><i class="fab fa-facebook-f"></i></a>
			<a href="<?php the_field('instagram','option'); ?>" title=""><i class="fab fa-instagram"></i></a>
		</div>

		<section class="box-content no-padding-top padding-bottom-100 list-receita">

			<?php //echo $categorias->term_id;
				$receitas_list = array(
						'posts_per_page' => 2,
						//'category__in' => $categorias->term_id,
					    'tax_query' => array(
					        array (
					            'taxonomy' => 'categoria_receitas',
					            'field' => 'slug',
					            'terms' => $categorias->slug,
					        )
					    ),
						'post_type' => 'receitas'
					);
				query_posts( $receitas_list );

				if((have_posts()) and ($wp_query->post_count > 1)){ ?>

						<div class="container">
							<h3 class="outras-receitas center">Explore outras receitas:</h3>
								
							<div class="row">
								<?php while ( have_posts() ) : the_post(); 
									if($post->ID != $current_ID){ ?>

										<div class="<?php if($wp_query->post_count == 2){ echo 'col-m-3';} ?> col-6">
											<?php get_template_part( 'content-receita', get_post_format() ); ?>
										</div>

									<?php }
								endwhile;
								wp_reset_query(); ?>
							</div>	
						</div>
					

				<?php }else{
					wp_reset_query(); ?>
					
					<section class="box-content no-padding-top padding-bottom-60 list-receita"></section>
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
</script>
