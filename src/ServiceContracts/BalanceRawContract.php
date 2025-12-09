<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Balance\BalanceGetResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface BalanceRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<BalanceGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
