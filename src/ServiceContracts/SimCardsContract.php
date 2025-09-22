<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\SimCards\SimCardDeleteResponse;
use Telnyx\SimCards\SimCardGetActivationCodeResponse;
use Telnyx\SimCards\SimCardGetDeviceDetailsResponse;
use Telnyx\SimCards\SimCardGetPublicIPResponse;
use Telnyx\SimCards\SimCardGetResponse;
use Telnyx\SimCards\SimCardListParams\Filter;
use Telnyx\SimCards\SimCardListParams\Page;
use Telnyx\SimCards\SimCardListParams\Sort;
use Telnyx\SimCards\SimCardListResponse;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsResponse;
use Telnyx\SimCards\SimCardUpdateParams\DataLimit;
use Telnyx\SimCards\SimCardUpdateResponse;
use Telnyx\SimCardStatus;

use const Telnyx\Core\OMIT as omit;

interface SimCardsContract
{
    /**
     * @api
     *
     * @param bool $includePinPukCodes When set to true, includes the PIN and PUK codes in the response. These codes are used for SIM card security and unlocking purposes. Available for both physical SIM cards and eSIMs.
     * @param bool $includeSimCardGroup it includes the associated SIM card group object in the response when present
     *
     * @return SimCardGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        $includePinPukCodes = omit,
        $includeSimCardGroup = omit,
        ?RequestOptions $requestOptions = null,
    ): SimCardGetResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SimCardGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimCardGetResponse;

    /**
     * @api
     *
     * @param list<string>|null $authorizedImeis list of IMEIs authorized to use a given SIM card
     * @param DataLimit $dataLimit the SIM card individual data limit configuration
     * @param string $simCardGroupID The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     * @param SimCardStatus $status
     * @param list<string> $tags Searchable tags associated with the SIM card
     *
     * @return SimCardUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $authorizedImeis = omit,
        $dataLimit = omit,
        $simCardGroupID = omit,
        $status = omit,
        $tags = omit,
        ?RequestOptions $requestOptions = null,
    ): SimCardUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SimCardUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimCardUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter for SIM cards (deepObject style). Originally: filter[tags], filter[iccid], filter[status]
     * @param string $filterSimCardGroupID a valid SIM card group ID
     * @param bool $includeSimCardGroup it includes the associated SIM card group object in the response when present
     * @param Page $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     * @param Sort|value-of<Sort> $sort Sorts SIM cards by the given field. Defaults to ascending order unless field is prefixed with a minus sign.
     *
     * @return SimCardListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $filterSimCardGroupID = omit,
        $includeSimCardGroup = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): SimCardListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SimCardListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimCardListResponse;

    /**
     * @api
     *
     * @param bool $reportLost Enables deletion of disabled eSIMs that can't be uninstalled from a device. This is irreversible and the eSIM cannot be re-registered.
     *
     * @return SimCardDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        $reportLost = omit,
        ?RequestOptions $requestOptions = null
    ): SimCardDeleteResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SimCardDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimCardDeleteResponse;

    /**
     * @api
     *
     * @return SimCardGetActivationCodeResponse<HasRawResponse>
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
     * @return SimCardGetActivationCodeResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getActivationCodeRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): SimCardGetActivationCodeResponse;

    /**
     * @api
     *
     * @return SimCardGetDeviceDetailsResponse<HasRawResponse>
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
     * @return SimCardGetDeviceDetailsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getDeviceDetailsRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): SimCardGetDeviceDetailsResponse;

    /**
     * @api
     *
     * @return SimCardGetPublicIPResponse<HasRawResponse>
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
     * @return SimCardGetPublicIPResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getPublicIPRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): SimCardGetPublicIPResponse;

    /**
     * @api
     *
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     *
     * @return SimCardListWirelessConnectivityLogsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listWirelessConnectivityLogs(
        string $id,
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): SimCardListWirelessConnectivityLogsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SimCardListWirelessConnectivityLogsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listWirelessConnectivityLogsRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimCardListWirelessConnectivityLogsResponse;
}
