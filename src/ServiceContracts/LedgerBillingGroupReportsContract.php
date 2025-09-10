<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportGetResponse;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface LedgerBillingGroupReportsContract
{
    /**
     * @api
     *
     * @param int $month Month of the ledger billing group report
     * @param int $year Year of the ledger billing group report
     */
    public function create(
        $month = omit,
        $year = omit,
        ?RequestOptions $requestOptions = null
    ): LedgerBillingGroupReportNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LedgerBillingGroupReportGetResponse;
}
