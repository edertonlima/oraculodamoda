<nav class="nav nav-topo">
	<ul>
		<?php if(get_field('sac','options')){ ?>
			<li class="tel-principal">
				SAC: <?php the_field('sac','options'); ?>
			</li>
		<?php } 
		if((get_field('whatsapp','options')) or get_field('telefone','options')){ ?>
			<li class="tel-whats ico-inline">
				<?php if(get_field('whatsapp','options')){ ?>
					<i class="fab fa-whatsapp"></i> 
					<?php the_field('whatsapp','options'); ?>
				<?php }

				if(get_field('whatsapp','options') and get_field('telefone','options')){ ?>
					<span>/</span> 
				<?php }

				if(get_field('telefone','options')){ ?>
				 	<?php the_field('telefone','options'); ?>
				<?php } ?>
			</li>
		<?php } ?>

		<li class="rede-social">
			<?php if(get_field('facebook','options')){ ?>
				<a href="<?php the_field('facebook','options'); ?>" title=""><i class="fab fa-facebook-f"></i></a>
			<?php } ?>
		</li>
		<li class="rede-social last-rede-social">
			<?php if(get_field('instagram','options')){ ?>
				<a href="<?php the_field('instagram','options'); ?>" title=""><i class="fab fa-instagram"></i></a>
			<?php } ?>
		</li>
	</ul>
</nav>