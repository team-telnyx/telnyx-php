<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\NumberBlockOrders\NumberBlockOrder;
use Telnyx\NumberBlockOrders\NumberBlockOrderCreateParams;
use Telnyx\NumberBlockOrders\NumberBlockOrderGetResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Filter;
use Telnyx\NumberBlockOrders\NumberBlockOrderNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberBlockOrdersRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NumberBlockOrdersRawService implements NumberBlockOrdersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a phone number block order.
     *
     * @param array{
     *   range: int,
     *   startingNumber: string,
     *   connectionID?: string,
     *   customerReference?: string,
     *   messagingProfileID?: string,
     * }|NumberBlockOrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberBlockOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NumberBlockOrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberBlockOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'number_block_orders',
            body: (object) $parsed,
            options: $options,
            convert: NumberBlockOrderNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get an existing phone number block order.
     *
     * @param string $numberBlockOrderID the number block order ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberBlockOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberBlockOrderID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['number_block_orders/%1$s', $numberBlockOrderID],
            options: $requestOptions,
            convert: NumberBlockOrderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list of number block orders.
     *
     * @param array{
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|NumberBlockOrderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<NumberBlockOrder>>
     *
     * @throws APIException
     */
    public function list(
        array|NumberBlockOrderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberBlockOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'number_block_orders',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: NumberBlockOrder::class,
            page: DefaultFlatPagination::class,
        );
    }
}
