<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardsContract;
use Telnyx\Services\SimCards\ActionsService;
use Telnyx\SimCards\SimCardDeleteParams;
use Telnyx\SimCards\SimCardDeleteResponse;
use Telnyx\SimCards\SimCardGetActivationCodeResponse;
use Telnyx\SimCards\SimCardGetDeviceDetailsResponse;
use Telnyx\SimCards\SimCardGetPublicIPResponse;
use Telnyx\SimCards\SimCardGetResponse;
use Telnyx\SimCards\SimCardListParams;
use Telnyx\SimCards\SimCardListParams\Filter;
use Telnyx\SimCards\SimCardListParams\Page;
use Telnyx\SimCards\SimCardListParams\Sort;
use Telnyx\SimCards\SimCardListResponse;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsParams;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsResponse;
use Telnyx\SimCards\SimCardRetrieveParams;
use Telnyx\SimCards\SimCardUpdateParams;
use Telnyx\SimCards\SimCardUpdateParams\DataLimit;
use Telnyx\SimCards\SimCardUpdateResponse;
use Telnyx\SimCardStatus;

use const Telnyx\Core\OMIT as omit;

final class SimCardsService implements SimCardsContract
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
     * Returns the details regarding a specific SIM card.
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
    ): SimCardGetResponse {
        $params = [
            'includePinPukCodes' => $includePinPukCodes,
            'includeSimCardGroup' => $includeSimCardGroup,
        ];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

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
    ): SimCardGetResponse {
        [$parsed, $options] = SimCardRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['sim_cards/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: SimCardGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates SIM card data
     *
     * @param list<string> $authorizedImeis list of IMEIs authorized to use a given SIM card
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
    ): SimCardUpdateResponse {
        $params = [
            'authorizedImeis' => $authorizedImeis,
            'dataLimit' => $dataLimit,
            'simCardGroupID' => $simCardGroupID,
            'status' => $status,
            'tags' => $tags,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

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
    ): SimCardUpdateResponse {
        [$parsed, $options] = SimCardUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['sim_cards/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: SimCardUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all SIM cards belonging to the user that match the given filters.
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
    ): SimCardListResponse {
        $params = [
            'filter' => $filter,
            'filterSimCardGroupID' => $filterSimCardGroupID,
            'includeSimCardGroup' => $includeSimCardGroup,
            'page' => $page,
            'sort' => $sort,
        ];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): SimCardListResponse {
        [$parsed, $options] = SimCardListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'sim_cards',
            query: $parsed,
            options: $options,
            convert: SimCardListResponse::class,
        );
    }

    /**
     * @api
     *
     * The SIM card will be decommissioned, removed from your account and you will stop being charged.<br />The SIM card won't be able to connect to the network after the deletion is completed, thus making it impossible to consume data.<br/>
     * Transitioning to the disabled state may take a period of time.
     * Until the transition is completed, the SIM card status will be disabling <code>disabling</code>.<br />In order to re-enable the SIM card, you will need to re-register it.
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
    ): SimCardDeleteResponse {
        $params = ['reportLost' => $reportLost];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

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
    ): SimCardDeleteResponse {
        [$parsed, $options] = SimCardDeleteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['sim_cards/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: SimCardDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * It returns the activation code for an eSIM.<br/><br/>
     *  This API is only available for eSIMs. If the given SIM is a physical SIM card, or has already been installed, an error will be returned.
     *
     * @return SimCardGetActivationCodeResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getActivationCode(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGetActivationCodeResponse {
        $params = [];

        return $this->getActivationCodeRaw($id, $params, $requestOptions);
    }

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
    ): SimCardGetActivationCodeResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['sim_cards/%1$s/activation_code', $id],
            options: $requestOptions,
            convert: SimCardGetActivationCodeResponse::class,
        );
    }

    /**
     * @api
     *
     * It returns the device details where a SIM card is currently being used.
     *
     * @return SimCardGetDeviceDetailsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getDeviceDetails(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGetDeviceDetailsResponse {
        $params = [];

        return $this->getDeviceDetailsRaw($id, $params, $requestOptions);
    }

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
    ): SimCardGetDeviceDetailsResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['sim_cards/%1$s/device_details', $id],
            options: $requestOptions,
            convert: SimCardGetDeviceDetailsResponse::class,
        );
    }

    /**
     * @api
     *
     * It returns the public IP requested for a SIM card.
     *
     * @return SimCardGetPublicIPResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getPublicIP(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGetPublicIPResponse {
        $params = [];

        return $this->getPublicIPRaw($id, $params, $requestOptions);
    }

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
    ): SimCardGetPublicIPResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['sim_cards/%1$s/public_ip', $id],
            options: $requestOptions,
            convert: SimCardGetPublicIPResponse::class,
        );
    }

    /**
     * @api
     *
     * This API allows listing a paginated collection of Wireless Connectivity Logs associated with a SIM Card, for troubleshooting purposes.
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
    ): SimCardListWirelessConnectivityLogsResponse {
        $params = ['pageNumber' => $pageNumber, 'pageSize' => $pageSize];

        return $this->listWirelessConnectivityLogsRaw(
            $id,
            $params,
            $requestOptions
        );
    }

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
    ): SimCardListWirelessConnectivityLogsResponse {
        [
            $parsed, $options,
        ] = SimCardListWirelessConnectivityLogsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['sim_cards/%1$s/wireless_connectivity_logs', $id],
            query: $parsed,
            options: $options,
            convert: SimCardListWirelessConnectivityLogsResponse::class,
        );
    }
}
