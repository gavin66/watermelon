## watermelon
基于 laravel5.2 开发的博客系统

## 服务器需求
* PHP版本 >= 5.5.9
* Mysql 版本 >= 5.7 ( 数据存储用到了 JSON 数据类型)
* 必须安装 Redis(使用它缓存数据)
* composer (用来下载更新 laravel 依赖库)

## 安装 watermelon
1.把源码下载下来
```Shell
clone git@github.com:gavin66/watermelon.git
```
2.下载 laravel 依赖库
```Shell
composer install
```
3.修改配置文件,把文件 .env.example 重命名为 .env
```Shell
 mv .env.example .env 
```

4.生成应用 key
将应用的 key（APP_KEY）设置为一个随机字符串,如果应用 key 没有被设置，用户 Session 和其它加密数据将会有安全隐患。
```Shell
php artisan key:generate
```
5.修改目录权限
确保提供 www 服务的用户对 storage,public和 bootstrap/cache 目录是可读写的
6.在你的 Mysql 上新建一个数据库,数据库名下面需要
7.配置数据库信息
```
DB_CONNECTION=mysql  // 不需要修改
DB_HOST=127.0.0.1 // 数据库IP
DB_PORT=3306 // 端口
DB_DATABASE=homestead // 第6步新建的数据库名 
DB_USERNAME=homestead // 登录的用户名,
DB_PASSWORD=secret // 密码
```
8.数据库迁移
```Shell
php artisan migrate // 生成表结构
```
9.初始化数据库数据
```Shell
 php artisan db:seed
 ```
 10.评论功能
 **目前只支持多说评论**,在多说后台新建一个评论站点,获取设置中的信息,填入 .env 文件中
 ```
DS_SECRET=null // 多说密钥
DS_SHORT_NAME=null // 站点注册的多说二级域名。注意：你注册了http://apitest.duoshuo.com/时，多说二级域名为**apitest**。
DS_RANGE=monthly // 热门文章获取范围,获取的范围。daily：每日热评文章； weekly：每周热评文章； monthly：每月热评文章；all：总热评文章。
DS_NUM_ITEMS=5 // 热门文章获取条数
 ```
 11.mysql云备份
 目前只支持 dropbox 驱动,在 dropbox 后台新建一个 app
 ,获取信息填入 .env 文件中.由于目前天朝网络无法访问 dropbox,固例行性工作调度的 Mysql 云备份功能已暂停.但是命令行下仍可备份.
 ```
DROPBOX_TOKEN=null // Generated access token
DROPBOX_KEY=null // App key
DROPBOX_SECRET=null // App secret
DROPBOX_APP=null // App folder name
DROPBOX_ROOT=null // 上传文件的根目录
```

```Shell 
php artisan watermelon:database-backup // 命令行下云备份 Mysql 数据库,但需确保配置信息正确,网络畅通.
```
12.开启 Linux 例行性工作调度(更新 Redis 数据)

```Shell
crontab -e 
// 添加以下一行,注意环境变量是否正确,php命令能否执行,目录自行修改
* * * * *  php /watermelon/artisan schedule:run 1>> /dev/null 2>&1
```
**至此安装完成**

## 贡献
此版本为测试版,Bug 不会少,请谨慎使用,此项目会持续维护下去,如有任何问题或提议请给我提交 Issues,谢谢.
 
## Github 项目地址
[watermelon](https://github.com/gavin66/watermelon) 

