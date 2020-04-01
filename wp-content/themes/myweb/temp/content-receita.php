<?php
	$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'list-receita-produto' );
?>
<a href="<?php the_permalink(); ?>" class="bloco-img title-top" style="background-image: url('<?php if($imagem[0]){ echo $imagem[0]; } ?>');" title="<?php the_title(); ?>">
	<h2 class="full center bg-cor2"><span><?php the_title(); ?></span></h2>
	<div class="mask-item vertical-center">
		<span class="content-vertical">Leia mais...</span>
	</div>
</a>