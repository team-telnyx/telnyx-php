<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse;
use Telnyx\ChargesBreakdown\ChargesBreakdownRetrieveParams\Format;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ChargesBreakdownContract
{
    /**
     * @api
     *
     * @param \DateTimeInterface $startDate Start date for the charges breakdown in ISO date format (YYYY-MM-DD)
     * @param \DateTimeInterface $endDate End date for the charges breakdown in ISO date format (YYYY-MM-DD). If not provided, defaults to start_date + 1 month. The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     * @param Format|value-of<Format> $format Response format
     *
     * @throws APIException
     */
    public function retrieve(
        $startDate,
        $endDate = omit,
        $format = omit,
        ?RequestOptions $requestOptions = null,
    ): ChargesBreakdownGetResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ChargesBreakdownGetResponse;
}
