<?php

declare(strict_types=1);

namespace Telnyx\Services\SimCardGroups;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardGroups\ActionsRawContract;
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

final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This API allows fetching detailed information about a SIM card group action resource to make follow-ups in an existing asynchronous operation.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<ActionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   filterSimCardGroupID?: string,
     *   filterStatus?: 'in-progress'|'completed'|'failed'|FilterStatus,
     *   filterType?: value-of<FilterType>,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|ActionListParams $params
     *
     * @return BaseResponse<ActionListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ActionListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = ActionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'sim_card_group_actions',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterSimCardGroupID' => 'filter[sim_card_group_id]',
                    'filterStatus' => 'filter[status]',
                    'filterType' => 'filter[type]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: ActionListResponse::class,
        );
    }

    /**
     * @api
     *
     * This action will asynchronously remove an existing Private Wireless Gateway definition from a SIM card group. Completing this operation defines that all SIM cards in the SIM card group will get their traffic handled by Telnyx's default mobile network configuration.
     *
     * @param string $id identifies the SIM group
     *
     * @return BaseResponse<ActionRemovePrivateWirelessGatewayResponse>
     *
     * @throws APIException
     */
    public function removePrivateWirelessGateway(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the SIM group
     *
     * @return BaseResponse<ActionRemoveWirelessBlocklistResponse>
     *
     * @throws APIException
     */
    public function removeWirelessBlocklist(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the SIM group
     * @param array{
     *   privateWirelessGatewayID: string
     * }|ActionSetPrivateWirelessGatewayParams $params
     *
     * @return BaseResponse<ActionSetPrivateWirelessGatewayResponse>
     *
     * @throws APIException
     */
    public function setPrivateWirelessGateway(
        string $id,
        array|ActionSetPrivateWirelessGatewayParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionSetPrivateWirelessGatewayParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the SIM group
     * @param array{
     *   wirelessBlocklistID: string
     * }|ActionSetWirelessBlocklistParams $params
     *
     * @return BaseResponse<ActionSetWirelessBlocklistResponse>
     *
     * @throws APIException
     */
    public function setWirelessBlocklist(
        string $id,
        array|ActionSetWirelessBlocklistParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionSetWirelessBlocklistParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['sim_card_groups/%1$s/actions/set_wireless_blocklist', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionSetWirelessBlocklistResponse::class,
        );
    }
}
