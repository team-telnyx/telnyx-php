<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Balance\BalanceGetResponse;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

interface BalanceContract
{
    /**
     * @api
     *
     * @return BalanceGetResponse<HasRawResponse>
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): BalanceGetResponse;
}
