<template>
  <div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">
                    {{msg}}
                </h3>
            </div>
            <div class="collapse navbar-collapse" id="navbar-main">
              <ul class="nav col-md-12">
                <li> 
                  <select class="form-control" id="filter_category">
                    <option value="">Mark</option>
                    <!--<option v-for="sort in options.sorts" :value="sort">{{sort}}</option>-->
                  </select>
                </li>
                <li> 
                  <select class="form-control" id="filter_category">
                    <option value="">Model</option>
                    <!--<option v-for="sort in options.sorts" :value="sort">{{sort}}</option>-->
                  </select>
                </li>
                <li> 
                  <select class="form-control" id="filter_category">
                    <option value="">Year</option>
                    <!--<option v-for="sort in options.sorts" :value="sort">{{sort}}</option>-->
                  </select>
                </li>
                <li> 
                  <select class="form-control" id="filter_category">
                    <option value="">Value</option>
                    <!--<option v-for="sort in options.sorts" :value="sort">{{sort}}</option>-->
                  </select>
                </li>
                <li> 
                  <select class="form-control" id="filter_category">
                    <option value="">Color</option>
                    <!--<option v-for="sort in options.sorts" :value="sort">{{sort}}</option>-->
                  </select>
                </li>
                <li> 
                  <select class="form-control" id="filter_category">
                  <option value="">Max speed</option>
                  <!--<option v-for="sort in options.sorts" :value="sort">{{sort}}</option>-->
                  </select>
                </li>
                <li> 
                  <select class="form-control" id="filter_category">
                  <option value="">Price</option>
                  <!--<option v-for="sort in options.sorts" :value="sort">{{sort}}</option>-->
                  </select>
                </li>
                <li><button id="filter_clear" @click="">Clear</button></li>
            </ul>
        </div>
        </div>
        <div id="content">
          <!--<product v-for="product in filteredProducts" :product="product"></product>-->
        </div>
    </div>
  </div>
</template>


<script>
export default {
  name: 'hello',
  data () {
    return {
      msg: 'Auto shop'
    }
  },
  created() {

    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'http://localhost:8080/test.php', false);
    xhr.send();

    if (xhr.status != 200) {
      alert( xhr.status + ': ' + xhr.statusText );
    } else {
      console.log(xhr);
      //alert( xhr.responseText ); 
    }
  }
}
</script>


<style>
.panel-primary {
  border-color: #f90000;
}
.panel-primary > .panel-heading {
  background-color: #f90000;
  border-color: #f90000;
}

#filter_clear {
    background-color: #f90000;
    border: none;
    padding: 5px;
    color: #fff;
    margin: 0 auto;
    width: 100%;
    border-radius: 4px;
}

.nav li {
  display: inline-block;
  width: 12%;
}

.form-control {
  background-color: #000;
  color: #fff;
}

</style>
