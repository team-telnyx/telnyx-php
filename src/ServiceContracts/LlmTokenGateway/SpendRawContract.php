<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\LlmTokenGateway;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse;
use Telnyx\LlmTokenGateway\Spend\SpendGetSummaryResponse;
use Telnyx\LlmTokenGateway\Spend\SpendRetrieveEventsParams;
use Telnyx\LlmTokenGateway\Spend\SpendRetrieveSummaryParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SpendRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SpendRetrieveEventsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpendGetEventsResponse>
     *
     * @throws APIException
     */
    public function retrieveEvents(
        array|SpendRetrieveEventsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SpendRetrieveSummaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpendGetSummaryResponse>
     *
     * @throws APIException
     */
    public function retrieveSummary(
        array|SpendRetrieveSummaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
