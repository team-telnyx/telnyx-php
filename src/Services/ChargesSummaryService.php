<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse;
use Telnyx\ChargesSummary\ChargesSummaryRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ChargesSummaryContract;

final class ChargesSummaryService implements ChargesSummaryContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a summary of monthly charges for a specified date range. The date range cannot exceed 31 days.
     *
     * @param \DateTimeInterface $endDate End date for the charges summary in ISO date format (YYYY-MM-DD). The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     * @param \DateTimeInterface $startDate Start date for the charges summary in ISO date format (YYYY-MM-DD)
     *
     * @return ChargesSummaryGetResponse<HasRawResponse>
     */
    public function retrieve(
        $endDate,
        $startDate,
        ?RequestOptions $requestOptions = null
    ): ChargesSummaryGetResponse {
        [$parsed, $options] = ChargesSummaryRetrieveParams::parseRequest(
            ['endDate' => $endDate, 'startDate' => $startDate],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'charges_summary',
            query: $parsed,
            options: $options,
            convert: ChargesSummaryGetResponse::class,
        );
    }
}
