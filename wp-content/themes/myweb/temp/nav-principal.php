<nav class="nav nav-principal">
	
		<ul>
			<li class="logo">
				<h1>
					<a href="<?php echo get_home_url(); ?>" title="<?php //the_field('titulo', 'option'); ?>">
						<img src="<?php //the_field('logo_header', 'option'); ?><?php echo get_template_directory_uri(); ?>/assets/images/daboa.png" alt="<?php //the_field('titulo', 'option'); ?>">
					</a>
				</h1>
			</li>

			<li class="<?php if ( is_front_page() ) : echo 'ativo'; endif ?>">
				<a href="<?php echo get_home_url(); ?>" title="HOME">HOME</a>
			</li>

			<li class="<?php if ( is_page('sobre-nos') ) : echo 'ativo'; endif ?>">
				<a href="<?php echo get_permalink(get_page_by_path('sobre-nos')); ?>" title="<?php the_field('titulo_menu',get_page_by_path('sobre-nos')); ?>"><?php the_field('titulo_menu',get_page_by_path('sobre-nos')); ?></a>
			</li>

			<li class="<?php if ( (is_home('produtos')) or (is_category()) or (is_singular('post')) ) : echo 'ativo'; endif ?>">
				<a href="<?php echo get_permalink(get_page_by_path('produtos')); ?>" title="<?php the_field('titulo_menu',get_page_by_path('produtos')); ?>"><?php the_field('titulo_menu',get_page_by_path('produtos')); ?></a>
			</li>

			<li class="<?php if ( (is_post_type_archive('receitas')) or (is_tax('categoria_receitas')) or (is_singular('receitas')) ) : echo 'ativo'; endif ?>">
				<a href="<?php echo get_home_url(); ?>/receitas" title="RECEITAS">RECEITAS <?php echo $post_types; ?></a>
			</li>

			<li class="<?php if ( is_page('contato') ) : echo 'ativo'; endif ?>">
				<a href="<?php echo get_permalink(get_page_by_path('contato')); ?>" title="<?php the_field('titulo_menu',get_page_by_path('contato')); ?>"><?php the_field('titulo_menu',get_page_by_path('contato')); ?></a>
			</li>
		</ul>

		<a href="javascript:" class="menu-mobile">
			<i class="fas fa-bars"></i>
			<i class="fas fa-times"></i>
		</a>
</nav>