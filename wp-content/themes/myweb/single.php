<?php
	include("includes/header.php");

	/*$selectArtigo = selectArtigo($_GET['id']);
	if(($selectArtigo == true) and (count($selectArtigo) > 0)){
		foreach($selectArtigo as $artigo){ }
	}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php
	//$title = $artigo['nome_artigo'];
	$keywords = '';
	//$pagAtiva = $artigo['id_catArtigo'];
?>
<?php include("includes/head.php");?>

<!-- GALERIA DE FOTOS -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/galleriffic-5.css" type="text/css" />
		
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.galleriffic.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.history.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.opacityrollover.js"></script>
<!-- FIM-GALERIA DE FOTOS -->

<?php get_header(); ?>

</head>

<body class="<?php echo $pagAtiva; ?>" <?php echo $bg; ?> >

	<!-- GOOGLE ANALYTICS -->
	<?php //include("includes/analytics.php");?>
	
	<!-- TOPO -->
	<?php include("includes/topo.php");?>

<?php while ( have_posts() ) : the_post();
	$category = wp_get_post_terms( $post->ID, 'category' )[0]; ?>

	<!-- CONTEÚDO -->
	<div class="container">
		<div class="Artigo">
	
			<!-- COLUNA ESQUERDA -->
			<div class="colEsquerda">
			
				<div class="titArtigo">
					<div class="dataArtigo">
						<?php //$data = formataData($artigo['data_artigo']); ?>
						<span class="dia" style="margin: 10px 0 2px 0;"><?php echo get_the_date('d'); ?></span>
						<span class="mesAno"><?php echo get_the_date(); ?></span>
					</div>
					<h2><span class="tableCell"><span><?php the_title(); ?></span></span></h2>
					<span class="catArtigo">
						<strong><a href="<?php echo get_term_link($category->term_id); ?>" title="<?php echo $category->name; ?>"><?php echo $category->name; ?></a></strong>
					</span>
				</div>


				<!-- GALERIA DE FOTOS -->				
				<div class="ArtigoInt">
				
					<div class="content">
						<div class="slideshow-container">
							<div id="loading" class="loader"></div>
							<div id="slideshow" class="slideshow"></div>
						</div>
						<div id="controls" class="controls"></div>
						<div id="caption" class="caption-container"></div>
					</div>
					
					<div class="navigation-container">
						<div id="thumbs" class="navigation">
							<a class="pageLink prev" style="visibility: hidden;" href="#" title="Pagina anterior"></a>
						
							<ul class="thumbs noscript">
<?php
								$images = get_field('galeria');
								$size = 'detalhe-post';
								$size_mini = 'mini-post';

if( $images ): ?>
    
        <?php foreach( $images as $image ): ?>

										<li>
											<a class="thumb" name="leaf" href="<?php echo esc_url($image['sizes']['detalhe-post']); ?>" title="">
												<img src="<?php echo esc_url($image['sizes']['mini-post']); ?>" alt="" height="100px" />
											</a>
											<!--<div class="caption">
												<p>Title <?php //echo $i; ?></p>
											</div>-->
										</li>
        <?php endforeach; ?>
    
<?php endif; ?>

							</ul>
							<a class="pageLink next" style="visibility: hidden;" href="#" title="Próxima pagina"></a>
						</div>
					</div>
					<!-- FIM-GALERIA DE FOTOS -->
					
				</div>
				
				<div class="contAC">
					<?php the_content(); ?>
					
					<!-- AUTOR E DATA -->
					<p class="autor">Por Ketty Barcellos, <?php echo get_the_date(); ?></p>
					
				</div>
				
				<!-- COMPARTILHE -->
				<?php //include('includes/compartilhe.php'); ?>				
				
				<!-- COMENTE -->				
				<?php //include('includes/comente.php'); ?>				
				
				<!-- PUBLICIDADE -->
				<?php //include('includes/publicidadeColEsq.php'); ?>		
			</div>
			
			<!-- COLUNA DIREITA -->
			<div class="colDireita">
				
				<!-- PUBLICIDADE -->
				<?php 
					$qtdPublicidade = 1;
					//include('includes/publicidadeColDir.php'); 
				?>
				
				<!-- MAIS ARTIGOS -->
				<?php
					//include('includes/maisArtigos.php');
				?>
				
				<!-- SOBRE A AUTORA -->
				<?php //include('includes/sobre.php'); ?>
				
				<!-- ANUNCIE AQUI -->
				<?php //include('includes/anuncie.php'); ?>
				
				<!-- PUBLICIDADE -->
				<div class="boxDir publicidadeDir">
					<?php 
						$qtdPublicidade = 3;
						include('includes/publicidadeColDir.php'); 
					?>
				</div>
			
			</div>
		</div>
    </div>

<?php endwhile; ?>

	<!-- RODAPE -->
	<?php include("includes/rodape.php");?>
	<?php include("includes/footer.php");?>
	
<!-- GALERIA DE FOTOS -->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li, div.navigation a.pageLink').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 6,
					preloadAhead:              10,
					enableTopPager:            false,
					enableBottomPager:         false,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					//captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          false,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '',
					nextLinkText:              '',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             true,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						var prevPageLink = this.find('a.prev').css('visibility', 'visible').addClass('off'); //var prevPageLink = this.find('a.prev').css('visibility', 'hidden').addClass('off');
						var nextPageLink = this.find('a.next').css('visibility', 'visible').addClass('off');
						
						// Show appropriate next / prev page links
						if (this.displayedPage > 0)
							prevPageLink.removeClass('off');//prevPageLink.css('visibility', 'visible');

						var lastPage = this.getNumPages() - 1;
						if (this.displayedPage < lastPage)
							nextPageLink.removeClass('off');

						this.fadeTo('fast', 1.0);
					}
				});

				/**************** Event handlers for custom next / prev page links **********************/

				gallery.find('a.prev').click(function(e) {
					gallery.previousPage();
					e.preventDefault();
				});

				gallery.find('a.next').click(function(e) {
					gallery.nextPage();
					e.preventDefault();
				});

				/****************************************************************************************/

				/**** Functions to support integration of galleriffic with the jquery.history plugin ****/

				// PageLoad function
				// This function is called when:
				// 1. after calling $.historyInit();
				// 2. after calling $.historyLoad();
				// 3. after pushing "Go Back" button of a browser
				function pageload(hash) {
					// alert("pageload: " + hash);
					// hash doesn't contain the first # character.
					if(hash) {
						$.galleriffic.gotoImage(hash);
					} else {
						gallery.gotoIndex(0);
					}
				}

				// Initialize history plugin.
				// The callback is called at once by present location.hash. 
				$.historyInit(pageload, "advanced.html");

				// set onlick event for buttons using the jQuery 1.3 live method
				$("a[rel='history']").live('click', function(e) {
					if (e.button != 0) return true;

					var hash = this.href;
					hash = hash.replace(/^.*#/, '');

					// moves to a new page. 
					// pageload is called at once. 
					// hash don't contain "#", "?"
					$.historyLoad(hash);

					return false;
				});

				/****************************************************************************************/
			});
		</script>
<!-- FIM-GALERIA DE FOTOS -->
	
	<?php get_footer(); ?>

</body>
</html>