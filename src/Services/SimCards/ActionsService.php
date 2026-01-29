<?php

declare(strict_types=1);

namespace Telnyx\Services\SimCards;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCards\ActionsContract;
use Telnyx\SimCards\Actions\ActionBulkSetPublicIPsResponse;
use Telnyx\SimCards\Actions\ActionDisableResponse;
use Telnyx\SimCards\Actions\ActionEnableResponse;
use Telnyx\SimCards\Actions\ActionGetResponse;
use Telnyx\SimCards\Actions\ActionListParams\Filter;
use Telnyx\SimCards\Actions\ActionListParams\Page;
use Telnyx\SimCards\Actions\ActionRemovePublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetPublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetStandbyResponse;
use Telnyx\SimCards\Actions\ActionValidateRegistrationCodesResponse;
use Telnyx\SimCards\Actions\SimCardAction;

/**
 * @phpstan-import-type FilterShape from \Telnyx\SimCards\Actions\ActionListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\SimCards\Actions\ActionListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * This API fetches detailed information about a SIM card action to follow-up on an existing asynchronous operation.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This API lists a paginated collection of SIM card actions. It enables exploring a collection of existing asynchronous operations using specific filters.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter for SIM card actions (deepObject style). Originally: filter[sim_card_id], filter[status], filter[bulk_sim_card_action_id], filter[action_type]
     * @param Page|PageShape $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<SimCardAction>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This API triggers an asynchronous operation to set a public IP for each of the specified SIM cards.<br/>
     * For each SIM Card a SIM Card Action will be generated. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api-reference/sim-card-actions/list-sim-card-actions) API.
     *
     * @param list<string> $simCardIDs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function bulkSetPublicIPs(
        array $simCardIDs,
        RequestOptions|array|null $requestOptions = null
    ): ActionBulkSetPublicIPsResponse {
        $params = Util::removeNulls(['simCardIDs' => $simCardIDs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->bulkSetPublicIPs(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This API disables a SIM card, disconnecting it from the network and making it impossible to consume data.<br/>
     * The API will trigger an asynchronous operation called a SIM Card Action. Transitioning to the disabled state may take a period of time. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api-reference/sim-card-actions/list-sim-card-actions) API.
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function disable(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionDisableResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->disable($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This API enables a SIM card, connecting it to the network and making it possible to consume data.<br/>
     * To enable a SIM card, it must be associated with a SIM card group.<br/>
     * The API will trigger an asynchronous operation called a SIM Card Action. Transitioning to the enabled state may take a period of time. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api-reference/sim-card-actions/list-sim-card-actions) API.
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function enable(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionEnableResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->enable($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This API removes an existing public IP from a SIM card. <br/><br/>
     *  The API will trigger an asynchronous operation called a SIM Card Action. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api-reference/sim-card-actions/list-sim-card-actions) API.
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function removePublicIP(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionRemovePublicIPResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->removePublicIP($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This API makes a SIM card reachable on the public internet by mapping a random public IP to the SIM card. <br/><br/>
     *  The API will trigger an asynchronous operation called a SIM Card Action. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api-reference/sim-card-actions/list-sim-card-actions) API. <br/><br/>
     *  Setting a Public IP to a SIM Card incurs a charge and will only succeed if the account has sufficient funds.
     *
     * @param string $id identifies the SIM
     * @param string $regionCode The code of the region where the public IP should be assigned. A list of available regions can be found at the regions endpoint
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setPublicIP(
        string $id,
        ?string $regionCode = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionSetPublicIPResponse {
        $params = Util::removeNulls(['regionCode' => $regionCode]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->setPublicIP($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * The SIM card will be able to connect to the network once the process to set it to standby has been completed, thus making it possible to consume data.<br/>
     * To set a SIM card to standby, it must be associated with SIM card group.<br/>
     * The API will trigger an asynchronous operation called a SIM Card Action. Transitioning to the standby state may take a period of time. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api-reference/sim-card-actions/list-sim-card-actions) API.
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setStandby(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionSetStandbyResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->setStandby($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * It validates whether SIM card registration codes are valid or not.
     *
     * @param list<string> $registrationCodes
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function validateRegistrationCodes(
        ?array $registrationCodes = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionValidateRegistrationCodesResponse {
        $params = Util::removeNulls(['registrationCodes' => $registrationCodes]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->validateRegistrationCodes(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
