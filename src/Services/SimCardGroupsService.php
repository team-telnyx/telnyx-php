<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardGroupsContract;
use Telnyx\Services\SimCardGroups\ActionsService;
use Telnyx\SimCardGroups\SimCardGroupDeleteResponse;
use Telnyx\SimCardGroups\SimCardGroupGetResponse;
use Telnyx\SimCardGroups\SimCardGroupListResponse;
use Telnyx\SimCardGroups\SimCardGroupNewResponse;
use Telnyx\SimCardGroups\SimCardGroupUpdateResponse;

final class SimCardGroupsService implements SimCardGroupsContract
{
    /**
     * @api
     */
    public SimCardGroupsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SimCardGroupsRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Creates a new SIM card group object
     *
     * @param string $name a user friendly name for the SIM card group
     * @param array{
     *   amount?: string, unit?: string
     * } $dataLimit Upper limit on the amount of data the SIM cards, within the group, can use
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?array $dataLimit = null,
        ?RequestOptions $requestOptions = null,
    ): SimCardGroupNewResponse {
        $params = ['name' => $name, 'dataLimit' => $dataLimit];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the details regarding a specific SIM card group
     *
     * @param string $id identifies the SIM group
     * @param bool $includeIccids it includes a list of associated ICCIDs
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        bool $includeIccids = false,
        ?RequestOptions $requestOptions = null,
    ): SimCardGroupGetResponse {
        $params = ['includeIccids' => $includeIccids];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a SIM card group
     *
     * @param string $id identifies the SIM group
     * @param array{
     *   amount?: string, unit?: string
     * } $dataLimit Upper limit on the amount of data the SIM cards, within the group, can use
     * @param string $name a user friendly name for the SIM card group
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?array $dataLimit = null,
        ?string $name = null,
        ?RequestOptions $requestOptions = null,
    ): SimCardGroupUpdateResponse {
        $params = ['dataLimit' => $dataLimit, 'name' => $name];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @return DefaultFlatPagination<SimCardGroupListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterName = null,
        ?string $filterPrivateWirelessGatewayID = null,
        ?string $filterWirelessBlocklistID = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination {
        $params = [
            'filterName' => $filterName,
            'filterPrivateWirelessGatewayID' => $filterPrivateWirelessGatewayID,
            'filterWirelessBlocklistID' => $filterWirelessBlocklistID,
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
     * Permanently deletes a SIM card group
     *
     * @param string $id identifies the SIM group
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGroupDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
