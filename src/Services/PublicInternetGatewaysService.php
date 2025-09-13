<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayCreateParams;
use Telnyx\PublicInternetGateways\PublicInternetGatewayDeleteResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayGetResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListParams;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListParams\Filter;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListParams\Page;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PublicInternetGatewaysContract;

use const Telnyx\Core\OMIT as omit;

final class PublicInternetGatewaysService implements PublicInternetGatewaysContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new Public Internet Gateway.
     *
     * @param string $name a user specified name for the interface
     * @param string $networkID the id of the network associated with the interface
     * @param string $regionCode the region the interface should be deployed to
     *
     * @return PublicInternetGatewayNewResponse<HasRawResponse>
     */
    public function create(
        $name = omit,
        $networkID = omit,
        $regionCode = omit,
        ?RequestOptions $requestOptions = null,
    ): PublicInternetGatewayNewResponse {
        [$parsed, $options] = PublicInternetGatewayCreateParams::parseRequest(
            ['name' => $name, 'networkID' => $networkID, 'regionCode' => $regionCode],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'public_internet_gateways',
            body: (object) $parsed,
            options: $options,
            convert: PublicInternetGatewayNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a Public Internet Gateway.
     *
     * @return PublicInternetGatewayGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PublicInternetGatewayGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['public_internet_gateways/%1$s', $id],
            options: $requestOptions,
            convert: PublicInternetGatewayGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all Public Internet Gateways.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[network_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return PublicInternetGatewayListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): PublicInternetGatewayListResponse {
        [$parsed, $options] = PublicInternetGatewayListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'public_internet_gateways',
            query: $parsed,
            options: $options,
            convert: PublicInternetGatewayListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a Public Internet Gateway.
     *
     * @return PublicInternetGatewayDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PublicInternetGatewayDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['public_internet_gateways/%1$s', $id],
            options: $requestOptions,
            convert: PublicInternetGatewayDeleteResponse::class,
        );
    }
}
