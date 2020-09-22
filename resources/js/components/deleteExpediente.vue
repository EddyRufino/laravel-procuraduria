<template>
	<div>
	    <span class="material-icons" 
	        @click="deleteExpediente"
	    >
	        delete_forever
	    </span>
    </div>
</template>

<script>
export default {
	props: ['expedienteId'],
		methods: {
			deleteExpediente() {
				// console.log(this.expedienteId);
				this.$swal({
					  title: 'Estás segur@?',
					  text: "No podrás remover esto!",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Sí, Archivalo!'
					}).then((result) => {
					  if (result.value) {
					  	const params = {
					  		id: this.expedienteId
					  	}
					  	axios.post(`/expedientes/${this.expedienteId}`,{
					  		params,
					  		_method: 'delete'
					  	})
					  	.then(response => {
					    this.$swal({
					    	title: 'Archivado!',
					      	text: response.data.message,
					      	icon: 'success'
					    });
					    // Agrega .parentNode segun cuantos padres tenga tu delete
					  	this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
					  	})
					  	.catch(error => {
					  		console.log(error);	
					  	})
					  }
			})
		}
	}
}
</script>