<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportCreateParams;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportGetResponse;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface LedgerBillingGroupReportsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|LedgerBillingGroupReportCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LedgerBillingGroupReportNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|LedgerBillingGroupReportCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The id of the ledger billing group report
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LedgerBillingGroupReportGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
