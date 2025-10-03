<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
     */
    public function create(
        $month = omit,
        $year = omit,
        ?RequestOptions $requestOptions = null
    ): LedgerBillingGroupReportNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
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
