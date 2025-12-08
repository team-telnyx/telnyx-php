<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse;
use Telnyx\ChargesBreakdown\ChargesBreakdownRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ChargesBreakdownContract;

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
     * @param array{
     *   start_date: string|\DateTimeInterface,
     *   end_date?: string|\DateTimeInterface,
     *   format?: 'json'|'csv',
     * }|ChargesBreakdownRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|ChargesBreakdownRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ChargesBreakdownGetResponse {
        [$parsed, $options] = ChargesBreakdownRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ChargesBreakdownGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'charges_breakdown',
            query: $parsed,
            options: $options,
            convert: ChargesBreakdownGetResponse::class,
        );

        return $response->parse();
    }
}
