<?php

namespace Ex\App\Resource\Page;

use BEAR\Resource\ResourceObject;

class Index extends ResourceObject
{
    public function onGet($name = 'World')
    {
        $this['greeting'] = 'Hello '.$name;

        return $this;
    }
}
