# Tuling robot for Laravel 5

[![Build Status][ico-travis]][link-travis]
[![codecov][ico-codecov]][link-codecov]

## 关于
Tuling robot是对图灵机器人的封装

## 安装方法
在你的`composer.json`中引用 `wjh/tuling`，然后更新依赖关系：
```sh
$ composer require wjh/tuling
```

在`config/app.php`服务提供者数组中添加`Wjh\Tuling\ServiceProvider`
```php
Wjh\Tuling\ServiceProvider::class,
```

## 使用方法
```php
$tuling = new Wjh\Tuling\Tuling($appUrl, $appKey, new Curl\Curl());
$tuling->handle();
```

## 配置文件
默认的配置文件在config/tuling.php，复制该文件到你的文件夹中并修改，发布配置文件通过以下命令：
```php
php artisan vendor:publish --provider="Wjh\Tuling\ServiceProvider"
```
app_url和app_key可以到[图灵官网](http://www.tuling123.com)上申请

```php
return [
    'app_url' => env('tuling_app_url'),
    'app_key' => env('tuling_app_key'),
];
```


[ico-travis]: https://travis-ci.org/wjhtime/tuling.svg?branch=dev
[ico-codecov]:https://codecov.io/gh/wjhtime/tuling/branch/dev/graph/badge.svg
[link-travis]: https://travis-ci.org/wjhtime/tuling
[link-codecov]:https://codecov.io/gh/wjhtime/tuling