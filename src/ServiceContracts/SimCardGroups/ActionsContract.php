<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\SimCardGroups;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\SimCardGroups\Actions\ActionGetResponse;
use Telnyx\SimCardGroups\Actions\ActionListParams\FilterStatus;
use Telnyx\SimCardGroups\Actions\ActionListParams\FilterType;
use Telnyx\SimCardGroups\Actions\ActionListResponse;
use Telnyx\SimCardGroups\Actions\ActionRemovePrivateWirelessGatewayResponse;
use Telnyx\SimCardGroups\Actions\ActionRemoveWirelessBlocklistResponse;
use Telnyx\SimCardGroups\Actions\ActionSetPrivateWirelessGatewayResponse;
use Telnyx\SimCardGroups\Actions\ActionSetWirelessBlocklistResponse;

use const Telnyx\Core\OMIT as omit;

interface ActionsContract
{
    /**
     * @api
     *
     * @return ActionGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionGetResponse;

    /**
     * @api
     *
     * @param string $filterSimCardGroupID a valid SIM card group ID
     * @param FilterStatus|value-of<FilterStatus> $filterStatus filter by a specific status of the resource's lifecycle
     * @param FilterType|value-of<FilterType> $filterType filter by action type
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     *
     * @return ActionListResponse<HasRawResponse>
     */
    public function list(
        $filterSimCardGroupID = omit,
        $filterStatus = omit,
        $filterType = omit,
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionListResponse;

    /**
     * @api
     *
     * @return ActionRemovePrivateWirelessGatewayResponse<HasRawResponse>
     */
    public function removePrivateWirelessGateway(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionRemovePrivateWirelessGatewayResponse;

    /**
     * @api
     *
     * @return ActionRemoveWirelessBlocklistResponse<HasRawResponse>
     */
    public function removeWirelessBlocklist(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionRemoveWirelessBlocklistResponse;

    /**
     * @api
     *
     * @param string $privateWirelessGatewayID the identification of the related Private Wireless Gateway resource
     *
     * @return ActionSetPrivateWirelessGatewayResponse<HasRawResponse>
     */
    public function setPrivateWirelessGateway(
        string $id,
        $privateWirelessGatewayID,
        ?RequestOptions $requestOptions = null,
    ): ActionSetPrivateWirelessGatewayResponse;

    /**
     * @api
     *
     * @param string $wirelessBlocklistID the identification of the related Wireless Blocklist resource
     *
     * @return ActionSetWirelessBlocklistResponse<HasRawResponse>
     */
    public function setWirelessBlocklist(
        string $id,
        $wirelessBlocklistID,
        ?RequestOptions $requestOptions = null
    ): ActionSetWirelessBlocklistResponse;
}
