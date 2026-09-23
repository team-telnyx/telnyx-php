<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Calls\CallCreateParams;
use Telnyx\Texml\Calls\CallNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CallsRawContract
{
    /**
     * @api
     *
     * @param string $connectionID the ID of the connection holding the TeXML application to call from
     * @param array<string,mixed>|CallCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        array|CallCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
