<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Chat\ChatCreateCompletionParams;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ChatContract
{
    /**
     * @api
     *
     * @param array<mixed>|ChatCreateCompletionParams $params
     *
     * @throws APIException
     */
    public function createCompletion(
        array|ChatCreateCompletionParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
