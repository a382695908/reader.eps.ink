<template>
  <div class="block">
    <h2 class="block-title">{{title}}</h2>
    <div class="novel-wrapper">
      <div class="novel" v-for="item in novelList" :key="item.novel_id">
        <img class="novel-img" :src="item.picture_url">
        <div class="novel-intro">
          <h2 class="novel-name">{{item.novel_name}}</h2>
          <p class="novel-author-name">作者：{{item.author_name}}</p>
          <p class="novel-introduction">{{item.introduction}}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import "rpg-awesome/css/rpg-awesome.min.css";

export default {
  name: "BlockComponent",
  created() {},
  props: ["title", "novelList"]
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
.novel-introduction {
  font-size: 14px;
}
</style>
