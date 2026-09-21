<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BotChallenge\BotChallengeCreateParams;
use Telnyx\BotChallenge\BotChallengeNewResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BotChallengeRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BotChallengeCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BotChallengeNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|BotChallengeCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
