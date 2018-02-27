@extends('app')

@section('content')

<div id="crud" class="row">
	<div class="col-xs-12">
		<h1 class="page-header">CRUD Laravel e VUE</h1>
	</div>
	<div class="col-sm-12">
		<a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
		Nova tarefa
		</a>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Número</th>
					<th>Tarefa</th>
					<th colspan="2">
						&nbsp;
					</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="keep in keeps">
					<td width="10px">@{{ keep.id }}</td>
					<td>@{{ keep.keep }}</td>
					<td width="10px">
						<a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editarTask(keep)" data-toggle="modal" data-target="#update">Editar</a>
					</td>
					<td width="10px">
						<a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteTask(keep)">Deletar</a>
					</td>
				</tr>
			</tbody>
		</table>
		<div>@{{ url }}</div>
		@include('create')
		@include('update')
	</div>
	<!-- <div class="col-sm-5">
		<pre>
			@{{ $data }}
		</pre>
	</div> -->
</div>

@endsection