<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayCreateParams;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayDeleteResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayGetResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayListParams;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayListResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PrivateWirelessGatewaysContract;

final class PrivateWirelessGatewaysService implements PrivateWirelessGatewaysContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Asynchronously create a Private Wireless Gateway for SIM cards for a previously created network. This operation may take several minutes so you can check the Private Wireless Gateway status at the section Get a Private Wireless Gateway.
     *
     * @param array{
     *   name: string, network_id: string, region_code?: string
     * }|PrivateWirelessGatewayCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PrivateWirelessGatewayCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PrivateWirelessGatewayNewResponse {
        [$parsed, $options] = PrivateWirelessGatewayCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PrivateWirelessGatewayNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'private_wireless_gateways',
            body: (object) $parsed,
            options: $options,
            convert: PrivateWirelessGatewayNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve information about a Private Wireless Gateway.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PrivateWirelessGatewayGetResponse {
        /** @var BaseResponse<PrivateWirelessGatewayGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['private_wireless_gateways/%1$s', $id],
            options: $requestOptions,
            convert: PrivateWirelessGatewayGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all Private Wireless Gateways belonging to the user.
     *
     * @param array{
     *   filter_created_at_?: string,
     *   filter_ip_range_?: string,
     *   filter_name_?: string,
     *   filter_region_code_?: string,
     *   filter_updated_at_?: string,
     *   page_number_?: int,
     *   page_size_?: int,
     * }|PrivateWirelessGatewayListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|PrivateWirelessGatewayListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PrivateWirelessGatewayListResponse {
        [$parsed, $options] = PrivateWirelessGatewayListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PrivateWirelessGatewayListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'private_wireless_gateways',
            query: $parsed,
            options: $options,
            convert: PrivateWirelessGatewayListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the Private Wireless Gateway.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PrivateWirelessGatewayDeleteResponse {
        /** @var BaseResponse<PrivateWirelessGatewayDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['private_wireless_gateways/%1$s', $id],
            options: $requestOptions,
            convert: PrivateWirelessGatewayDeleteResponse::class,
        );

        return $response->parse();
    }
}
