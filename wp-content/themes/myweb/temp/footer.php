
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-5">

					<h1>
						<a href="<?php echo get_home_url(); ?>" title="">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/daboa.png" alt="">
						</a>
					</h1>

					<h4>Sobre Nós</h4>
					<p class="sobre"><?php echo get_the_excerpt(get_page_by_path('sobre-nos')); ?></p>

				</div>

				<div class="col-4">
					<nav class="nav nav-footer">
						<ul>
							<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
							<li><a href="<?php echo get_permalink(get_page_by_path('sobre-nos')); ?>" title="<?php the_field('titulo_menu',get_page_by_path('sobre-nos')); ?>"><?php the_field('titulo_menu',get_page_by_path('sobre-nos')); ?></a></li>
							<li>
								<a href="<?php echo get_permalink(get_page_by_path('produtos')); ?>" title="Produtos">Produtos</a>
								<ul>
									<?php $category = get_terms( array(
									    'taxonomy' => 'category',
									    'hide_empty' => false
									) );

									if($category){ 
										foreach ($category as $key => $categoria) { //var_dump($categoria); ?>

											<li><a href="<?php echo get_term_link($categoria->term_id); ?>" title="<?php echo $categoria->name; ?>"><?php echo $categoria->name; ?></a></li>

										<?php }
									} ?>
								</ul>
							</li>
							<li><a href="#" title="">Receitas</a></li>
							<li><a href="<?php echo get_permalink(get_page_by_path('contato')); ?>" title="<?php the_field('titulo_menu',get_page_by_path('contato')); ?>"><?php the_field('titulo_menu',get_page_by_path('contato')); ?></a></li>
						</ul>
					</nav>
				</div>

				<div class="col-3 center">
					<h4>Contato</h4>

					<div class="contato-item">
						<?php if(get_field('telefone','options')){ ?>
							<span>Fones:</span><h4><?php the_field('telefone','options'); ?></h4>
						<?php } ?>

						<?php if(get_field('whatsapp','options') and get_field('telefone','options')){ ?>
							<span></span>
						<?php } ?>

						<?php if(get_field('whatsapp','options')){ ?>
							<h4 class="tel-2"><?php the_field('whatsapp','options'); ?></h4>
						<?php } ?>
					</div>

					<div class="contato-item">
						<span>SAC:</span><h4><?php the_field('sac','options'); ?></h4>
					</div>

					<div class="contato-item mini">
						<span>Email:</span>
						<a href="mailto:<?php the_field('email','options'); ?>" title="<?php the_field('email','options'); ?>">
							<h4><?php the_field('email','options'); ?></h4>
						</a>
					</div>

					<div class="redes-sociais">
						<span>Siga-nos nas redes sociais<span> e acompanhe as novidades</span>!</span>
						<a href="<?php the_field('facebook','option'); ?>" title=""><i class="fab fa-facebook-f"></i></a>
						<a href="<?php the_field('instagram','option'); ?>" title=""><i class="fab fa-instagram"></i></a>
					</div>
				</div>

				<p class="copy center"><strong>MDB Indústria Alimentiícia LTDA </strong><?php the_field('endereco','option'); ?></p>
			</div>
		</div>
	</div>	

	<?php wp_footer(); ?>

	<!--<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.2.1.slim.min.js"></script>-->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/popper.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){	

			$('.menu-mobile').click(function(){
				if($(this).hasClass('ativo')){
					$('.nav-principal ul').css('top','-100vh');
					$(this).removeClass('ativo');
					$('.header').removeClass('ativo');
				}else{
					$('.nav-principal ul').css('top','0px');
					$(this).addClass('ativo');
					$('.header').addClass('ativo');
				}
			});

		});


		$(window).scroll(function(){
			scroll_body = $(window).scrollTop();
			if(scroll_body > 10){
				$('body').addClass('scroll_body');
				$('.header').addClass('scroll_menu');
			}else{
				$('body').removeClass('scroll_body');
				$('.header').removeClass('scroll_menu');
			}
		});
	</script>

</body>
</html>