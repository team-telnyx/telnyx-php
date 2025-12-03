<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Portouts\Reports\PortoutReport;
use Telnyx\Portouts\Reports\ReportCreateParams;
use Telnyx\Portouts\Reports\ReportGetResponse;
use Telnyx\Portouts\Reports\ReportListParams;
use Telnyx\Portouts\Reports\ReportNewResponse;
use Telnyx\RequestOptions;

interface ReportsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ReportCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ReportCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): ReportNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ReportGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ReportListParams $params
     *
     * @return DefaultPagination<PortoutReport>
     *
     * @throws APIException
     */
    public function list(
        array|ReportListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;
}
