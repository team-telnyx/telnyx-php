<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Balance\BalanceGetResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

interface BalanceContract
{
    /**
     * @api
     *
     * @return BalanceGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): BalanceGetResponse;

    /**
     * @api
     *
     * @return BalanceGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): BalanceGetResponse;
}
