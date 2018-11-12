<template>
<div class="category-page">
    <r-header :title="currentCategoryName"></r-header>
    <r-navigation></r-navigation>
    <r-search></r-search>
    <r-category :list="categoryList"></r-category>
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
import rCategory from "@/components/category.vue";
import rNovels from "@/components/novels.vue";
import chunk from "lodash/chunk";

export default {
  created() {
    let self = this;
    let categoryList = [
      {
        category_id: 1,
        category_name: "玄幻魔法",
        isActive: 1
      },
      {
        category_id: 2,
        category_name: "武侠修真",
        isActive: 0
      },
      {
        category_id: 3,
        category_name: "都市言情",
        isActive: 0
      },
      {
        category_id: 4,
        category_name: "历史军事",
        isActive: 0
      },
      {
        category_id: 5,
        category_name: "侦探推理",
        isActive: 0
      },
      {
        category_id: 6,
        category_name: "网游动漫",
        isActive: 0
      },
      {
        category_id: 7,
        category_name: "科幻灵异",
        isActive: 0
      },
      {
        category_id: 8,
        category_name: "其他类型",
        isActive: 0
      }
    ];
    self.categoryList = chunk(categoryList, 3);
    // console.log(self.categoryList);
  },
  data() {
    return {
      categoryList: [],
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
      currentCategoryName: "小说分类",
      page: 1,
      maxPage: 100
    };
  },
  components: {
    rHeader,
    rNavigation,
    rSearch,
    rCategory,
    rNovels
  },
  methods: {}
};
</script>

