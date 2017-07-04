##安装

```
composer require csi0n/laravel-excetion
```
或者在`composer.json`中添加
```
 "require": {

        "csi0n/exception-mail": "^1.0"
}

```
然后执行`composer update`


##使用方法

在`config/app.php`中添加
```
'providers' => [
   csi0n\ExceptionEmail\ExceptionMailServiceProvider::class,
]
.....
'aliases' => [
        'ExceptionEmailRepository' => csi0n\ExceptionEmail\Facades\ExceptionEmailFacade::class,
    ],
```


`php artisan vendor:publish`

`config/exception_mail.php`
Add `ExceptionEmailRepository::send($e);` to `app\Exceptions\Handle.php` like this:
```
public function render($request, Exception $e)
    {
        ExceptionEmailRepository::send($e);
        return parent::render($request, $e);
    }
```
Enjoy it!


