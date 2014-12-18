Ex.Package
==========

## Ex Package for BEAR.Sunday

### include packages

 * [aura/sql](https://github.com/auraphp/Aura.Sql)
 * [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv)
 
## composer install

```
$ create-project bear/skeleton:~1.0@dev Vendor.Package // install bear.skeleton first
$ cd Vendor.Package
$ composer install
$ composer require ex/package:~0.1@dev
$ phpunit
```
## module install

```
use Ex\Package\ExAppModule;
use Ray\Di\AbstractModule;

use Ex\Package\ExAppModule;

class AppModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->install(new ExAppModule);
    }
}
```

## Config

### Database

    $ cp vendor/ex/package/docs/demo-app/.env .

.env
```
DB_DSN=mysql:host=localhost;dbname=testdb
DB_USER=username
DB_PASS=password
```
 * [PDOドライバ](http://php.net/manual/ja/pdo.drivers.php)

## DI

### 
 * [AuraSqlInject](https://github.com/BEARSunday/Ex.Package/blob/master/src/Inject/AuraSqlInject.php) for `ExtendedPdoInterface` 

## Demo

 * [demo-app](https://github.com/BEARSunday/Ex.Package/tree/master/docs/demo-app)
 * [data base access](https://github.com/BEARSunday/Ex.Package/blob/master/docs/demo-app/src/Resource/App/Person.php)
 * [.env](https://github.com/BEARSunday/Ex.Package/blob/master/docs/demo-app/.env)
