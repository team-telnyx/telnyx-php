<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGateway;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayCreateParams;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayDeleteResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayGetResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayListParams;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PrivateWirelessGatewaysRawContract;

final class PrivateWirelessGatewaysRawService implements PrivateWirelessGatewaysRawContract
{
    // @phpstan-ignore-next-line
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
     *   name: string, networkID: string, regionCode?: string
     * }|PrivateWirelessGatewayCreateParams $params
     *
     * @return BaseResponse<PrivateWirelessGatewayNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PrivateWirelessGatewayCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PrivateWirelessGatewayCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'private_wireless_gateways',
            body: (object) $parsed,
            options: $options,
            convert: PrivateWirelessGatewayNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve information about a Private Wireless Gateway.
     *
     * @param string $id identifies the private wireless gateway
     *
     * @return BaseResponse<PrivateWirelessGatewayGetResponse>
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
            path: ['private_wireless_gateways/%1$s', $id],
            options: $requestOptions,
            convert: PrivateWirelessGatewayGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all Private Wireless Gateways belonging to the user.
     *
     * @param array{
     *   filterCreatedAt?: string,
     *   filterIPRange?: string,
     *   filterName?: string,
     *   filterRegionCode?: string,
     *   filterUpdatedAt?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|PrivateWirelessGatewayListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<PrivateWirelessGateway>>
     *
     * @throws APIException
     */
    public function list(
        array|PrivateWirelessGatewayListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PrivateWirelessGatewayListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'private_wireless_gateways',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterCreatedAt' => 'filter[created_at]',
                    'filterIPRange' => 'filter[ip_range]',
                    'filterName' => 'filter[name]',
                    'filterRegionCode' => 'filter[region_code]',
                    'filterUpdatedAt' => 'filter[updated_at]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: PrivateWirelessGateway::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes the Private Wireless Gateway.
     *
     * @param string $id identifies the private wireless gateway
     *
     * @return BaseResponse<PrivateWirelessGatewayDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['private_wireless_gateways/%1$s', $id],
            options: $requestOptions,
            convert: PrivateWirelessGatewayDeleteResponse::class,
        );
    }
}
