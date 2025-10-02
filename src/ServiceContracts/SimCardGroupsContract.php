<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\SimCardGroups\SimCardGroupCreateParams\DataLimit;
use Telnyx\SimCardGroups\SimCardGroupDeleteResponse;
use Telnyx\SimCardGroups\SimCardGroupGetResponse;
use Telnyx\SimCardGroups\SimCardGroupListResponse;
use Telnyx\SimCardGroups\SimCardGroupNewResponse;
use Telnyx\SimCardGroups\SimCardGroupUpdateResponse;

use const Telnyx\Core\OMIT as omit;

interface SimCardGroupsContract
{
    /**
     * @api
     *
     * @param string $name a user friendly name for the SIM card group
     * @param DataLimit $dataLimit upper limit on the amount of data the SIM cards, within the group, can use
     *
     * @return SimCardGroupNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $name,
        $dataLimit = omit,
        ?RequestOptions $requestOptions = null
    ): SimCardGroupNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SimCardGroupNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimCardGroupNewResponse;

    /**
     * @api
     *
     * @param bool $includeIccids it includes a list of associated ICCIDs
     *
     * @return SimCardGroupGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        $includeIccids = omit,
        ?RequestOptions $requestOptions = null,
    ): SimCardGroupGetResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SimCardGroupGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimCardGroupGetResponse;

    /**
     * @api
     *
     * @param Telnyx\SimCardGroups\SimCardGroupUpdateParams\DataLimit $dataLimit upper limit on the amount of data the SIM cards, within the group, can use
     * @param string $name a user friendly name for the SIM card group
     *
     * @return SimCardGroupUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $dataLimit = omit,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): SimCardGroupUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SimCardGroupUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
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
     * @return SimCardGroupListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filterName = omit,
        $filterPrivateWirelessGatewayID = omit,
        $filterWirelessBlocklistID = omit,
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): SimCardGroupListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SimCardGroupListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimCardGroupListResponse;

    /**
     * @api
     *
     * @return SimCardGroupDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGroupDeleteResponse;

    /**
     * @api
     *
     * @return SimCardGroupDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): SimCardGroupDeleteResponse;
}
