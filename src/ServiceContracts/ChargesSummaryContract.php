<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ChargesSummaryContract
{
    /**
     * @api
     *
     * @param string $endDate End date for the charges summary in ISO date format (YYYY-MM-DD). The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     * @param string $startDate Start date for the charges summary in ISO date format (YYYY-MM-DD)
     *
     * @throws APIException
     */
    public function retrieve(
        string $endDate,
        string $startDate,
        ?RequestOptions $requestOptions = null
    ): ChargesSummaryGetResponse;
}
