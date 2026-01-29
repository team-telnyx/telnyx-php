<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Reports\ReportListMdrsParams;
use Telnyx\Reports\ReportListMdrsResponse;
use Telnyx\Reports\ReportListWdrsParams;
use Telnyx\Reports\ReportListWdrsResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ReportsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ReportListMdrsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReportListMdrsResponse>
     *
     * @throws APIException
     */
    public function listMdrs(
        array|ReportListMdrsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ReportListWdrsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ReportListWdrsResponse>>
     *
     * @throws APIException
     */
    public function listWdrs(
        array|ReportListWdrsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
