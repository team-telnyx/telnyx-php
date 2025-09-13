<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayDeleteResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayGetResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayListResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface PrivateWirelessGatewaysContract
{
    /**
     * @api
     *
     * @param string $name the private wireless gateway name
     * @param string $networkID the identification of the related network resource
     * @param string $regionCode The code of the region where the private wireless gateway will be assigned. A list of available regions can be found at the regions endpoint
     *
     * @return PrivateWirelessGatewayNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $name,
        $networkID,
        $regionCode = omit,
        ?RequestOptions $requestOptions = null,
    ): PrivateWirelessGatewayNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PrivateWirelessGatewayNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PrivateWirelessGatewayNewResponse;

    /**
     * @api
     *
     * @return PrivateWirelessGatewayGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PrivateWirelessGatewayGetResponse;

    /**
     * @api
     *
     * @return PrivateWirelessGatewayGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): PrivateWirelessGatewayGetResponse;

    /**
     * @api
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
     *
     * @throws APIException
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
    ): PrivateWirelessGatewayListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PrivateWirelessGatewayListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PrivateWirelessGatewayListResponse;

    /**
     * @api
     *
     * @return PrivateWirelessGatewayDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PrivateWirelessGatewayDeleteResponse;

    /**
     * @api
     *
     * @return PrivateWirelessGatewayDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): PrivateWirelessGatewayDeleteResponse;
}
