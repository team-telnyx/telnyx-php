<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\SimCardGroups;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\SimCardGroups\Actions\ActionGetResponse;
use Telnyx\SimCardGroups\Actions\ActionListParams\FilterStatus;
use Telnyx\SimCardGroups\Actions\ActionListParams\FilterType;
use Telnyx\SimCardGroups\Actions\ActionRemovePrivateWirelessGatewayResponse;
use Telnyx\SimCardGroups\Actions\ActionRemoveWirelessBlocklistResponse;
use Telnyx\SimCardGroups\Actions\ActionSetPrivateWirelessGatewayResponse;
use Telnyx\SimCardGroups\Actions\ActionSetWirelessBlocklistResponse;
use Telnyx\SimCardGroups\Actions\SimCardGroupAction;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionGetResponse;

    /**
     * @api
     *
     * @param string $filterSimCardGroupID a valid SIM card group ID
     * @param FilterStatus|value-of<FilterStatus> $filterStatus filter by a specific status of the resource's lifecycle
     * @param FilterType|value-of<FilterType> $filterType filter by action type
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<SimCardGroupAction>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterSimCardGroupID = null,
        FilterStatus|string|null $filterStatus = null,
        FilterType|string|null $filterType = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function removePrivateWirelessGateway(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionRemovePrivateWirelessGatewayResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function removeWirelessBlocklist(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionRemoveWirelessBlocklistResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     * @param string $privateWirelessGatewayID the identification of the related Private Wireless Gateway resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setPrivateWirelessGateway(
        string $id,
        string $privateWirelessGatewayID,
        RequestOptions|array|null $requestOptions = null,
    ): ActionSetPrivateWirelessGatewayResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     * @param string $wirelessBlocklistID the identification of the related Wireless Blocklist resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setWirelessBlocklist(
        string $id,
        string $wirelessBlocklistID,
        RequestOptions|array|null $requestOptions = null,
    ): ActionSetWirelessBlocklistResponse;
}
