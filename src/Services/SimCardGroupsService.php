<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardGroupsContract;
use Telnyx\Services\SimCardGroups\ActionsService;
use Telnyx\SimCardGroups\SimCardGroupCreateParams;
use Telnyx\SimCardGroups\SimCardGroupCreateParams\DataLimit;
use Telnyx\SimCardGroups\SimCardGroupDeleteResponse;
use Telnyx\SimCardGroups\SimCardGroupGetResponse;
use Telnyx\SimCardGroups\SimCardGroupListParams;
use Telnyx\SimCardGroups\SimCardGroupListResponse;
use Telnyx\SimCardGroups\SimCardGroupNewResponse;
use Telnyx\SimCardGroups\SimCardGroupRetrieveParams;
use Telnyx\SimCardGroups\SimCardGroupUpdateParams;
use Telnyx\SimCardGroups\SimCardGroupUpdateParams\DataLimit as DataLimit1;
use Telnyx\SimCardGroups\SimCardGroupUpdateResponse;

use const Telnyx\Core\OMIT as omit;

final class SimCardGroupsService implements SimCardGroupsContract
{
    /**
     * @@api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Creates a new SIM card group object
     *
     * @param string $name a user friendly name for the SIM card group
     * @param DataLimit $dataLimit upper limit on the amount of data the SIM cards, within the group, can use
     *
     * @return SimCardGroupNewResponse<HasRawResponse>
     */
    public function create(
        $name,
        $dataLimit = omit,
        ?RequestOptions $requestOptions = null
    ): SimCardGroupNewResponse {
        [$parsed, $options] = SimCardGroupCreateParams::parseRequest(
            ['name' => $name, 'dataLimit' => $dataLimit],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'sim_card_groups',
            body: (object) $parsed,
            options: $options,
            convert: SimCardGroupNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the details regarding a specific SIM card group
     *
     * @param bool $includeIccids it includes a list of associated ICCIDs
     *
     * @return SimCardGroupGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        $includeIccids = omit,
        ?RequestOptions $requestOptions = null
    ): SimCardGroupGetResponse {
        [$parsed, $options] = SimCardGroupRetrieveParams::parseRequest(
            ['includeIccids' => $includeIccids],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['sim_card_groups/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: SimCardGroupGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates a SIM card group
     *
     * @param DataLimit1 $dataLimit upper limit on the amount of data the SIM cards, within the group, can use
     * @param string $name a user friendly name for the SIM card group
     *
     * @return SimCardGroupUpdateResponse<HasRawResponse>
     */
    public function update(
        string $id,
        $dataLimit = omit,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): SimCardGroupUpdateResponse {
        [$parsed, $options] = SimCardGroupUpdateParams::parseRequest(
            ['dataLimit' => $dataLimit, 'name' => $name],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['sim_card_groups/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: SimCardGroupUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all SIM card groups belonging to the user that match the given filters.
     *
     * @param string $filterName a valid SIM card group name
     * @param string $filterPrivateWirelessGatewayID a Private Wireless Gateway ID associated with the group
     * @param string $filterWirelessBlocklistID a Wireless Blocklist ID associated with the group
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     *
     * @return SimCardGroupListResponse<HasRawResponse>
     */
    public function list(
        $filterName = omit,
        $filterPrivateWirelessGatewayID = omit,
        $filterWirelessBlocklistID = omit,
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): SimCardGroupListResponse {
        [$parsed, $options] = SimCardGroupListParams::parseRequest(
            [
                'filterName' => $filterName,
                'filterPrivateWirelessGatewayID' => $filterPrivateWirelessGatewayID,
                'filterWirelessBlocklistID' => $filterWirelessBlocklistID,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'sim_card_groups',
            query: $parsed,
            options: $options,
            convert: SimCardGroupListResponse::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a SIM card group
     *
     * @return SimCardGroupDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGroupDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['sim_card_groups/%1$s', $id],
            options: $requestOptions,
            convert: SimCardGroupDeleteResponse::class,
        );
    }
}
