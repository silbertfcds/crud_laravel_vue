<div class="modal fade" id="update">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<h4>Nova tarefa</h4>
			</div>
			<form method="post" v-on:submit.prevent="atualizarTask()">
				<div class="modal-body">
				
					<label for="inputTarefa" class="col-form-label">Tarefa</label>
					<input type="text" class="form-control" id="inputTarefa" placeholder="Tarefa" v-model="taskEdit.keep">

						<!-- <div class="form-group col-md-6">
							<label for="inputPassword4" class="col-form-label">Número</label>
							<input type="text" class="form-control" id="inputPassword4" placeholder="Número" v-model="produto.numero">
						</div> -->

					<!-- <div class="form-group">
						<label for="inputAddress" class="col-form-label">Descrição</label>
						<input type="text" class="form-control" id="inputAddress" placeholder="Descrição" v-model="produto.descricao">
					</div> -->
					
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Adicionar">
				</div> 
			</form> 
		</div>
	</div>
</div>