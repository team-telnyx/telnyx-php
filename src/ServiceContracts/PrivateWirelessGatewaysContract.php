<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayCreateParams\AddressMode;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayDeleteResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayGetResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayNewResponse;
use Telnyx\PrivateWirelessGateways\WirelessPrivateWirelessGateway;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PrivateWirelessGatewaysContract
{
    /**
     * @api
     *
     * @param string $name the private wireless gateway name
     * @param string $networkID the identification of the related network resource
     * @param AddressMode|value-of<AddressMode> $addressMode Determines how IP addresses are assigned to SIM cards using this gateway. With static, each SIM card gets a fixed IP address from the gateway's IP range that is preserved across sessions. With dynamic, an IP address is assigned by the network at attach time and may change between sessions. If omitted, the gateway is created with the default address mode, dynamic.
     * @param string $regionCode The code of the region where the private wireless gateway will be assigned. A list of available regions can be found at the regions endpoint
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        string $networkID,
        AddressMode|string $addressMode = 'dynamic',
        ?string $regionCode = null,
        RequestOptions|array|null $requestOptions = null,
    ): PrivateWirelessGatewayNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the private wireless gateway
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<WirelessPrivateWirelessGateway>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterCreatedAt = null,
        ?string $filterIPRange = null,
        ?string $filterName = null,
        ?string $filterRegionCode = null,
        ?string $filterUpdatedAt = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id identifies the private wireless gateway
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): PrivateWirelessGatewayDeleteResponse;
}
