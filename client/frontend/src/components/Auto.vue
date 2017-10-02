<template>
	<div class="" v-if="result">
		<div class="col-md-6 center">
			<img :src="this.$parent.assetAutoUrl+data.image">
			<div class="price">
				Price: {{data.price}} <span class="glyphicon glyphicon-eur"></span>
			</div>
		</div>
		<div class="col-md-6">
			<h4><span class="glyphicon glyphicon-arrow-right"></span> {{data.MODEL_NAME}}</h4>
			<hr>
			<ul class="description">
				<li><span class="glyphicon glyphicon-tint"></span>Color: {{data.color}}</li>
				<li><span class="glyphicon glyphicon-chevron-right"></span>Year: {{data.year}}</li>
				<li><span class="glyphicon glyphicon-info-sign"></span>Engine capacity: {{data.engine_capacity}} L</li>
				<li><span class="glyphicon glyphicon-plane"></span>Max speed: {{data.max_speed}} km/h</li>
			</ul>
			<hr>
			<pre-order-form></pre-order-form>
		</div>
	</div>
	<div v-else>
		{{error}}
	</div>
</template>

<script>
	import PreOrderForm from './PreOrderForm.vue'
	export default {
  	name: 'Auto',
  	data() {
  		return {
  			data: [],
  			result: true,
  			error: '',
  		}
  	},
  	created() {
	    var xhr = new XMLHttpRequest();
	    var params = "action=getAuto&id=" + this.$route.params.id;
	    xhr.open('POST', this.$parent.AJAX_URL, false);
	    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	    xhr.send(params);

	    if (xhr.status != 200) {
	      	console.log( xhr.status + ': ' + xhr.statusText );
	    } else {
	      	var result = JSON.parse(xhr.responseText)
	      	if (result.status) {
				this.data = result.auto;
	      	} else {
	      		this.result = false
	      		this.error = result.message;
	      	}
	    }
  	},
  	components: {
  		PreOrderForm
 	}
}
</script>
<style>

</style>
