# 读读读网站爬虫

> 小说网站的爬虫程序

## 流程
- 入口(/index.js) => 更新器(/logic/updater) => 分析器(/logic/analyser) => 数据处理(/model/index.js)
- 入口(/index.js) => 爬取器(/logic/crawler) => 分析器(/logic/analyser) => 数据处理(/model/index.js)

中间如果出错, 错误处理器(errorHanlder) 将处理

## 爬取器(crawler)
```
node index.js crawler [url=http://www.baidu.com] [categoryId=1] [novelId=1] [chapterId=1]
```
爬取指定网址, 或者传入相关id, 最后在数据库追加数据

### 负责内容
- 读取url, 得到html
- 下载html


## 分析器(analyser)
```
node index.js crawler [url=http://www.baidu.com] [categoryId=1] [novelId=1] [chapterId=1]
```
爬取指定网址, 或者传入相关id, 最后在数据库追加数据

### 负责内容
- 解析html


## 更新器(updater)

```
node index.js updater [url=http://www.baidu.com] [categoryId=1] [novelId=1] [chapterId=1]
```
爬取指定网址, 或者传入相关id, 最后在数据库更新数据

### 负责内容
- 对已有的数据更新

## errorHandler 错误处理器

根据传入的errorCode, 进行处理错误 TODO

### 负责内容
- 处理错误
