<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportGetResponseItem;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListParams;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListResponse;

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
     * @return BaseResponse<list<VoiceSDKCallReportGetResponseItem>>
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
     * @return BaseResponse<DefaultFlatPagination<VoiceSDKCallReportListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|VoiceSDKCallReportListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
