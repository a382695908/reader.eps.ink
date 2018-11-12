<template>
<div class="home-page">
    <div class="header">
        <div class="logo">读读读</div>
        <div class="btn-group">
            <a>登录</a>
            <a>注册</a>
        </div>
    </div>
    <r-navigation></r-navigation>
    <r-search></r-search>
    <r-block v-for="(block,index) in blockList" :title="block.title" :novelList="block.novelList" :key="index"></r-block>
</div>
</template>

<script>
// import rHeader from "@/components/header.vue";
import rNavigation from "@/components/navigation.vue";
import rSearch from "@/components/search.vue";
import rBlock from "@/components/block.vue";

export default {
  data() {
    return {
      blockList: [
        {
          title: "封面推荐",
          novelList: [
            {
              picture_url:
                "http://www.shuquge.com/files/article/image/63/63542/63542s.jpg",
              novel_name: "YOYO",
              novel_id: 1,
              author_name: "ali",
              introduction:
                "举头三尺无神明，掌心三寸是人间。这是耳根继《仙逆》《求魔》《我欲封天》《一念永恒》后，创作的第五部长篇小说《三寸人间》。"
            },
            {
              picture_url:
                "http://www.shuquge.com/files/article/image/63/63542/63542s.jpg",
              novel_name: "dasd",
              novel_id: 2,
              author_name: "ali",
              introduction: "ahhaha"
            }
          ]
        },
        {
          title: "玄幻魔法",
          novelList: [
            {
              picture_url:
                "http://www.shuquge.com/files/article/image/63/63542/63542s.jpg",
              novel_name: "YOYO",
              novel_id: 3,
              author_name: "ali",
              introduction:
                "举头三尺无神明，掌心三寸是人间。这是耳根继《仙逆》《求魔》《我欲封天》《一念永恒》后，创作的第五部长篇小说《三寸人间》。"
            },
            {
              picture_url:
                "http://www.shuquge.com/files/article/image/63/63542/63542s.jpg",
              novel_name: "dasd",
              novel_id: 4,
              author_name: "ali",
              introduction: "ahhaha"
            }
          ]
        }
      ]
    };
  },
  components: {
    rNavigation,
    rSearch,
    rBlock
  },
  methods: {}
};
</script>

<style>
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #007bb1;
  font-size: 16px;
  height: 50px;
  line-height: 50px;
  padding: 0 10px;
}
.logo {
  font-size: 20px;
  color: #fff;
}
.btn-group a {
  font-size: 16px;
  color: #fff;
}
</style>
