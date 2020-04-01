<div class="slide">

	<div id="slide-home" class="carousel slide" data-ride="carousel" data-interval="8000">

		<div class="carousel-inner">
			<?php 
				if(is_home()){
					$images = get_field('slide_principal',9);
					//echo '<pre>home</pre>';
				}else{
					if(is_category()){
						$images = get_field('slide_principal',$current_category->taxonomy.'_'.$current_category->term_id);
						//var_dump($images);
						//echo '<pre>category</pre>';
					}else{
						if((is_archive()) and (!is_tax())){
							$images = get_field('slide_receitas','option');
							//echo '<pre>archive y tax</pre>';
						}else{
							if(is_tax()){
								$images = get_field('slide_principal',$current_category->taxonomy.'_'.$current_category->term_id);
								//echo '<pre>tax</pre>';
							}else{
								$images = get_field('slide_principal');
								//echo '<pre>normal</pre>';
							}
						}
					}
				}
				//var_dump($images);
			$qtd_slide = 0;
			if( $images ): ?>
		        <?php foreach( $images as $image ): //var_dump($image);
		        	?>

		        	<?php
		        		if(((is_archive()) and (!is_tax())) and (!is_category())){ ?>

			        		<div class="carousel-item<?php if($qtd_slide == 0){ echo ' active'; } ?>" style="background-image: url('<?php echo esc_url($image['imagem_slide_receitas']['sizes']['detalhe-post-page']); ?>');">
			        			
					        	<?php if($image['link_slide_receitas'] != ''){ ?>
					        		<a href="<?php echo $image['link_slide_receitas']; ?>"></a>
					        	<?php } ?>
			        		</div>

			        	<?php }else{ //var_dump($image['imagem_slide_principal']['sizes']); ?>

			        		<div class="carousel-item<?php if($qtd_slide == 0){ echo ' active'; } ?>" style="background-image: url('<?php echo esc_url($image['imagem_slide_principal']['sizes']['detalhe-post-page']); ?>');">
			        			
					        	<?php if($image['link_slide_principal'] != ''){ ?>
					        		<a href="<?php echo $image['link_slide_principal']; ?>"></a>
					        	<?php } ?>
			        		</div>

			        	<?php } ?>

		        	<?php $qtd_slide = $qtd_slide+1;
		        endforeach; ?>
			<?php endif; ?>
		</div>

		<ol class="carousel-indicators <?php if((is_category()) or (is_tax())){ echo 'indicators-category'; } ?>">
			<?php
				if($qtd_slide > 1){
					for($i=0; $i < $qtd_slide; $i++) { ?>		
						<li data-target="#slide-home" data-slide-to="<?php echo $i; ?>"<?php if($i == 0){ echo ' class="active"'; } ?>></li>
					<?php }
				}
			?>				
		</ol>

		<a class="carousel-control-prev" href="#slide-home" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#slide-home" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

</div>