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
use Telnyx\SimCards\SimCardListParams\Filter;
use Telnyx\SimCards\SimCardListParams\Page;
use Telnyx\SimCards\SimCardListParams\Sort;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsResponse;
use Telnyx\SimCards\SimCardUpdateParams\DataLimit;
use Telnyx\SimCards\SimCardUpdateResponse;
use Telnyx\SimCardStatus;
use Telnyx\SimpleSimCard;

/**
 * @phpstan-import-type DataLimitShape from \Telnyx\SimCards\SimCardUpdateParams\DataLimit
 * @phpstan-import-type SimCardStatusShape from \Telnyx\SimCardStatus
 * @phpstan-import-type FilterShape from \Telnyx\SimCards\SimCardListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\SimCards\SimCardListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SimCardsContract
{
    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param bool $includePinPukCodes When set to true, includes the PIN and PUK codes in the response. These codes are used for SIM card security and unlocking purposes. Available for both physical SIM cards and eSIMs.
     * @param bool $includeSimCardGroup it includes the associated SIM card group object in the response when present
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        bool $includePinPukCodes = false,
        bool $includeSimCardGroup = false,
        RequestOptions|array|null $requestOptions = null,
    ): SimCardGetResponse;

    /**
     * @api
     *
     * @param string $simCardID identifies the SIM
     * @param list<string>|null $authorizedImeis list of IMEIs authorized to use a given SIM card
     * @param DataLimit|DataLimitShape $dataLimit the SIM card individual data limit configuration
     * @param string $simCardGroupID The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     * @param SimCardStatus|SimCardStatusShape $status
     * @param list<string> $tags Searchable tags associated with the SIM card
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $simCardID,
        ?array $authorizedImeis = null,
        DataLimit|array|null $dataLimit = null,
        ?string $simCardGroupID = null,
        SimCardStatus|array|null $status = null,
        ?array $tags = null,
        RequestOptions|array|null $requestOptions = null,
    ): SimCardUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter for SIM cards (deepObject style). Originally: filter[tags], filter[iccid], filter[status]
     * @param string $filterSimCardGroupID a valid SIM card group ID
     * @param bool $includeSimCardGroup it includes the associated SIM card group object in the response when present
     * @param Page|PageShape $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     * @param Sort|value-of<Sort> $sort Sorts SIM cards by the given field. Defaults to ascending order unless field is prefixed with a minus sign.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<SimpleSimCard>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?string $filterSimCardGroupID = null,
        bool $includeSimCardGroup = false,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param bool $reportLost Enables deletion of disabled eSIMs that can't be uninstalled from a device. This is irreversible and the eSIM cannot be re-registered.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        bool $reportLost = false,
        RequestOptions|array|null $requestOptions = null,
    ): SimCardDeleteResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getActivationCode(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SimCardGetActivationCodeResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getDeviceDetails(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SimCardGetDeviceDetailsResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getPublicIP(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SimCardGetPublicIPResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<SimCardListWirelessConnectivityLogsResponse>
     *
     * @throws APIException
     */
    public function listWirelessConnectivityLogs(
        string $id,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
