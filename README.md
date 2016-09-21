

##Installation

Via Composer:

```
composer require csi0n/exception-mail
```

```
 "require": {

        "csi0n/exception-mail": "^1.0"
}

```


##Usage

`config/app.php`
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


