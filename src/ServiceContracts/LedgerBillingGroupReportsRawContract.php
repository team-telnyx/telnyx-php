<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportCreateParams;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportGetResponse;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportNewResponse;
use Telnyx\RequestOptions;

interface LedgerBillingGroupReportsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|LedgerBillingGroupReportCreateParams $params
     *
     * @return BaseResponse<LedgerBillingGroupReportNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|LedgerBillingGroupReportCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The id of the ledger billing group report
     *
     * @return BaseResponse<LedgerBillingGroupReportGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
