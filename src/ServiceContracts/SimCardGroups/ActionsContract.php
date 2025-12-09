<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\SimCardGroups;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SimCardGroups\Actions\ActionGetResponse;
use Telnyx\SimCardGroups\Actions\ActionListParams\FilterStatus;
use Telnyx\SimCardGroups\Actions\ActionListParams\FilterType;
use Telnyx\SimCardGroups\Actions\ActionListResponse;
use Telnyx\SimCardGroups\Actions\ActionRemovePrivateWirelessGatewayResponse;
use Telnyx\SimCardGroups\Actions\ActionRemoveWirelessBlocklistResponse;
use Telnyx\SimCardGroups\Actions\ActionSetPrivateWirelessGatewayResponse;
use Telnyx\SimCardGroups\Actions\ActionSetWirelessBlocklistResponse;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionGetResponse;

    /**
     * @api
     *
     * @param string $filterSimCardGroupID a valid SIM card group ID
     * @param 'in-progress'|'completed'|'failed'|FilterStatus $filterStatus filter by a specific status of the resource's lifecycle
     * @param 'set_private_wireless_gateway'|'remove_private_wireless_gateway'|'set_wireless_blocklist'|'remove_wireless_blocklist'|FilterType $filterType filter by action type
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     *
     * @throws APIException
     */
    public function list(
        ?string $filterSimCardGroupID = null,
        string|FilterStatus|null $filterStatus = null,
        string|FilterType|null $filterType = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        ?RequestOptions $requestOptions = null,
    ): ActionListResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     *
     * @throws APIException
     */
    public function removePrivateWirelessGateway(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionRemovePrivateWirelessGatewayResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     *
     * @throws APIException
     */
    public function removeWirelessBlocklist(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionRemoveWirelessBlocklistResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     * @param string $privateWirelessGatewayID the identification of the related Private Wireless Gateway resource
     *
     * @throws APIException
     */
    public function setPrivateWirelessGateway(
        string $id,
        string $privateWirelessGatewayID,
        ?RequestOptions $requestOptions = null,
    ): ActionSetPrivateWirelessGatewayResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     * @param string $wirelessBlocklistID the identification of the related Wireless Blocklist resource
     *
     * @throws APIException
     */
    public function setWirelessBlocklist(
        string $id,
        string $wirelessBlocklistID,
        ?RequestOptions $requestOptions = null,
    ): ActionSetWirelessBlocklistResponse;
}
