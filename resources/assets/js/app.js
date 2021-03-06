
new Vue({
	el: '#crud',
	created: function() {
		this.getKeeps();
	},
	data: {
		keeps: [],
		errors: [],
		editForm: "",

		taskEdit : {
			keep : ''
			
		},

		task : {
			keep : ''
			
		}
	},
	methods: {
		getKeeps: function() {
			var urlKeeps = 'tasks';

			this.$http.get(urlKeeps).then((response)=>{
  				this.keeps = response.data;
  				console.log('array: ',this.keeps);
  			});

			/*axios.get(urlKeeps).then(response => {
				this.keeps = response.data
			});*/
		},
		deleteTask: function(keep) {
			var url = 'tasks/' + keep.id;
			axios.delete(url).then(response => { 
				this.getKeeps(); //listando
				toastr.success('Deletado com sucesso'); //mensagem
			});
		},
		adicionarTask(){
	    	console.log('entrou adicionar task');
	    	var url = 'tasks';
	    	axios.post(url, this.task).then(response=>{
	    		this.keeps.push(response.data);
	    		toastr.success('Adicionado com sucesso'); //mensagem
	    		$('#create').modal('hide'); //fechando modal create
	    		if (this.errors) {
                    this.errors = [];
                }
                console.log(response.data);
            }, response => {
                this.errors = response.data;
            });
            this.task = {keep: ''};
            this.getKeeps(); //listando
	    	
	    },
	   
	    editarTask(keep){
	    	console.log('entrou editar');
	    	this.keeps.forEach((task, i) => {
	    		if (task.id == keep.id) {
	    			this.taskEdit = task;
	    		}
	    	});
	    	return editForm = keep;
	    },

	    atualizarTask(){
	    	console.log('entrou update');
	    	axios.put('tasks/' + editForm.id, this.taskEdit).then(response => {
	    		console.log(response);
	    		toastr.success('Atualizado com sucesso');
	    		this.taskEdit = "";
	    		this.editForm = "";
	    		$('#update').modal('hide'); //fechando modal update
	    	})
	    	.catch(error => {
	    		console.log(error.response);
	    	})
	    },
	}
});