@foreach($perguntas as $pergunta)
<tr>
	<td>
		<div class="m-3">
			<div class="row">
				<div class="col-8">
					<a href="{{route('exibir-pergunta', $pergunta->id)}}" class="h4 text-dark">{{$pergunta->titulo}}</a>
					<span class="h6 text-secondary d-block mt-2" style="font-size: 12px;">{{$pergunta->users[0]->name}}</span>
					<span class="h6 text-secondary d-block mt-2" style="font-size: 12px;">{{$pergunta->created_at}}</span>
				</div>
				<div class="col m-auto text-right">
					<a href="{{ route('pergunta-curso', $pergunta->cursos[0]->id) }}">  <span class="badge badge-secondary  float-right m-1">{{$pergunta->cursos[0]->sigla}}</span> </a>
					@if($pergunta->users_id == Auth::id() && $pergunta->estado == 'Aberta')
					<a href="{{ route('pergunta-estado', $pergunta->estado) }}"> <span class="badge badge-info text-light m-1 " onclick="
					event.preventDefault();
					$.get('{{ route('estado', $pergunta->id) }}', function(data) {
						perguntas();
					});
					">{{$pergunta->estado}}</span> </a>
					@elseif($pergunta->estado == "Aberta")
					<span class="badge badge-info text-light m-1 ">{{$pergunta->estado}}</span>
					@else
					<span class="badge badge-success text-light mr-1 mt-1">{{$pergunta->estado}}</span>
					@endif
				</div>
			</div>
			<h6 class="mt-3">
				@if($pergunta->users_id == Auth::id())
				<a href="{{ route('delete', $pergunta->id) }}" class="float-right mr-2 text-danger apagar"><span>Apagar</span></a>
				<a href="{{route('editar-pergunta', $pergunta->id)}}}" class="float-right mr-2 text-info"><span>Editar</span></a>
				@endif
			</h6>
		</div>
	</td>
</tr>
@endforeach
<script type="text/javascript">
	$('.apagar').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var confirm = window.confirm("Deseja excluir esta pergunta ?");
		if (confirm) {
			var that = $(this);
			$.get($(this).attr('href'), function(data) {
				that.parents('tr').remove();
				window.alert("Pergunta apagada com sucesso.");
			});
		}
	});

</script>
