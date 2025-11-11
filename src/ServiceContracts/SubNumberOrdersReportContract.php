<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportCreateParams;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse;

interface SubNumberOrdersReportContract
{
    /**
     * @api
     *
     * @param array<mixed>|SubNumberOrdersReportCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SubNumberOrdersReportCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrdersReportNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $reportID,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrdersReportGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function download(
        string $reportID,
        ?RequestOptions $requestOptions = null
    ): string;
}
