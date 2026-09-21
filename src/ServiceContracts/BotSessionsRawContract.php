<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BotSessions\BotSessionListParams;
use Telnyx\BotSessions\BotSessionListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BotSessionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BotSessionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BotSessionListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|BotSessionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
