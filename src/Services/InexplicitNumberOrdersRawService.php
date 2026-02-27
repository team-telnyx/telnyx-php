<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPaginationForInexplicitNumberOrders;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListParams;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InexplicitNumberOrdersRawContract;

/**
 * Inexplicit number orders for bulk purchasing without specifying exact numbers.
 *
 * @phpstan-import-type OrderingGroupShape from \Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class InexplicitNumberOrdersRawService implements InexplicitNumberOrdersRawContract
{
    // @phpstan-ignore-next-line
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
     *   orderingGroups: list<OrderingGroup|OrderingGroupShape>,
     *   billingGroupID?: string,
     *   connectionID?: string,
     *   customerReference?: string,
     *   messagingProfileID?: string,
     * }|InexplicitNumberOrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InexplicitNumberOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|InexplicitNumberOrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InexplicitNumberOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'inexplicit_number_orders',
            body: (object) $parsed,
            options: $options,
            convert: InexplicitNumberOrderNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get an existing inexplicit number order by ID.
     *
     * @param string $id Identifies the inexplicit number order
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InexplicitNumberOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['inexplicit_number_orders/%1$s', $id],
            options: $requestOptions,
            convert: InexplicitNumberOrderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list of inexplicit number orders.
     *
     * @param array{
     *   pageNumber?: int, pageSize?: int
     * }|InexplicitNumberOrderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPaginationForInexplicitNumberOrders<InexplicitNumberOrderResponse,>,>
     *
     * @throws APIException
     */
    public function list(
        array|InexplicitNumberOrderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InexplicitNumberOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'inexplicit_number_orders',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page_number', 'pageSize' => 'page_size']
            ),
            options: $options,
            convert: InexplicitNumberOrderResponse::class,
            page: DefaultFlatPaginationForInexplicitNumberOrders::class,
        );
    }
}
