<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SessionAnalysis\SessionAnalysisGetResponse;
use Telnyx\SessionAnalysis\SessionAnalysisRetrieveParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SessionAnalysisRawContract
{
    /**
     * @api
     *
     * @param string $eventID path param: The event identifier (UUID)
     * @param array<string,mixed>|SessionAnalysisRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SessionAnalysisGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $eventID,
        array|SessionAnalysisRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
