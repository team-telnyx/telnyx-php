<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportCreateParams;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SubNumberOrdersReportRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SubNumberOrdersReportCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubNumberOrdersReportNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SubNumberOrdersReportCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $reportID The unique identifier of the sub number orders report
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubNumberOrdersReportGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $reportID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $reportID The unique identifier of the sub number orders report
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function download(
        string $reportID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
