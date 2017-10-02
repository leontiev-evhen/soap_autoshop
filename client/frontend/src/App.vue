<template>
  <div id="app">
    <div class="header">
      <a href="/"><img src="../static/img/logo.png" class="logo img-responsive"></a>
    </div>
    <div class="line"></div>
    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  name: 'app',
  data() {
    return {
      AJAX_URL: 'http://courses.site/soap/soap-server/client/index.php',
      assetUrl: 'http://courses.site/soap/soap-server/server/assets/',
      assetAutoUrl: 'http://courses.site/soap/soap-server/server/assets/auto/',
    }
  }
}
</script>

<style>

</style>
