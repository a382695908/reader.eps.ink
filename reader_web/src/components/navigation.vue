<template>
  <ul class="navigation">
    <li><a>首页</a></li>
    <li><a>分类</a></li>
    <li><a>全本</a></li>
    <li><a>排行</a></li>
    <li><a>书架</a></li>
  </ul>
</template>

<script>
export default {
  name: "navigationComponent",
  created() {},
  data() {
    return {};
  }
};
</script>

<style>
.navigation {
  display: flex;
  justify-content: space-around;
  align-items: center;
  height: 35px;
  line-height: 35px;
  background-color: #ecf0f0;
}
</style>
