<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportCreateParams;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportGetResponse;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportNewResponse;
use Telnyx\RequestOptions;

interface LedgerBillingGroupReportsContract
{
    /**
     * @api
     *
     * @param array<mixed>|LedgerBillingGroupReportCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|LedgerBillingGroupReportCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): LedgerBillingGroupReportNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LedgerBillingGroupReportGetResponse;
}
