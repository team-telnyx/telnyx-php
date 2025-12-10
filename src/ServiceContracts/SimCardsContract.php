<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\SimCards\SimCardDeleteResponse;
use Telnyx\SimCards\SimCardGetActivationCodeResponse;
use Telnyx\SimCards\SimCardGetDeviceDetailsResponse;
use Telnyx\SimCards\SimCardGetPublicIPResponse;
use Telnyx\SimCards\SimCardGetResponse;
use Telnyx\SimCards\SimCardListParams\Filter\Status;
use Telnyx\SimCards\SimCardListParams\Sort;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsResponse;
use Telnyx\SimCards\SimCardUpdateParams\DataLimit\Unit;
use Telnyx\SimCards\SimCardUpdateResponse;
use Telnyx\SimCardStatus;
use Telnyx\SimCardStatus\Value;
use Telnyx\SimpleSimCard;

interface SimCardsContract
{
    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param bool $includePinPukCodes When set to true, includes the PIN and PUK codes in the response. These codes are used for SIM card security and unlocking purposes. Available for both physical SIM cards and eSIMs.
     * @param bool $includeSimCardGroup it includes the associated SIM card group object in the response when present
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        bool $includePinPukCodes = false,
        bool $includeSimCardGroup = false,
        ?RequestOptions $requestOptions = null,
    ): SimCardGetResponse;

    /**
     * @api
     *
     * @param string $simCardID identifies the SIM
     * @param list<string>|null $authorizedImeis list of IMEIs authorized to use a given SIM card
     * @param array{
     *   amount?: string, unit?: 'MB'|'GB'|Unit
     * } $dataLimit The SIM card individual data limit configuration
     * @param string $simCardGroupID The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     * @param array{
     *   reason?: string,
     *   value?: 'registering'|'enabling'|'enabled'|'disabling'|'disabled'|'data_limit_exceeded'|'setting_standby'|'standby'|Value,
     * }|SimCardStatus $status
     * @param list<string> $tags Searchable tags associated with the SIM card
     *
     * @throws APIException
     */
    public function update(
        string $simCardID,
        ?array $authorizedImeis = null,
        ?array $dataLimit = null,
        ?string $simCardGroupID = null,
        array|SimCardStatus|null $status = null,
        ?array $tags = null,
        ?RequestOptions $requestOptions = null,
    ): SimCardUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   iccid?: string,
     *   status?: list<'enabled'|'disabled'|'standby'|'data_limit_exceeded'|'unauthorized_imei'|Status>,
     *   tags?: list<string>,
     * } $filter Consolidated filter parameter for SIM cards (deepObject style). Originally: filter[tags], filter[iccid], filter[status]
     * @param string $filterSimCardGroupID a valid SIM card group ID
     * @param bool $includeSimCardGroup it includes the associated SIM card group object in the response when present
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     * @param 'current_billing_period_consumed_data.amount'|'-current_billing_period_consumed_data.amount'|Sort $sort Sorts SIM cards by the given field. Defaults to ascending order unless field is prefixed with a minus sign.
     *
     * @return DefaultPagination<SimpleSimCard>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?string $filterSimCardGroupID = null,
        bool $includeSimCardGroup = false,
        ?array $page = null,
        string|Sort|null $sort = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param bool $reportLost Enables deletion of disabled eSIMs that can't be uninstalled from a device. This is irreversible and the eSIM cannot be re-registered.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        bool $reportLost = false,
        ?RequestOptions $requestOptions = null,
    ): SimCardDeleteResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     *
     * @throws APIException
     */
    public function getActivationCode(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGetActivationCodeResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     *
     * @throws APIException
     */
    public function getDeviceDetails(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGetDeviceDetailsResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     *
     * @throws APIException
     */
    public function getPublicIP(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGetPublicIPResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     *
     * @return DefaultFlatPagination<SimCardListWirelessConnectivityLogsResponse>
     *
     * @throws APIException
     */
    public function listWirelessConnectivityLogs(
        string $id,
        int $pageNumber = 1,
        int $pageSize = 20,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;
}
