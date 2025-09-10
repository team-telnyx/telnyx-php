<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Balance\BalanceGetResponse;
use Telnyx\RequestOptions;

interface BalanceContract
{
    /**
     * @api
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): BalanceGetResponse;
}
