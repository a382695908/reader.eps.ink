<template>
<div class="login-page">
    <r-header :title="'用户登录'"></r-header>
    <div class="form">
        <div class="form-control">
            <label>账号:</label>
            <input class="input-account" type="text">
        </div>
        <div class="form-control">
            <label>密码:</label>
            <input class="input-password" type="password">
        </div>
        <div class="form-control">
            <label>账号:</label>
            <input class="input-email" type="email">
        </div>
        <div class="form-control">
            <label>验证码:</label>
            <input class="input-verify-code" type="number">
        </div>
    </div>
    <a class="login-btn">确认注册</a>
    <a class="login-btn">已有账号，点击登录</a>
    <a class="login-btn">登录</a>
    <a class="login-btn">没有账号？点击注册</a>
</div>
</template>

<script>
import rHeader from "@/components/header.vue";

export default {
  created() {},
  data() {
    return {};
  },
  components: {
    rHeader
  },
  methods: {}
};
</script>

<style>
.form {
  margin-top: 20px;
}
.form-control {
  display: flex;
  justify-content: center;
  align-content: center;
  margin: 10px 0;
}
.form-control label {
  width: 20%;
  font-size: 16px;
  color: #999;
  height: 30px;
  line-height: 30px;
}
.form-control input {
  border: 1px solid #b7f3f9;
  height: 30px;
  line-height: 30px;
  width: 70%;
  border-radius: 3px;
  padding-left: 5px;
  font-size: 18px;
}

.login-btn {
  display: block;
  margin: 20px 10px 20px 10px;
  text-align: center;
  color: #fff;
  font-weight: bold;
  height: 40px;
  line-height: 40px;
  border-radius: 2px;
  background-color: #0080c0;
}
</style>

