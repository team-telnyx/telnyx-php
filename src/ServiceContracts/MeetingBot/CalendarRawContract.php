<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MeetingBot;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MeetingBot\Calendar\CalendarRetrieveOAuthCallbackParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CalendarRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CalendarRetrieveOAuthCallbackParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function retrieveOAuthCallback(
        array|CalendarRetrieveOAuthCallbackParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
