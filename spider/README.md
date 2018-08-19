# 读读读网站爬虫

> 小说网站的爬虫程序

## 依赖
- cheerio
- log4js
- mysql
- superagent

## 指令
```
node index.js controller [url=http://www.baidu.com] [categoryId=1] [novelId=1] [chapterId=1]
```

## 控制器(controller)

根据指令, 爬取指定网址, 调起分析器解析出数据

对数据做处理, 最后在数据库追加或者更新数据

## 分析器(analyser)

对网页做分析, 分析出数据来

## errorHandler 错误处理器 TODO

根据传入的errorCode, 进行处理错误

### 负责内容
- 处理错误
