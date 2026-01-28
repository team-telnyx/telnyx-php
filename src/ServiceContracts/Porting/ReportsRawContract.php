<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Porting;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Porting\Reports\PortingReport;
use Telnyx\Porting\Reports\ReportCreateParams;
use Telnyx\Porting\Reports\ReportGetResponse;
use Telnyx\Porting\Reports\ReportListParams;
use Telnyx\Porting\Reports\ReportNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ReportsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ReportCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReportNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ReportCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies a report
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReportGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ReportListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PortingReport>>
     *
     * @throws APIException
     */
    public function list(
        array|ReportListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
