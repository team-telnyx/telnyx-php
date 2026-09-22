<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Typesafe;

use Telnyx\AI\Typesafe\V1\V1SystemoneParams;
use Telnyx\AI\Typesafe\V1\V1SystemoneResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface V1RawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|V1SystemoneParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<V1SystemoneResponse>
     *
     * @throws APIException
     */
    public function systemone(
        array|V1SystemoneParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
