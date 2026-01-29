<?php

declare(strict_types=1);

namespace Telnyx\Services\SimCardGroups;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardGroups\ActionsContract;
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
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * This API allows fetching detailed information about a SIM card group action resource to make follow-ups in an existing asynchronous operation.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This API allows listing a paginated collection a SIM card group actions. It allows to explore a collection of existing asynchronous operation using specific filters.
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterSimCardGroupID' => $filterSimCardGroupID,
                'filterStatus' => $filterStatus,
                'filterType' => $filterType,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This action will asynchronously remove an existing Private Wireless Gateway definition from a SIM card group. Completing this operation defines that all SIM cards in the SIM card group will get their traffic handled by Telnyx's default mobile network configuration.
     *
     * @param string $id identifies the SIM group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function removePrivateWirelessGateway(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionRemovePrivateWirelessGatewayResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->removePrivateWirelessGateway($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This action will asynchronously remove an existing Wireless Blocklist to all the SIMs in the SIM card group.
     *
     * @param string $id identifies the SIM group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function removeWirelessBlocklist(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionRemoveWirelessBlocklistResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->removeWirelessBlocklist($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This action will asynchronously assign a provisioned Private Wireless Gateway to the SIM card group. Completing this operation defines that all SIM cards in the SIM card group will get their traffic controlled by the associated Private Wireless Gateway. This operation will also imply that new SIM cards assigned to a group will inherit its network definitions. If it's moved to a different group that doesn't have a Private Wireless Gateway, it'll use Telnyx's default mobile network configuration.
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
    ): ActionSetPrivateWirelessGatewayResponse {
        $params = Util::removeNulls(
            ['privateWirelessGatewayID' => $privateWirelessGatewayID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->setPrivateWirelessGateway($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This action will asynchronously assign a Wireless Blocklist to all the SIMs in the SIM card group.
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
    ): ActionSetWirelessBlocklistResponse {
        $params = Util::removeNulls(
            ['wirelessBlocklistID' => $wirelessBlocklistID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->setWirelessBlocklist($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
