import Vue from 'vue'
import Router from 'vue-router'

import HomePage from '@/page/home/index.vue'
import CategoryPage from '@/page/category/index.vue'
import FinishedPage from '@/page/finished/index.vue'
import RankPage from '@/page/rank/index.vue'
import LoginPage from '@/page/login/index.vue'
import BookcasePage from '@/page/bookcase/index.vue'

Vue.use(Router)

export default new Router({
  routes: [{
    path: '/',
    name: 'Home',
    component: HomePage
  }, {
    path: '/category',
    name: 'Category',
    component: CategoryPage
  }, {
    path: '/finished',
    name: 'finished',
    component: FinishedPage
  }, {
    path: '/rank',
    name: 'rank',
    component: RankPage
  }, {
    path: '/login',
    name: 'login',
    component: LoginPage
  }, {
    path: '/bookcase',
    name: 'bookcase',
    component: BookcasePage
  }]
})
