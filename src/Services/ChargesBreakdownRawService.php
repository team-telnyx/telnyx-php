<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse;
use Telnyx\ChargesBreakdown\ChargesBreakdownRetrieveParams;
use Telnyx\ChargesBreakdown\ChargesBreakdownRetrieveParams\Format;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ChargesBreakdownRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ChargesBreakdownRawService implements ChargesBreakdownRawContract
{
    // @phpstan-ignore-next-line
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
     *   startDate: string, endDate?: string, format?: Format|value-of<Format>
     * }|ChargesBreakdownRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChargesBreakdownGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|ChargesBreakdownRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChargesBreakdownRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'charges_breakdown',
            query: Util::array_transform_keys(
                $parsed,
                ['startDate' => 'start_date', 'endDate' => 'end_date']
            ),
            options: $options,
            convert: ChargesBreakdownGetResponse::class,
        );
    }
}
