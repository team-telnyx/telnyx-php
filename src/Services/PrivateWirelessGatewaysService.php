<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayCreateParams;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayDeleteResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayGetResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayListParams;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayListResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PrivateWirelessGatewaysContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $name the private wireless gateway name
     * @param string $networkID the identification of the related network resource
     * @param string $regionCode The code of the region where the private wireless gateway will be assigned. A list of available regions can be found at the regions endpoint
     *
     * @return PrivateWirelessGatewayNewResponse<HasRawResponse>
     */
    public function create(
        $name,
        $networkID,
        $regionCode = omit,
        ?RequestOptions $requestOptions = null,
    ): PrivateWirelessGatewayNewResponse {
        [$parsed, $options] = PrivateWirelessGatewayCreateParams::parseRequest(
            ['name' => $name, 'networkID' => $networkID, 'regionCode' => $regionCode],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @return PrivateWirelessGatewayGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PrivateWirelessGatewayGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param string $filterCreatedAt private Wireless Gateway resource creation date
     * @param string $filterIPRange the IP address range of the Private Wireless Gateway
     * @param string $filterName the name of the Private Wireless Gateway
     * @param string $filterRegionCode the name of the region where the Private Wireless Gateway is deployed
     * @param string $filterUpdatedAt when the Private Wireless Gateway was last updated
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     *
     * @return PrivateWirelessGatewayListResponse<HasRawResponse>
     */
    public function list(
        $filterCreatedAt = omit,
        $filterIPRange = omit,
        $filterName = omit,
        $filterRegionCode = omit,
        $filterUpdatedAt = omit,
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): PrivateWirelessGatewayListResponse {
        [$parsed, $options] = PrivateWirelessGatewayListParams::parseRequest(
            [
                'filterCreatedAt' => $filterCreatedAt,
                'filterIPRange' => $filterIPRange,
                'filterName' => $filterName,
                'filterRegionCode' => $filterRegionCode,
                'filterUpdatedAt' => $filterUpdatedAt,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'private_wireless_gateways',
            query: $parsed,
            options: $options,
            convert: PrivateWirelessGatewayListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes the Private Wireless Gateway.
     *
     * @return PrivateWirelessGatewayDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PrivateWirelessGatewayDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['private_wireless_gateways/%1$s', $id],
            options: $requestOptions,
            convert: PrivateWirelessGatewayDeleteResponse::class,
        );
    }
}
