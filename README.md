# m_blog

#### 介绍
基于ThinkPHP5.1框架，实现简单的Blog实例

#### 部署
1. 先运行 composer update，更新一下依赖；
2. 修改 config/database.php 文件中，数据库连接的配置参数，并创建好数据库；
3. 然后在命令行中执行 `php think migrate:run` 和 `php think seed:run` 来创建迁移数据；

#### 运行
后台登陆账号 `admin`，密码 `admin`

#### 最后
这是简单的博客案例，基于ThinkPHP5.1框架，前台是用Booststrap写的。
后期慢慢会把想到的功能加上去。