<?php

namespace Ex\App;

use BEAR\Package\Bootstrap;
use BEAR\Package\AppMeta;
use Doctrine\Common\Cache\ApcCache;
use Doctrine\Common\Annotations\AnnotationRegistry;

/**
 * @global string $context
 */

loader: {
    $loader = require dirname(dirname(dirname(__DIR__))) . '/vendor/autoload.php';
    $loader->addPsr4('Ex\App\\', dirname(__DIR__) . '/src');
    /** @var $loader \Composer\Autoload\ClassLoader */
    AnnotationRegistry::registerLoader([$loader, 'loadClass']);
}

route: {
    $app = (new Bootstrap)->newApp(new AppMeta(__NAMESPACE__), $context, new ApcCache);
    /** @var $app \BEAR\Sunday\Extension\Application\AbstractApp */
    $_SERVER; // touch for $GLOBALS['_SERVER']
    $request = $app->router->match($GLOBALS);
}

try {
    // resource request
    $page = $app->resource
        ->{$request->method}
        ->uri($request->path)
        ->withQuery($request->query)
        ->request();
    /** @var $page \BEAR\Resource\Request */

    // representation transfer
    $page()->transfer($app->responder);
} catch (\Exception $e) {
    $code = $e->getCode() ?: 500;
    http_response_code((int) $code);
    echo $code;
    error_log($e);
}
