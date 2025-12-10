<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\SimCardGroups\SimCardGroupDeleteResponse;
use Telnyx\SimCardGroups\SimCardGroupGetResponse;
use Telnyx\SimCardGroups\SimCardGroupListResponse;
use Telnyx\SimCardGroups\SimCardGroupNewResponse;
use Telnyx\SimCardGroups\SimCardGroupUpdateResponse;

interface SimCardGroupsContract
{
    /**
     * @api
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
    ): SimCardGroupNewResponse;

    /**
     * @api
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
    ): SimCardGroupGetResponse;

    /**
     * @api
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
    ): SimCardGroupUpdateResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGroupDeleteResponse;
}
