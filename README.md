laravel多模块测试版本

如何安装？
composer require jou/modules

laravel版本 >= 6.0

注册服务提供程序

config/app.php 

providers 添加：Jou\Modules\ModulesServiceProvider::class

---------------------------------------
创建模块

php artisan module:make {模块名称}

将会在app目录下创建Modules创建出一个模块

如何访问模块？

http://域名.com/{模块名}

该本版为测试版本，还有许多bug
