<?php get_header(); ?>
<?php 
	$current_category = get_queried_object();
	$cor_category = get_field('cor_categoria', $current_category->taxonomy.'_'.$current_category->term_id);
?>

	<section class="box-content box-slide no-padding-bottom"> 
		
		<?php include 'slide.php'; ?>

		<h2 class="center title-solo-bottom bg-cor2">
			<span><?php echo $current_category->name; ?></span>
		</h2>

	</section>

	<section class="box-content no-padding-top">
		<div class="container">	
			<div class="breadcrumbs">
				<ul>
					<li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
					<li><a href="<?php echo get_home_url(); ?>/receitas" title="Receitas">Receitas</a></li>
					<li><?php echo $current_category->name; ?></li>
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