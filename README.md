laravel多模块测试版本，当前版本属于开发功能完善阶段

| **Laravel**  |  **laravel-modules** |
|---|---|
| 6.0  | dev:master  |

##安装

通过Composer安装，请运行以下命令：

``` bash
composer require jou/modules
```



##注册服务提供程序

``` bash
config/app.php 

providers 添加：Jou\Modules\ModulesServiceProvider::class
```
---------------------------------------
#模块的使用

##创建模块

``` bash
php artisan module:make {模块名称}

例如:php artisan module:make test
```
创建生成的目录为app/Modules/{模块名称}

#模块目录说明

###Config
该目录是配置文件目录
####如何调用配置文件
``` bash
config("模块名称.配置文件名称.参数名称")

例如 config("test.config.version")
```
###Console
目前该目录功能正在完善

###Resources
相当于Laravel的resources目录，主要是模板文件的存放处

###Routes
路由文件



#如何访问访问设置好的路由？

http://域名.com/{模块名}/路由


