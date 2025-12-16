<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Chat\ChatCreateCompletionParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ChatRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ChatCreateCompletionParams $params
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function createCompletion(
        array|ChatCreateCompletionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
