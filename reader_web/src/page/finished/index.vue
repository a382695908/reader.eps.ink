<template>
<div class="finished-page">
    <r-header :title="'完本小说'"></r-header>
    <r-navigation></r-navigation>
    <r-search></r-search>
    <r-novels :list="categoryNovelList"></r-novels>
    <div class="page">
        <a>首页</a>
        <a>上页</a>
        <a>下页</a>
        <a>尾页</a>
    </div>
    <div class="page">
      跳转到&nbsp;<input class="page-input" type="number" placeholder="请输入页数">&nbsp;页
      <div>(第{{page}}/{{maxPage}}页) 当前20条/页</div>
    </div>
</div>
</template>

<script>
import rHeader from "@/components/header.vue";
import rNavigation from "@/components/navigation.vue";
import rSearch from "@/components/search.vue";
import rBlock from "@/components/block.vue";
import rNovels from "@/components/novels.vue";
import chunk from "lodash/chunk";

export default {
  created() {},
  data() {
    return {
      categoryNovelList: [
        {
          novel_id: 1,
          category_name: "玄幻魔法",
          novel_name: "幽冥少年传说",
          author_name: "突破天际"
        },
        {
          novel_id: 2,
          category_name: "玄幻魔法",
          novel_name: "还是地球人狠",
          author_name: "突破天际"
        }
      ],
      page: 1,
      maxPage: 100
    };
  },
  components: {
    rHeader,
    rNavigation,
    rSearch,
    rNovels
  },
  methods: {}
};
</script>

<style>
.category-wrapper {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}

.category-wrapper .category {
  display: block;
  text-align: center;
  padding: 10px 5px;
  background-color: #fff;
  color: #000;
  border: 1px solid #efefef;
  flex: 1;
  margin: 0 0 5px 7px;
}

.category-wrapper .category-active {
  background-color: #ccc;
}
</style>
