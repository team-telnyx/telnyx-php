<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReport;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VoiceSDKCallReportsRawContract
{
    /**
     * @api
     *
     * @param string $callID call identifier used to retrieve reports owned by the authenticated user
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<VoiceSDKCallReport>>
     *
     * @throws APIException
     */
    public function retrieve(
        string $callID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|VoiceSDKCallReportListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<VoiceSDKCallReport>>
     *
     * @throws APIException
     */
    public function list(
        array|VoiceSDKCallReportListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
