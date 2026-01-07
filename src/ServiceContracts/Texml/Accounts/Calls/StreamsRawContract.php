<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface StreamsRawContract
{
    /**
     * @api
     *
     * @param string $streamingSid path param: Uniquely identifies the streaming by id
     * @param array<string,mixed>|StreamStreamingSidJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StreamStreamingSidJsonResponse>
     *
     * @throws APIException
     */
    public function streamingSidJson(
        string $streamingSid,
        array|StreamStreamingSidJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
