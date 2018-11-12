<template>
  <div class="category-novel-list">
      <p class="novel-row" v-for="item in list" :key="item.novel_id">[{{item.category_name}}]<a class="novel-link">{{item.novel_name}}</a>/{{item.author_name}}</p>
  </div>
</template>

<script>
export default {
  name: "NovelsComponent",
  created() {},
  props: ["list"]
};
</script>

<style>
.category-novel-list {
  width: 99%;
  margin: 10px auto 10px auto;
  height: auto;
  overflow: hidden;
}

.category-novel-list .novel-row {
  border-bottom: 1px solid #efefef;
  padding-bottom: 5px;
  padding-top: 5px;
  color: #999;
  text-indent: 8px;
}

.category-novel-list .novel-row .novel-link {
  color: #007bb1;
  font-size: 18px;
}
</style>
