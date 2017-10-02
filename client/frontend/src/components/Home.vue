<template>
  <div class="row">
    <div class="col-md-12">
        <div class="pblock pblock-primary filterable">
            <div class="pblock-heading">
                <h3 class="panel-title">
                    {{msg}}
                </h3>
            </div>
            <filter-form></filter-form>
        </div>
        <div id="content">
          <div v-if="filter_result">
            <auto-home v-for="item in data" :item="item"></auto-home>
          </div>
          <div class="notfind" v-else>nothing found</div>
        </div>
    </div>
  </div>
</template>


<script>
import AutoHome from './AutoHome.vue'
import FilterForm from './FilterForm.vue'
export default {
  name: 'home',
  data () {
    return {
      msg: 'Auto shop',
      data: [],
      auto: [],
      filter_result: true
    }
  },
  created() {
    var xhr = new XMLHttpRequest()
    var params = "action=getAll"
    xhr.open('POST', this.$parent.AJAX_URL, false)
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.send(params)

    if (xhr.status != 200) {
      console.log( xhr.status + ': ' + xhr.statusText )
    } else {
      var result = JSON.parse(xhr.responseText)
      if (result.status) {
          this.auto = result.auto
          this.data = result.auto
      } else {
        console.log(result.message)
      }
    }
  },
  methods: {
      getAuto: function() {
          return this.auto
      }
  },
  components:{
    AutoHome, FilterForm
  }
}
</script>


<style>

</style>
