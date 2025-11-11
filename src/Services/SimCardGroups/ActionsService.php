<?php

declare(strict_types=1);

namespace Telnyx\Services\SimCardGroups;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardGroups\ActionsContract;
use Telnyx\SimCardGroups\Actions\ActionGetResponse;
use Telnyx\SimCardGroups\Actions\ActionListParams;
use Telnyx\SimCardGroups\Actions\ActionListResponse;
use Telnyx\SimCardGroups\Actions\ActionRemovePrivateWirelessGatewayResponse;
use Telnyx\SimCardGroups\Actions\ActionRemoveWirelessBlocklistResponse;
use Telnyx\SimCardGroups\Actions\ActionSetPrivateWirelessGatewayParams;
use Telnyx\SimCardGroups\Actions\ActionSetPrivateWirelessGatewayResponse;
use Telnyx\SimCardGroups\Actions\ActionSetWirelessBlocklistParams;
use Telnyx\SimCardGroups\Actions\ActionSetWirelessBlocklistResponse;

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
     * @throws APIException
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
     * @phpstan-type FilterType = "set_private_wireless_gateway"|"remove_private_wireless_gateway"|"set_wireless_blocklist"|"remove_wireless_blocklist"
     *
     * This API allows listing a paginated collection a SIM card group actions. It allows to explore a collection of existing asynchronous operation using specific filters.
     *
     * @param array{
     *   filter_sim_card_group_id_?: string,
     *   filter_status_?: "in-progress"|"completed"|"failed",
     *   filter_type_?: FilterType,
     *   page_number_?: int,
     *   page_size_?: int,
     * }|ActionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ActionListParams $params,
        ?RequestOptions $requestOptions = null
    ): ActionListResponse {
        [$parsed, $options] = ActionListParams::parseRequest(
            $params,
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
     * @throws APIException
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
     * @throws APIException
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
     * @param array{
     *   private_wireless_gateway_id: string
     * }|ActionSetPrivateWirelessGatewayParams $params
     *
     * @throws APIException
     */
    public function setPrivateWirelessGateway(
        string $id,
        array|ActionSetPrivateWirelessGatewayParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSetPrivateWirelessGatewayResponse {
        [$parsed, $options] = ActionSetPrivateWirelessGatewayParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   wireless_blocklist_id: string
     * }|ActionSetWirelessBlocklistParams $params
     *
     * @throws APIException
     */
    public function setWirelessBlocklist(
        string $id,
        array|ActionSetWirelessBlocklistParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSetWirelessBlocklistResponse {
        [$parsed, $options] = ActionSetWirelessBlocklistParams::parseRequest(
            $params,
            $requestOptions,
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
