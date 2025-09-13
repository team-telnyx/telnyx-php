<?php

declare(strict_types=1);

namespace Telnyx\Services\SimCardGroups;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardGroups\ActionsContract;
use Telnyx\SimCardGroups\Actions\ActionGetResponse;
use Telnyx\SimCardGroups\Actions\ActionListParams;
use Telnyx\SimCardGroups\Actions\ActionListParams\FilterStatus;
use Telnyx\SimCardGroups\Actions\ActionListParams\FilterType;
use Telnyx\SimCardGroups\Actions\ActionListResponse;
use Telnyx\SimCardGroups\Actions\ActionRemovePrivateWirelessGatewayResponse;
use Telnyx\SimCardGroups\Actions\ActionRemoveWirelessBlocklistResponse;
use Telnyx\SimCardGroups\Actions\ActionSetPrivateWirelessGatewayParams;
use Telnyx\SimCardGroups\Actions\ActionSetPrivateWirelessGatewayResponse;
use Telnyx\SimCardGroups\Actions\ActionSetWirelessBlocklistParams;
use Telnyx\SimCardGroups\Actions\ActionSetWirelessBlocklistResponse;

use const Telnyx\Core\OMIT as omit;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This API allows fetching detailed information about a SIM card group action resource to make follow-ups in an existing asynchronous operation.
     *
     * @return ActionGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['sim_card_group_actions/%1$s', $id],
            options: $requestOptions,
            convert: ActionGetResponse::class,
        );
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
    ): ActionListResponse {
        [$parsed, $options] = ActionListParams::parseRequest(
            [
                'filterSimCardGroupID' => $filterSimCardGroupID,
                'filterStatus' => $filterStatus,
                'filterType' => $filterType,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'sim_card_group_actions',
            query: $parsed,
            options: $options,
            convert: ActionListResponse::class,
        );
    }

    /**
     * @api
     *
     * This action will asynchronously remove an existing Private Wireless Gateway definition from a SIM card group. Completing this operation defines that all SIM cards in the SIM card group will get their traffic handled by Telnyx's default mobile network configuration.
     *
     * @return ActionRemovePrivateWirelessGatewayResponse<HasRawResponse>
     */
    public function removePrivateWirelessGateway(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionRemovePrivateWirelessGatewayResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'sim_card_groups/%1$s/actions/remove_private_wireless_gateway', $id,
            ],
            options: $requestOptions,
            convert: ActionRemovePrivateWirelessGatewayResponse::class,
        );
    }

    /**
     * @api
     *
     * This action will asynchronously remove an existing Wireless Blocklist to all the SIMs in the SIM card group.
     *
     * @return ActionRemoveWirelessBlocklistResponse<HasRawResponse>
     */
    public function removeWirelessBlocklist(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionRemoveWirelessBlocklistResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['sim_card_groups/%1$s/actions/remove_wireless_blocklist', $id],
            options: $requestOptions,
            convert: ActionRemoveWirelessBlocklistResponse::class,
        );
    }

    /**
     * @api
     *
     * This action will asynchronously assign a provisioned Private Wireless Gateway to the SIM card group. Completing this operation defines that all SIM cards in the SIM card group will get their traffic controlled by the associated Private Wireless Gateway. This operation will also imply that new SIM cards assigned to a group will inherit its network definitions. If it's moved to a different group that doesn't have a Private Wireless Gateway, it'll use Telnyx's default mobile network configuration.
     *
     * @param string $privateWirelessGatewayID the identification of the related Private Wireless Gateway resource
     *
     * @return ActionSetPrivateWirelessGatewayResponse<HasRawResponse>
     */
    public function setPrivateWirelessGateway(
        string $id,
        $privateWirelessGatewayID,
        ?RequestOptions $requestOptions = null,
    ): ActionSetPrivateWirelessGatewayResponse {
        [$parsed, $options] = ActionSetPrivateWirelessGatewayParams::parseRequest(
            ['privateWirelessGatewayID' => $privateWirelessGatewayID],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['sim_card_groups/%1$s/actions/set_private_wireless_gateway', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionSetPrivateWirelessGatewayResponse::class,
        );
    }

    /**
     * @api
     *
     * This action will asynchronously assign a Wireless Blocklist to all the SIMs in the SIM card group.
     *
     * @param string $wirelessBlocklistID the identification of the related Wireless Blocklist resource
     *
     * @return ActionSetWirelessBlocklistResponse<HasRawResponse>
     */
    public function setWirelessBlocklist(
        string $id,
        $wirelessBlocklistID,
        ?RequestOptions $requestOptions = null
    ): ActionSetWirelessBlocklistResponse {
        [$parsed, $options] = ActionSetWirelessBlocklistParams::parseRequest(
            ['wirelessBlocklistID' => $wirelessBlocklistID],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['sim_card_groups/%1$s/actions/set_wireless_blocklist', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionSetWirelessBlocklistResponse::class,
        );
    }
}
