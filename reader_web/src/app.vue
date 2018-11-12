<template>
  <div id="app">
    <!-- <img src="./assets/logo.png"> -->
    <router-view/>
  </div>
</template>

<script>
export default {
  name: "app"
};
</script>

<style>
#app {
  font-family: "Microsoft YaHei";
}
body,
div,
p,
ul,
h1,
h2,
h3,
h4,
h5 {
  margin: 0;
  padding: 0;
}
a {
  color: #000;
  text-decoration: none;
}
li {
  list-style: none;
}
img {
  border: none;
  margin: 0;
  padding: 0;
}
.page {
  height: auto;
  padding-bottom: 10px;
  padding-top: 10px;
  text-align: center;
  color: #999;
}
.page a {
  text-align: center;
  padding: 4px 15px 4px 15px;
  margin-right: 5px;
  border-radius: 3px;
  background: #2a7ce7;
  color: #fff;
}
.page .page-input {
  height: 20px;
  line-height: 20px;
  font-size: 16px;
  border: 1px solid #999;
}
</style>
