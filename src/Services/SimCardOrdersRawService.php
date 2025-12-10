<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardOrdersRawContract;
use Telnyx\SimCardOrders\SimCardOrderCreateParams;
use Telnyx\SimCardOrders\SimCardOrderGetResponse;
use Telnyx\SimCardOrders\SimCardOrderListParams;
use Telnyx\SimCardOrders\SimCardOrderListResponse;
use Telnyx\SimCardOrders\SimCardOrderNewResponse;

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
     *
     * @return BaseResponse<SimCardOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SimCardOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *
     * @return BaseResponse<SimCardOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     *   filter?: array{
     *     address?: array{
     *       id?: string,
     *       administrativeArea?: string,
     *       countryCode?: string,
     *       extendedAddress?: string,
     *       locality?: string,
     *       postalCode?: string,
     *       streetAddress?: string,
     *     },
     *     cost?: array{amount?: string, currency?: string},
     *     createdAt?: string|\DateTimeInterface,
     *     quantity?: int,
     *     updatedAt?: string|\DateTimeInterface,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|SimCardOrderListParams $params
     *
     * @return BaseResponse<SimCardOrderListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|SimCardOrderListParams $params,
        ?RequestOptions $requestOptions = null
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
            convert: SimCardOrderListResponse::class,
        );
    }
}
