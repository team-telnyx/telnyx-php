<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse;
use Telnyx\ChargesBreakdown\ChargesBreakdownRetrieveParams;
use Telnyx\ChargesBreakdown\ChargesBreakdownRetrieveParams\Format;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ChargesBreakdownContract;

use const Telnyx\Core\OMIT as omit;

final class ChargesBreakdownService implements ChargesBreakdownContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a detailed breakdown of monthly charges for phone numbers in a specified date range. The date range cannot exceed 31 days.
     *
     * @param \DateTimeInterface $startDate Start date for the charges breakdown in ISO date format (YYYY-MM-DD)
     * @param \DateTimeInterface $endDate End date for the charges breakdown in ISO date format (YYYY-MM-DD). If not provided, defaults to start_date + 1 month. The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     * @param Format|value-of<Format> $format Response format
     *
     * @return ChargesBreakdownGetResponse<HasRawResponse>
     */
    public function retrieve(
        $startDate,
        $endDate = omit,
        $format = omit,
        ?RequestOptions $requestOptions = null,
    ): ChargesBreakdownGetResponse {
        [$parsed, $options] = ChargesBreakdownRetrieveParams::parseRequest(
            ['startDate' => $startDate, 'endDate' => $endDate, 'format' => $format],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'charges_breakdown',
            query: $parsed,
            options: $options,
            convert: ChargesBreakdownGetResponse::class,
        );
    }
}
