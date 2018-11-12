<template>
<div class="bookcase-page">
    <r-header :title="'我的书架'"></r-header>
    <r-navigation></r-navigation>
    <r-search></r-search>
    <div class="block">
        <h2 class="block-title">我的书架</h2>
        <div class="novel-wrapper">
            <div class="novel" v-for="item in bookCaseList" :key="item.novel_id">
                <img class="novel-img" :src="item.picture_url">
                <div class="novel-intro">
                    <h2 class="novel-name">{{item.novel_name}}</h2>
                    <p class="novel-author-name">作者：{{item.author_name}}</p>
                    <p class="update-at">更新到: <a class="update-to-link" href="">第一千零五十九章 融合地狱树（二合一）</a></p>
                    <p class="read-at">已读到: <a href="read-to-link">第三章 第三个选择【求收藏】</a></p>
                </div>
            </div>
            <div class="delete-btn-wrapper"><a class="delete-btn">删除</a></div>
        </div>
    </div>
</div>
</template>

<script>
import rHeader from "@/components/header.vue";
import rNavigation from "@/components/navigation.vue";
import rSearch from "@/components/search.vue";

export default {
  created() {},
  data() {
    return {
      bookCaseList: [
        {
          bookcase_id: 1,
          novel_id: 1,
          picture_url:
            "http://www.shuquge.com/files/article/image/63/63542/63542s.jpg",
          novel_name: "YOYO",
          author_name: "ali"
        }
      ]
    };
  },
  components: {
    rHeader,
    rNavigation,
    rSearch
  },
  methods: {}
};
</script>

<style>
.block-title {
  height: 35px;
  background: #ecf0f0;
  border-bottom: 1px solid #007bb1;
  color: #000;
  font-size: 16px;
  padding-left: 10px;
  line-height: 35px;
  font-weight: 700;
}

.novel-wrapper {
  position: relative;
  padding: 10px;
}

.novel {
  display: flex;
  padding-bottom: 10px;
}

.novel-img {
  height: 100px;
  width: 80px;
  border: 1px solid #000;
}

.novel-intro {
  flex: 1;
  height: 100px;
  overflow: hidden;
  line-height: 20px;
  padding-left: 10px;
}

.novel-name {
  font-size: 16px;
}

.novel-author-name {
  font-size: 14px;
  font-weight: 400;
  color: #999;
}

.update-at,
.read-at {
  font-size: 13px;
  line-height: 27px;
  height: 27px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  color: #a8a8a8;
  font-size: 13px;
}
.update-to-link {
  color: red;
}

.delete-btn-wrapper {
  z-index: 999;
  position: absolute;
  right: 8px;
  top: 18px;
}

.delete-btn {
  box-sizing: border-box;
  display: inline-block;
  width: 55px;
  height: 30px;
  font-size: 13px;
  line-height: 30px;
  border-radius: 4px;
  text-align: center;
  border: 1px solid #ff4643;
  background: none;
  color: #ff4643;
}
</style>
