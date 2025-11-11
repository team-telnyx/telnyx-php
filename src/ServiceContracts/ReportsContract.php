<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Reports\ReportListMdrsParams;
use Telnyx\Reports\ReportListMdrsResponse;
use Telnyx\Reports\ReportListWdrsParams;
use Telnyx\Reports\ReportListWdrsResponse;
use Telnyx\RequestOptions;

interface ReportsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ReportListMdrsParams $params
     *
     * @throws APIException
     */
    public function listMdrs(
        array|ReportListMdrsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ReportListMdrsResponse;

    /**
     * @api
     *
     * @param array<mixed>|ReportListWdrsParams $params
     *
     * @throws APIException
     */
    public function listWdrs(
        array|ReportListWdrsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ReportListWdrsResponse;
}
