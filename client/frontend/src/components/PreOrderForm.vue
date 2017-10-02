<template>
	<div class="form col-md-6 mt-30">
		<h4>Pre-order</h4>
		<div class="success" v-if="result_form">Success send</div>
		<div v-else>
			<form @submit.prevent="validForm">
				<p :class="{ 'control': true }"><input v-model="name" v-validate="'required|alpha'" :class="{'input form-control': true, 'is-danger': errors.has('name') }"type="text" name="name" placeholder="Name"></p>
				<span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>

				<p :class="{ 'control': true }"><input v-model="surname" v-validate="'required|alpha'" :class="{'input form-control': true, 'is-danger': errors.has('surname') }"type="text" name="surname" placeholder="Surname"></p>
				<span v-show="errors.has('surname')" class="help is-danger">{{ errors.first('surname') }}</span>
				
				<p :class="{ 'control': true }"><select v-model="payment_id" v-validate="'required'" :class="{'list form-control': true, 'is-danger': errors.has('payment_id') }" name="payment_id">
			      		<option value="" disabled selected>Choose payment</option>
			      		<option value="1">card</option>
			      		<option value="2">cash</option>
			    </select>
			    </p>
			    <span v-show="errors.has('payment')" class="help is-danger">{{ errors.first('payment') }}</span>

				<p><button type="submit" class="btn btn-primary">Submit</button></p>
			</form>
		</div>
	</div>

</template>

<script>
	export default {
  	name: 'PreOrderForm',
  	data() {
  		return {
			name: '',
			surname: '',
			payment_id: '',
			result_form: false
  		}
  	},
  	methods: {
  		validForm: function() {
			this.$validator.validateAll().then((result) => {
		        if (result) {
		          	
		          	var xhr = new XMLHttpRequest();
				    var params = "action=addOrder&auto_id=" + this.$route.params.id + "&name=" + this.name + "&surname=" + this.surname + "&payment_id=" + this.payment_id;
				    xhr.open('POST', this.$parent.$parent.AJAX_URL, false);
				    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				    xhr.send(params);

				    if (xhr.status != 200) {
				      	console.log( xhr.status + ': ' + xhr.statusText );
				    } else {
				    	var result = JSON.parse(xhr.responseText)
				      	if (result.status) {
				 
							this.result_form = true;
				      	} else {
				      		console.log(result)
				      		//this.result = false
				      		//this.error = result.message;
				      	}
				    }
		        }
     		});
		}
  	}
}
</script>
<style>

</style>
