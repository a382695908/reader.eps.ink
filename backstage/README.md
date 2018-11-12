# dududu backstage

## TODO
- 管理后台的背景图


## API

### 登录页
- admin/get_login_background 后台背景
- admin/login 后台登录

### 主页
- admin/get_home_user 获取后台首页的用户信息
- admin/get_create_novel_count 今日新增小说量
- admin/get_website_visit_count 今日网站浏览量
- admin/get_update_chapter_count 今日章节更新量
- admin/get_todo_list 待办事项
- admin/add_todo 新增待办事项
- admin/finish_todo 完成待办事项
- admin/get_last_week_visit 获取上周的来访统计
- admin/get_source_data_statistics 获取来源数据统计信息
- admin/get_today_visitor_place 获取今日访客浏览地理分布信息

### 消息中心
- admin/get_unread_message 获取未读消息
- admin/mark_unread_message 标记未读消息为已读
- admin/get_hasread_message 获取已读消息
- admin/delete_message 删除已读消息
- admin/get_usdeleted_message 获取已删除(回收站)的消息

### 个人中心
- admin/update_user_info 修改用户信息
- admin/update_user_password 修改用户密码


### 小说管理
- admin/get_novels 获取所有小说(待筛选)
- admin/update_novels 更新小说信息
- admin/delete_novels 删除小说
- admin/add_novels 创建小说
- admin/novels_detail 小说详情
- admin/export_novels 导出小说(下载)

### 小说分类管理
- admin/get_novels_category 获取所有小说分类(待筛选)
- admin/update_novels_category 更新小说分类信息
- admin/delete_novels_category 删除小说分类
- admin/add_novels_category 创建小说分类
- admin/novels_category_detail 小说分类详情

### 用户管理
