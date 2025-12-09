<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardOrdersContract;
use Telnyx\SimCardOrders\SimCardOrderCreateParams;
use Telnyx\SimCardOrders\SimCardOrderGetResponse;
use Telnyx\SimCardOrders\SimCardOrderListParams;
use Telnyx\SimCardOrders\SimCardOrderListResponse;
use Telnyx\SimCardOrders\SimCardOrderNewResponse;

final class SimCardOrdersService implements SimCardOrdersContract
{
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
     * @throws APIException
     */
    public function create(
        array|SimCardOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardOrderNewResponse {
        [$parsed, $options] = SimCardOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SimCardOrderNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'sim_card_orders',
            body: (object) $parsed,
            options: $options,
            convert: SimCardOrderNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a single SIM card order by its ID.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderGetResponse {
        /** @var BaseResponse<SimCardOrderGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['sim_card_orders/%1$s', $id],
            options: $requestOptions,
            convert: SimCardOrderGetResponse::class,
        );

        return $response->parse();
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
     * @throws APIException
     */
    public function list(
        array|SimCardOrderListParams $params,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderListResponse {
        [$parsed, $options] = SimCardOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SimCardOrderListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'sim_card_orders',
            query: $parsed,
            options: $options,
            convert: SimCardOrderListResponse::class,
        );

        return $response->parse();
    }
}
