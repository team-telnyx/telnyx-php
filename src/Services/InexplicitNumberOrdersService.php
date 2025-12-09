<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\CountryISO;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\Strategy;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListParams;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InexplicitNumberOrdersContract;

final class InexplicitNumberOrdersService implements InexplicitNumberOrdersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create an inexplicit number order to programmatically purchase phone numbers without specifying exact numbers.
     *
     * @param array{
     *   orderingGroups: list<array{
     *     countRequested: string,
     *     countryISO: 'US'|'CA'|CountryISO,
     *     phoneNumberType: string,
     *     administrativeArea?: string,
     *     excludeHeldNumbers?: bool,
     *     features?: list<string>,
     *     locality?: string,
     *     nationalDestinationCode?: string,
     *     phoneNumber?: array{
     *       contains?: string, endsWith?: string, startsWith?: string
     *     },
     *     quickship?: bool,
     *     strategy?: 'always'|'never'|Strategy,
     *   }>,
     *   billingGroupID?: string,
     *   connectionID?: string,
     *   customerReference?: string,
     *   messagingProfileID?: string,
     * }|InexplicitNumberOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|InexplicitNumberOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): InexplicitNumberOrderNewResponse {
        [$parsed, $options] = InexplicitNumberOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<InexplicitNumberOrderNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'inexplicit_number_orders',
            body: (object) $parsed,
            options: $options,
            convert: InexplicitNumberOrderNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get an existing inexplicit number order by ID.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): InexplicitNumberOrderGetResponse {
        /** @var BaseResponse<InexplicitNumberOrderGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['inexplicit_number_orders/%1$s', $id],
            options: $requestOptions,
            convert: InexplicitNumberOrderGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of inexplicit number orders.
     *
     * @param array{
     *   pageNumber?: int, pageSize?: int
     * }|InexplicitNumberOrderListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|InexplicitNumberOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): InexplicitNumberOrderListResponse {
        [$parsed, $options] = InexplicitNumberOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<InexplicitNumberOrderListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'inexplicit_number_orders',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page_number', 'pageSize' => 'page_size']
            ),
            options: $options,
            convert: InexplicitNumberOrderListResponse::class,
        );

        return $response->parse();
    }
}
