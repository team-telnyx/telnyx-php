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

interface ReportsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ReportListMdrsParams $params
     *
     * @return BaseResponse<ReportListMdrsResponse>
     *
     * @throws APIException
     */
    public function listMdrs(
        array|ReportListMdrsParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ReportListWdrsParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<ReportListWdrsResponse>>
     *
     * @throws APIException
     */
    public function listWdrs(
        array|ReportListWdrsParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
