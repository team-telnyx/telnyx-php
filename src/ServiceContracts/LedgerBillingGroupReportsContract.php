<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportGetResponse;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportNewResponse;
use Telnyx\RequestOptions;

interface LedgerBillingGroupReportsContract
{
    /**
     * @api
     *
     * @param int $month Month of the ledger billing group report
     * @param int $year Year of the ledger billing group report
     *
     * @throws APIException
     */
    public function create(
        ?int $month = null,
        ?int $year = null,
        ?RequestOptions $requestOptions = null,
    ): LedgerBillingGroupReportNewResponse;

    /**
     * @api
     *
     * @param string $id The id of the ledger billing group report
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LedgerBillingGroupReportGetResponse;
}
