<div class="boxDir">
	<h3>+ Artigos desta categoria</h3>
	<ul class="maisArtigos">
<?php 		$artigos = selectArtigoCat($artigo['catArtigo_id_catArtigo'],false);		if(($artigos == true) and (count($artigos) > 0)){			$i=0;			foreach($artigos as $artigo){				if($artigo['id_artigo']!=$_GET['id']){?>									<li<?php if(!($i%3)){ echo ' class="primeiro" ';}?>>						<a href="detArtigo.php?id=<?php echo $artigo['id_artigo']; ?>" title="<?php echo $artigo['nome_artigo']; ?>">							<img src="img/banco/artigo/<?php echo $artigo['id_artigo']; ?>/<?php echo $artigo['nome_img']; ?>" alt="<?php echo $artigo['nome_artigo']; ?>" />						</a>					</li><?php					$i=$i+1;				}			}		}?>
	</ul>
</div>