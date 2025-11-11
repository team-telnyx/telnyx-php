<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonResponse;

interface StreamsContract
{
    /**
     * @api
     *
     * @param array<mixed>|StreamStreamingSidJsonParams $params
     *
     * @throws APIException
     */
    public function streamingSidJson(
        string $streamingSid,
        array|StreamStreamingSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): StreamStreamingSidJsonResponse;
}
