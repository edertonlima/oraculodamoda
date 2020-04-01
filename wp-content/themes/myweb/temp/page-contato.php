<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<section class="box-content no-padding-top">			
			<div class="bloco-img grande title-bottom" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/img-tit-contato.jpg');">
				<h2 class="center bg-cor5">CONTATO</h2>
			</div>

			<div class="container">	
				<div class="breadcrumbs">
					<ul>
						<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
						<li>Contato</li>
					</ul>
				</div>
			</div>

			<div class="container container-mobile">
				<h3 class="mobile-750px-hide center">Dúvidas ou sugestões, entre em <strong class="cor5">CONTATO</strong> preenchendo esse formulário, ou fale conosco via telefone ou e-mail.</h3>
				<h3 class="mobile-750px-show center">Dúvidas ou sugestões, entre em contato:</h3>

				<div class="content form">
					<form class="fale-conosco" id="fale-conosco" action="javascript:" method="post">
						<div class="row">
							<div class="col-6 esq">
								<fieldset>
									<input type="text" name="nome" id="nome" placeholder="NOME">
								</fieldset>

								<fieldset>
									<input type="text" name="telefone" id="telefone" placeholder="TELEFONE">
								</fieldset>

								<fieldset>
									<input type="text" name="email" id="email" placeholder="E-MAIL">
								</fieldset>

								<fieldset>
									<input type="text" name="assunto" id="assunto" placeholder="ASSUNTO">
								</fieldset>
							</div>

							<div class="col-6 dir">
								<fieldset>
									<textarea name="mensagem" id="mensagem" placeholder="MENSAGEM"></textarea>
								</fieldset>
								<fieldset>
									<p class="msg-form right"></p><br><br>
									<button class="enviar">ENVIAR</button>
								</fieldset>
							</div>
						</div>
					</form>
				</div>

			</div>

			<div class="contato-info">
				<div class="container">
						<div class="item-contato-info">
							<div class="ico-contato">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-contato-1.jpg">
							</div>
							<div class="txt-contato">
								<a href="emailto:<?php the_field('email','options'); ?>"><?php the_field('email','options'); ?></a>
							</div>
						</div>	
						<div class="item-contato-info">
							<div class="ico-contato"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-contato-2.jpg"></div>
							<div class="txt-contato">
								<span>
									<?php the_field('whatsapp','options'); ?>
									<?php if(get_field('whatsapp','options') and get_field('telefone','options')){ ?>
										<br>
									<?php } ?>
									<?php the_field('telefone','options'); ?>
								</span>
							</div>
						</div>	
						<div class="item-contato-info">
							<div class="ico-contato"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-contato-3.jpg"></div>
							<div class="txt-contato">
								<span><?php the_field('sac','options'); ?>6</span>
							</div>
						</div>	
				</div>
			</div>
		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>

<script type="text/javascript">

		jQuery(".enviar").click(function(){
			jQuery('.enviar').html('ENVIANDO').prop( "disabled", true );
			jQuery('.msg-form').removeClass('erro ok').html('');
			var nome = jQuery('#nome').val();
			var email = jQuery('#email').val();
			var telefone = jQuery('#telefone').val();
			var assunto = jQuery('#assunto').val();
			var mensagem = jQuery('#mensagem').val();
			var para = 'comercial@massasdaboa.com.br';//'<?php the_field('email', 'option'); ?>';
			var nome_site = 'Massas da Boa'; //'<?php bloginfo('name'); ?>';

			if(nome == ''){
				jQuery('#nome').parent().addClass('erro');
			}

			if(email == ''){
				jQuery('#email').parent().addClass('erro');
			}

			if(telefone == ''){
				jQuery('#telefone').parent().addClass('erro');
			}

			if(assunto == ''){
				jQuery('#assunto').parent().addClass('erro');
			}

			if(mensagem == ''){
				jQuery('#mensagem').addClass('erro');
			}

			if((nome == '') || (email == '') || (telefone == '') || (assunto == '') || (mensagem == '')){
				jQuery('.msg-form').html('Todos os campos são obrigatórios');

				jQuery('.enviar').html('ENVIAR').prop( "disabled", false );
			}else{
				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, telefone:telefone, mensagem:mensagem, assunto:assunto, para:para, nome_site:nome_site }, function(result){		
					if(result=='ok'){
						resultado = 'Formulário enviado com sucesso!';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('.msg-form').addClass(classe).html(resultado);
					jQuery('.contato-home').trigger("reset");
					jQuery('.enviar').html('ENVIAR').prop( "disabled", false );
				});
			}
		});

	jQuery(document).ready(function(){
		jQuery('input').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});

		jQuery('textarea').change(function(){
			if(jQuery(this).hasClass('erro')){
				jQuery(this).removeClass('erro');
			}
		});
	})
</script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/maskedinput.js"></script>
<script type="text/javascript">
	jQuery(function(jQuery){
	   jQuery("#telefone").mask("(99) 9999-9999?9");
	});
</script>