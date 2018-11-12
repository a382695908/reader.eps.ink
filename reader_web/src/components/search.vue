<template>
<div class="search-form">
    <input class="search-box" name="q" title="输入搜索词" type="search" value="" maxlength="100" autocapitalize="off" autocorrect="off" autocomplete="off" spellcheck="false" placeholder="输入书名后搜索，宁可少字不要错字">
    <span class="submit-wrapper">
      <input type="submit" title="搜索" tabindex="0" name="go" value="搜索">
    </span>
</div>
</template>

<script>
export default {
  name: "searchComponent",
  created() {},
  data() {
    return {};
  }
};
</script>

<style>
.search-form {
  position: relative;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  height: 44px;
  margin: 8px;
  border-radius: 6px;
  z-index: 1;
  border-color: #ddd;
  background-color: #fff;
  -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05),
    0 1px 3px 1px rgba(0, 0, 0, 0.16);
  box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05), 0 1px 3px 1px rgba(0, 0, 0, 0.16);
}

.search-box {
  min-width: auto;
  border: none;
  outline: none;
  -webkit-appearance: none;
  z-index: 1;
  height: 44px;
  display: inline-block;
  flex: 1 0;
  -webkit-tap-highlight-color: transparent;
  padding: 0 7px 0 12px;
  font-size: 16px;
}

.submit-wrapper {
  width: 20px;
  height: 20px;
  border: 0;
  margin: 12px 12px 12px 11px;
  text-indent: -99em;
  background: url(https://cn.bing.com/sa/simg/SharedSpriteMobile_2018_07_12.png)
    no-repeat -31px 0;
  background-size: 320px 38px;
}
</style>
