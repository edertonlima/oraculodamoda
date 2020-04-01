<div class="menu">

	<!-- MENU PRIMARIO -->
	<ul class="menuPrincipal">
		<li class="home">
			<a href="<?php echo get_home_url(); ?>" title="Pagina inicial" <?php if($pagAtiva == 'home'){ echo 'class="ativo"'; } ?>>Pagina inicial</a>
		</li>
		<li<?php if(($pagAtiva == 13) or ($pagAtiva == 14)){ echo ' class="ativo"'; } ?>>
			<a href="javascript:" title="">Fachion</a>
			<ul>
				<li><a href="lisArtigo.php?id=14" title="Moda / Fashion feminino" <?php if($pagAtiva == 13){ echo ' class="ativo"'; } ?>>Moda / Fashion feminino</a></li>
				<li><a href="lisArtigo.php?id=15" title="Moda / Fashion feminino" <?php if($pagAtiva == 14){ echo ' class="ativo"'; } ?>>Moda / Fashion masculino</a></li>
			</ul>
		</li>
		<li<?php if($pagAtiva == 2){ echo ' class="ativo"'; } ?>>
			<a href="lisArtigo.php?id=2" title="">Design</a>
		</li>
		<li<?php if($pagAtiva == 3){ echo ' class="ativo"'; } ?>>
			<a href="lisArtigo.php?id=3" title="">Estilo</a>
		</li>
		<li<?php if($pagAtiva == 4){ echo ' class="ativo"'; } ?>>
			<a href="lisArtigo.php?id=4" title="">O assunto &eacute;</a>
		</li>
		<li<?php if($pagAtiva == 5){ echo ' class="ativo"'; } ?>>
			<a href="lisArtigo.php?id=5" title="">N&atilde;o perca!</a>
		</li>
		<li class="contato<?php if($pagAtiva == 'cadContato'){ echo ' ativo'; } ?>">
			<a href="cadContato.php" title="Contato">Contato</a>
		</li>
	</ul>
<!-- MENU SECUNDARIO -->
<ul class="menuSecundario">
<li<?php if($pagAtiva == 6){ echo ' class="ativo"'; } ?>>
<a href="lisArtigo.php?id=6" title="Tecnologia">Tecnologia</a>
</li>
<li<?php if($pagAtiva == 7){ echo ' class="ativo"'; } ?>>
<a href="lisArtigo.php?id=7" title="Cultura">Cultura</a>
</li>
<li<?php if($pagAtiva == 8){ echo ' class="ativo"'; } ?>><a href="lisArtigo.php?id=8" title="Make">Make</a></li>
<li<?php if($pagAtiva == 9){ echo ' class="ativo"'; } ?>>
<a href="lisArtigo.php?id=9" title="Batalha de looks">Batalha de looks</a></li>
<li class="menuDestaque ultimo">
<a href="lisArtigo.php?id=10" title="Aqui o seu" <?php if($pagAtiva == 10){ echo 'class="ativo"'; } ?>>Aqui o seu</a>
</li>
</ul>
<form action="manBusca.php">
<fieldset>
<input type="text" name="busca" onblur="if(this.value=='') this.value = 'Pesquisar';" onfocus="if(this.value=='Pesquisar')this.value = '';" value="Pesquisar" />
<button type="submit" class="ok">Buscar</button>
</fieldset></form>
</div>