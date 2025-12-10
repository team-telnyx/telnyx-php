<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse;
use Telnyx\ChargesBreakdown\ChargesBreakdownRetrieveParams\Format;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ChargesBreakdownContract;

final class ChargesBreakdownService implements ChargesBreakdownContract
{
    /**
     * @api
     */
    public ChargesBreakdownRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ChargesBreakdownRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a detailed breakdown of monthly charges for phone numbers in a specified date range. The date range cannot exceed 31 days.
     *
     * @param string $startDate Start date for the charges breakdown in ISO date format (YYYY-MM-DD)
     * @param string $endDate End date for the charges breakdown in ISO date format (YYYY-MM-DD). If not provided, defaults to start_date + 1 month. The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     * @param 'json'|'csv'|Format $format Response format
     *
     * @throws APIException
     */
    public function retrieve(
        string $startDate,
        ?string $endDate = null,
        string|Format $format = 'json',
        ?RequestOptions $requestOptions = null,
    ): ChargesBreakdownGetResponse {
        $params = Util::removeNulls(
            ['startDate' => $startDate, 'endDate' => $endDate, 'format' => $format]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
