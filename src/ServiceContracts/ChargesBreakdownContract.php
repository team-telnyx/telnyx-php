<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse;
use Telnyx\ChargesBreakdown\ChargesBreakdownRetrieveParams\Format;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ChargesBreakdownContract
{
    /**
     * @api
     *
     * @param string $startDate Start date for the charges breakdown in ISO date format (YYYY-MM-DD)
     * @param string $endDate End date for the charges breakdown in ISO date format (YYYY-MM-DD). If not provided, defaults to start_date + 1 month. The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     * @param Format|value-of<Format> $format Response format
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $startDate,
        ?string $endDate = null,
        Format|string $format = 'json',
        RequestOptions|array|null $requestOptions = null,
    ): ChargesBreakdownGetResponse;
}
