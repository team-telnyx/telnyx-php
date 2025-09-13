<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

interface ChargesSummaryContract
{
    /**
     * @api
     *
     * @param \DateTimeInterface $endDate End date for the charges summary in ISO date format (YYYY-MM-DD). The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     * @param \DateTimeInterface $startDate Start date for the charges summary in ISO date format (YYYY-MM-DD)
     *
     * @return ChargesSummaryGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        $endDate,
        $startDate,
        ?RequestOptions $requestOptions = null
    ): ChargesSummaryGetResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ChargesSummaryGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ChargesSummaryGetResponse;
}
