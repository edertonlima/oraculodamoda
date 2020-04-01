<script type="text/javascript">
	jQuery(document).ready(function($) {
		$("#comente").submit(function (){
			$("#comente").slideUp(1000);
			$("#semComentarios").slideUp(1000);
			var nome = $("#nome").val();
			var email = $("#email").val();
			var comentario = $("#comentario").val();
			var newComentario = '<li class="newComentario"><strong>Nome:</strong><em>' + nome + '</em><strong>Comentário:</strong><em>' + comentario + '</em></li>';
			$("#comentarios").prepend(newComentario);			
			$("#comente").after('<div id="msgRetorno"><p class="msg ok">Seu comentário foi recebido com sucesso. Obrigado.</p><p class="msg">Seu comentário será avaliado antes de sua publicação definitiva</p></div>');
			setTimeout(function(){
				$("#msgRetorno").slideDown(1000);
			},1000);
			setTimeout(function(){
				$(".newComentario").slideDown(1000);
			},2000);
		});
	});
</script>

<div class="comente">
	<h3>Comente</h3>
	
	<form action="javascript:" id="comente">
		<fieldset>
			<input type="text" value="Nome" name="nome" id="nome" />
			<input type="text" value="E-mail" name="email" id="email" />
			<textarea name="comentario" id="comentario">Insira seu comentário aqui</textarea>
			<button type="submit">Enviar</button>
		</fieldset>
	</form>
	
	<h3 class="comentarios">Comentários</h3>
	<!--<p class="msg" id="semComentarios">Sem comentários para visualização.</p>-->
	<ul id="comentarios">		
		<li><strong>Nome:</strong><em>EdertonCirinoLima</em><strong>Comentário:</strong><em>Insira seu comentário aqui</em></li>
		<li><strong>Nome:</strong><em>EdertonCirinoLima</em><strong>Comentário:</strong><em>Insira seu comentário aqui</em></li>
		<li><strong>Nome:</strong><em>EdertonCirinoLima</em><strong>Comentário:</strong><em>Insira seu comentário aqui</em></li>
		<li><strong>Nome:</strong><em>EdertonCirinoLima</em><strong>Comentário:</strong><em>Insira seu comentário aqui</em></li>
	</ul>
</div>