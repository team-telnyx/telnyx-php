<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardGroupsContract;
use Telnyx\Services\SimCardGroups\ActionsService;
use Telnyx\SimCardGroups\SimCardGroupCreateParams\DataLimit;
use Telnyx\SimCardGroups\SimCardGroupDeleteResponse;
use Telnyx\SimCardGroups\SimCardGroupGetResponse;
use Telnyx\SimCardGroups\SimCardGroupListResponse;
use Telnyx\SimCardGroups\SimCardGroupNewResponse;
use Telnyx\SimCardGroups\SimCardGroupUpdateResponse;

/**
 * @phpstan-import-type DataLimitShape from \Telnyx\SimCardGroups\SimCardGroupCreateParams\DataLimit
 * @phpstan-import-type DataLimitShape from \Telnyx\SimCardGroups\SimCardGroupUpdateParams\DataLimit as DataLimitShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param DataLimit|DataLimitShape $dataLimit upper limit on the amount of data the SIM cards, within the group, can use
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        DataLimit|array|null $dataLimit = null,
        RequestOptions|array|null $requestOptions = null,
    ): SimCardGroupNewResponse {
        $params = Util::removeNulls(['name' => $name, 'dataLimit' => $dataLimit]);

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        bool $includeIccids = false,
        RequestOptions|array|null $requestOptions = null,
    ): SimCardGroupGetResponse {
        $params = Util::removeNulls(['includeIccids' => $includeIccids]);

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
     * @param \Telnyx\SimCardGroups\SimCardGroupUpdateParams\DataLimit|DataLimitShape1 $dataLimit upper limit on the amount of data the SIM cards, within the group, can use
     * @param string $name a user friendly name for the SIM card group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        \Telnyx\SimCardGroups\SimCardGroupUpdateParams\DataLimit|array|null $dataLimit = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): SimCardGroupUpdateResponse {
        $params = Util::removeNulls(['dataLimit' => $dataLimit, 'name' => $name]);

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
     * @param RequestOpts|null $requestOptions
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
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterName' => $filterName,
                'filterPrivateWirelessGatewayID' => $filterPrivateWirelessGatewayID,
                'filterWirelessBlocklistID' => $filterWirelessBlocklistID,
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
     * Permanently deletes a SIM card group
     *
     * @param string $id identifies the SIM group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SimCardGroupDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
