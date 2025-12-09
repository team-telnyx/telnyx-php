<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse;
use Telnyx\ChargesSummary\ChargesSummaryRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
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
     * @param array{
     *   endDate: string|\DateTimeInterface, startDate: string|\DateTimeInterface
     * }|ChargesSummaryRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|ChargesSummaryRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ChargesSummaryGetResponse {
        [$parsed, $options] = ChargesSummaryRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ChargesSummaryGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'charges_summary',
            query: Util::array_transform_keys(
                $parsed,
                ['endDate' => 'end_date', 'startDate' => 'start_date']
            ),
            options: $options,
            convert: ChargesSummaryGetResponse::class,
        );

        return $response->parse();
    }
}
