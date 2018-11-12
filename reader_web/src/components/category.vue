<template>
    <div>
        <div class="category-wrapper" v-for="(category,index) in list" :key="index">
            <div class="category" :class="{'category-active':item.isActive}" v-for="item in category" :key="item.category_id">{{item.category_name}}</div>
        </div>
    </div>
</template>

<script>
export default {
  name: "CategoryComponent",
  props: ["list"]
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
