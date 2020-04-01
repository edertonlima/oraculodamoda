<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php
			$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'detalhe-post-page' ); 
		?>

		<section class="box-content no-padding-top">			
			<div class="bloco-img grande title-bottom" style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');">
				<h2 class="center bg-cor6"><?php the_title(); ?></h2>
			</div>

			<div class="container">	
				<div class="breadcrumbs">
					<ul>
						<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
						<li><?php the_field('titulo_menu'); ?></li>
					</ul>
				</div>

				<div class="content sobre">

					<?php the_content(); ?>

					<p class="destaque"><span>
						<?php the_field('texto_destaque'); ?>
					</span></p>

				</div>
			</div>
		</section>

		<section class="box-content">
			<div class="container container-mobile">

				<?php $imagem_form = get_field('imagem_form_parceiro'); ?>
				<div class="bloco-img grande title-top block-img-hide" style="background-image: url('<?php echo $imagem_form['sizes']['detalhe-post-page']; ?>');">
					<h2 class="mobile-750px-hide center bg-cor6">SEJA UM PARCEIRO</h2>
					<h2 class="mobile-750px-show center bg-cor6">SEJA PARCEIRO</h2>
				</div>

				<h3 class="mobile-750px-hide center">Dúvidas ou sugestões, entre em <strong class="cor6">CONTATO</strong> preenchendo esse formulário, ou fale conosco via telefone ou e-mail.</h3>
				<h3 class="mobile-750px-show center">Dúvidas ou sugestões, entre em contato:</h3>

				<div class="content form">
					<form class="fale-conosco form-cor6">
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
									<button class="enviar">Enviar</button>
								</fieldset>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>