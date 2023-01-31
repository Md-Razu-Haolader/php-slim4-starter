<?php

declare(strict_types=1);

namespace App\Proxies;

use App\Helpers\Common;

class CommonHelper extends Proxy
{
    /**
     * Get the registered name of the helper proxy.
     *
     * @return string
     */
    protected static function getProxyAccessor()
    {
        return new Common();
    }
}
