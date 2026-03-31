<?php

namespace Zaptilo\Whatsapp\Facades;

use Illuminate\Support\Facades\Facade;

class Zaptilo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'zaptilo';
    }
}
