<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailEvents\EmailEventGetStatsResponse;
use Telnyx\EmailEvents\EmailEventListParams;
use Telnyx\EmailEvents\EmailEventListResponse;
use Telnyx\EmailEvents\EmailEventRetrieveStatsParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailEventsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EmailEventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailEventListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|EmailEventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailEventRetrieveStatsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailEventGetStatsResponse>
     *
     * @throws APIException
     */
    public function retrieveStats(
        array|EmailEventRetrieveStatsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
