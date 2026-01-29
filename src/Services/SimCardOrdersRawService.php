<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardOrdersRawContract;
use Telnyx\SimCardOrders\SimCardOrder;
use Telnyx\SimCardOrders\SimCardOrderCreateParams;
use Telnyx\SimCardOrders\SimCardOrderGetResponse;
use Telnyx\SimCardOrders\SimCardOrderListParams;
use Telnyx\SimCardOrders\SimCardOrderListParams\Filter;
use Telnyx\SimCardOrders\SimCardOrderListParams\Page;
use Telnyx\SimCardOrders\SimCardOrderNewResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\SimCardOrders\SimCardOrderListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\SimCardOrders\SimCardOrderListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SimCardOrdersRawService implements SimCardOrdersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new order for SIM cards.
     *
     * @param array{addressID: string, quantity: int}|SimCardOrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SimCardOrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SimCardOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'sim_card_orders',
            body: (object) $parsed,
            options: $options,
            convert: SimCardOrderNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a single SIM card order by its ID.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardOrderGetResponse>
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
            path: ['sim_card_orders/%1$s', $id],
            options: $requestOptions,
            convert: SimCardOrderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all SIM card orders according to filters.
     *
     * @param array{
     *   filter?: Filter|FilterShape, page?: Page|PageShape
     * }|SimCardOrderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<SimCardOrder>>
     *
     * @throws APIException
     */
    public function list(
        array|SimCardOrderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SimCardOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'sim_card_orders',
            query: $parsed,
            options: $options,
            convert: SimCardOrder::class,
            page: DefaultPagination::class,
        );
    }
}
