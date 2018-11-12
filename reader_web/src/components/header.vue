<template>
<div class="header">
    <div class="back-btn"><a>返回</a></div>
    <h1 class="header-title">{{title}}</h1>
    <div class="home-btn"><a>首页</a></div>
</div>
</template>

<script>
export default {
  name: "headerComponent",
  props: ["title"]
};
</script>

<style>
.header {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #007bb1;
  font-size: 16px;
  height: 50px;
  line-height: 50px;
  padding: 0 10px;
}

.header .back-btn {
  position: absolute;
  padding: 0 10px;
  height: 28px;
  margin: 10px 10px;
  line-height: 28px;
  font-size: 14px;
  background-color: #65bbec;
  border-radius: 3px;
  width: 30px;
  left: 0;
  top: 0;
}

.header .header-title {
  font-size: 16px;
  font-weight: 400;
  height: 50px;
  margin: 0 70px 0 70px;
  text-align: center;
  color: #fff;
  display: block;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
}

.header .home-btn {
  color: #fff;
  position: absolute;
  padding: 0 10px;
  width: 30px;
  height: 28px;
  margin: 10px 10px;
  line-height: 28px;
  text-align: center;
  border-radius: 3px;
  right: 0;
  top: 0;
  font-size: 14px;
  background-color: #65bbec;
}

.header .back-btn a,
.header .home-btn a {
  color: #fff;
}
</style>
