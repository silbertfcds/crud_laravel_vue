
new Vue({
	el: '#crud',
	created: function() {
		this.getKeeps();
	},
	data: {
		keeps: []
	},
	methods: {
		getKeeps: function() {
			var urlKeeps = 'tasks';

			/*this.$http.get('/tasks').then((response)=>{
  				this.keeps = response.data;
  				console.log('array: ',this.keeps);
  			});*/

			axios.get(urlKeeps).then(response => {
				this.keeps = response.data
			});
		},
		deleteKeep: function(keep) {
			var url = 'tasks/' + keep.id;
			axios.delete(url).then(response => { 
				this.getKeeps(); //listando
				toastr.success('Deletado com sucesso'); //mensagem
			});
		},
		 /*adicionarProduto(){
	    	console.log('entrou adicionar produto');

	    	console.log(this.produto);
	    	this.$http.post('/produtos/', this.produto).then(response=>{
	    		this.produtos.push(response.data.produto);
	    		console.log('array produtos', this.produtos);
	    		this.produto = {nome: '', numero:'', descricao:''};
	    		if (this.errors) {
                    this.errors = [];
                }
                console.log(response.data);
            }, response => {
                this.errors = response.data;
            });
	    	
	    }*/
	}
});