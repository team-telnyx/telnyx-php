<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardsContract;
use Telnyx\Services\SimCards\ActionsService;
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

final class SimCardsService implements SimCardsContract
{
    /**
     * @api
     */
    public SimCardsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SimCardsRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Returns the details regarding a specific SIM card.
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
    ): SimCardGetResponse {
        $params = Util::removeNulls(
            [
                'includePinPukCodes' => $includePinPukCodes,
                'includeSimCardGroup' => $includeSimCardGroup,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates SIM card data
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
    ): SimCardUpdateResponse {
        $params = Util::removeNulls(
            [
                'authorizedImeis' => $authorizedImeis,
                'dataLimit' => $dataLimit,
                'simCardGroupID' => $simCardGroupID,
                'status' => $status,
                'tags' => $tags,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($simCardID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all SIM cards belonging to the user that match the given filters.
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
    ): DefaultPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'filterSimCardGroupID' => $filterSimCardGroupID,
                'includeSimCardGroup' => $includeSimCardGroup,
                'page' => $page,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * The SIM card will be decommissioned, removed from your account and you will stop being charged.<br />The SIM card won't be able to connect to the network after the deletion is completed, thus making it impossible to consume data.<br/>
     * Transitioning to the disabled state may take a period of time.
     * Until the transition is completed, the SIM card status will be disabling <code>disabling</code>.<br />In order to re-enable the SIM card, you will need to re-register it.
     *
     * @param string $id identifies the SIM
     * @param bool $reportLost Enables deletion of disabled eSIMs that can't be uninstalled from a device. This is irreversible and the eSIM cannot be re-registered.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        bool $reportLost = false,
        ?RequestOptions $requestOptions = null
    ): SimCardDeleteResponse {
        $params = Util::removeNulls(['reportLost' => $reportLost]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * It returns the activation code for an eSIM.<br/><br/>
     *  This API is only available for eSIMs. If the given SIM is a physical SIM card, or has already been installed, an error will be returned.
     *
     * @param string $id identifies the SIM
     *
     * @throws APIException
     */
    public function getActivationCode(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGetActivationCodeResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getActivationCode($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * It returns the device details where a SIM card is currently being used.
     *
     * @param string $id identifies the SIM
     *
     * @throws APIException
     */
    public function getDeviceDetails(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGetDeviceDetailsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDeviceDetails($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * It returns the public IP requested for a SIM card.
     *
     * @param string $id identifies the SIM
     *
     * @throws APIException
     */
    public function getPublicIP(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGetPublicIPResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getPublicIP($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This API allows listing a paginated collection of Wireless Connectivity Logs associated with a SIM Card, for troubleshooting purposes.
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listWirelessConnectivityLogs($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
