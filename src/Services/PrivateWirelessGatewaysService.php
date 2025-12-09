<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayDeleteResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayGetResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayListResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PrivateWirelessGatewaysContract;

final class PrivateWirelessGatewaysService implements PrivateWirelessGatewaysContract
{
    /**
     * @api
     */
    public PrivateWirelessGatewaysRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PrivateWirelessGatewaysRawService($client);
    }

    /**
     * @api
     *
     * Asynchronously create a Private Wireless Gateway for SIM cards for a previously created network. This operation may take several minutes so you can check the Private Wireless Gateway status at the section Get a Private Wireless Gateway.
     *
     * @param string $name the private wireless gateway name
     * @param string $networkID the identification of the related network resource
     * @param string $regionCode The code of the region where the private wireless gateway will be assigned. A list of available regions can be found at the regions endpoint
     *
     * @throws APIException
     */
    public function create(
        string $name,
        string $networkID,
        ?string $regionCode = null,
        ?RequestOptions $requestOptions = null,
    ): PrivateWirelessGatewayNewResponse {
        $params = [
            'name' => $name, 'networkID' => $networkID, 'regionCode' => $regionCode,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve information about a Private Wireless Gateway.
     *
     * @param string $id identifies the private wireless gateway
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PrivateWirelessGatewayGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
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
        ?RequestOptions $requestOptions = null,
    ): PrivateWirelessGatewayListResponse {
        $params = [
            'filterCreatedAt' => $filterCreatedAt,
            'filterIPRange' => $filterIPRange,
            'filterName' => $filterName,
            'filterRegionCode' => $filterRegionCode,
            'filterUpdatedAt' => $filterUpdatedAt,
            'pageNumber' => $pageNumber,
            'pageSize' => $pageSize,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the Private Wireless Gateway.
     *
     * @param string $id identifies the private wireless gateway
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PrivateWirelessGatewayDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
