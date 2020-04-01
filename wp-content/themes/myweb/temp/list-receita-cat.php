
<?php
	$category = get_terms( array(
	    'taxonomy' => 'category',
	    'hide_empty' => false
	) );

	if($category){ 
		foreach ($category as $key => $categoria) { 

			if($current_category->slug == $categoria->slug){
				$slug_categoria_receita = $categoria->slug;
			}

		}
	}
?>


	<section class="box-content no-padding <?php if(!is_singular('post')){ echo 'padding-bottom-100'; } ?> list-receita">
		<?php 
			$receitas_list = array(
			    'post_type' => 'receitas',
			    'posts_per_page' => 12,
			    'tax_query' => array(
			        array(
			            'taxonomy' => 'categoria_receitas',
			            'field' => 'slug',
			            'terms' => $slug_categoria_receita
			        )
			     )
			);
		query_posts( $receitas_list ); ?>

			<?php if(have_posts()){ ?>
		
				<h2 class="center tit-slide-receita" style="background-color: <?php echo $cor_category; ?>">RECEITAS</h2>
				<div class="carousel-itens owl-carousel owl-theme owl-loaded owl-nav-off">
					<div class="owl-stage-outer">
						<div class="owl-stage">

							<?php
								while ( have_posts() ) : the_post();
									$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'wide' );

									$categorias_produto = get_field('categoria_receita_produto');

									foreach ($categorias_produto as $key => $cat_produto) {
										if($cat_produto->term_id == $current_category->term_id){ ?>

											<div class="owl-item">
												<a href="<?php the_permalink(); ?>" class="bloco-img" style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');" title="<?php the_title(); ?>">
													<div class="mask-item vertical-center" style="background-color: rgba(<?php echo $cor_category; ?>,0.5)">
														<span class="content-vertical">
															<span class="tit-receita"><?php the_title(); ?></span>
														</span>
													</div>
												</a>
											</div>

										<?php }
										}							
								endwhile;
								wp_reset_query();
							?>

						</div>
					</div>
				</div>
			<?php }
		?>
	</section>