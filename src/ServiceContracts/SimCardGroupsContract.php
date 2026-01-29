<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
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
interface SimCardGroupsContract
{
    /**
     * @api
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
    ): SimCardGroupNewResponse;

    /**
     * @api
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
    ): SimCardGroupGetResponse;

    /**
     * @api
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
    ): SimCardGroupUpdateResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SimCardGroupDeleteResponse;
}
