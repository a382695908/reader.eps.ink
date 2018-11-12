<template>
<div class="rank-page">
    <r-header :title="currentRankName"></r-header>
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
        category_name: "日点击榜",
        isActive: 1
      },
      {
        category_id: 2,
        category_name: "日点击榜",
        isActive: 0
      },
      {
        category_id: 3,
        category_name: "日点击榜",
        isActive: 0
      },
      {
        category_id: 4,
        category_name: "总点击榜",
        isActive: 0
      },
      {
        category_id: 5,
        category_name: "总收藏榜",
        isActive: 0
      },
      {
        category_id: 6,
        category_name: "字数排行",
        isActive: 0
      },
      {
        category_id: 7,
        category_name: "日推荐榜",
        isActive: 0
      },
      {
        category_id: 8,
        category_name: "周推荐榜",
        isActive: 0
      },
      {
        category_id: 9,
        category_name: "月推荐榜",
        isActive: 0
      },
      {
        category_id: 10,
        category_name: "总推荐榜",
        isActive: 0
      },
      {
        category_id: 11,
        category_name: "最新入库",
        isActive: 0
      },
      {
        category_id: 12,
        category_name: "最近更新",
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
      currentRankName: "排行榜",
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

