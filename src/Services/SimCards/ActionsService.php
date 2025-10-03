<?php

declare(strict_types=1);

namespace Telnyx\Services\SimCards;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCards\ActionsContract;
use Telnyx\SimCards\Actions\ActionBulkSetPublicIPsParams;
use Telnyx\SimCards\Actions\ActionBulkSetPublicIPsResponse;
use Telnyx\SimCards\Actions\ActionDisableResponse;
use Telnyx\SimCards\Actions\ActionEnableResponse;
use Telnyx\SimCards\Actions\ActionGetResponse;
use Telnyx\SimCards\Actions\ActionListParams;
use Telnyx\SimCards\Actions\ActionListParams\Filter;
use Telnyx\SimCards\Actions\ActionListParams\Page;
use Telnyx\SimCards\Actions\ActionListResponse;
use Telnyx\SimCards\Actions\ActionRemovePublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetPublicIPParams;
use Telnyx\SimCards\Actions\ActionSetPublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetStandbyResponse;
use Telnyx\SimCards\Actions\ActionValidateRegistrationCodesParams;
use Telnyx\SimCards\Actions\ActionValidateRegistrationCodesResponse;

use const Telnyx\Core\OMIT as omit;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This API fetches detailed information about a SIM card action to follow-up on an existing asynchronous operation.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['sim_card_actions/%1$s', $id],
            options: $requestOptions,
            convert: ActionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * This API lists a paginated collection of SIM card actions. It enables exploring a collection of existing asynchronous operations using specific filters.
     *
     * @param Filter $filter Consolidated filter parameter for SIM card actions (deepObject style). Originally: filter[sim_card_id], filter[status], filter[bulk_sim_card_action_id], filter[action_type]
     * @param Page $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ActionListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionListResponse {
        [$parsed, $options] = ActionListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'sim_card_actions',
            query: $parsed,
            options: $options,
            convert: ActionListResponse::class,
        );
    }

    /**
     * @api
     *
     * This API triggers an asynchronous operation to set a public IP for each of the specified SIM cards.<br/>
     * For each SIM Card a SIM Card Action will be generated. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developersdev.telnyx.com/docs/api/v2/wireless/SIM-Card-Actions#ListSIMCardActions) API.
     *
     * @param list<string> $simCardIDs
     *
     * @throws APIException
     */
    public function bulkSetPublicIPs(
        $simCardIDs,
        ?RequestOptions $requestOptions = null
    ): ActionBulkSetPublicIPsResponse {
        $params = ['simCardIDs' => $simCardIDs];

        return $this->bulkSetPublicIPsRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function bulkSetPublicIPsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionBulkSetPublicIPsResponse {
        [$parsed, $options] = ActionBulkSetPublicIPsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'sim_cards/actions/bulk_set_public_ips',
            body: (object) $parsed,
            options: $options,
            convert: ActionBulkSetPublicIPsResponse::class,
        );
    }

    /**
     * @api
     *
     * This API disables a SIM card, disconnecting it from the network and making it impossible to consume data.<br/>
     * The API will trigger an asynchronous operation called a SIM Card Action. Transitioning to the disabled state may take a period of time. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developersdev.telnyx.com/docs/api/v2/wireless/SIM-Card-Actions#ListSIMCardActions) API.
     *
     * @throws APIException
     */
    public function disable(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionDisableResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['sim_cards/%1$s/actions/disable', $id],
            options: $requestOptions,
            convert: ActionDisableResponse::class,
        );
    }

    /**
     * @api
     *
     * This API enables a SIM card, connecting it to the network and making it possible to consume data.<br/>
     * To enable a SIM card, it must be associated with a SIM card group.<br/>
     * The API will trigger an asynchronous operation called a SIM Card Action. Transitioning to the enabled state may take a period of time. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developersdev.telnyx.com/docs/api/v2/wireless/SIM-Card-Actions#ListSIMCardActions) API.
     *
     * @throws APIException
     */
    public function enable(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionEnableResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['sim_cards/%1$s/actions/enable', $id],
            options: $requestOptions,
            convert: ActionEnableResponse::class,
        );
    }

    /**
     * @api
     *
     * This API removes an existing public IP from a SIM card. <br/><br/>
     *  The API will trigger an asynchronous operation called a SIM Card Action. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developersdev.telnyx.com/docs/api/v2/wireless/SIM-Card-Actions#ListSIMCardActions) API.
     *
     * @throws APIException
     */
    public function removePublicIP(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionRemovePublicIPResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['sim_cards/%1$s/actions/remove_public_ip', $id],
            options: $requestOptions,
            convert: ActionRemovePublicIPResponse::class,
        );
    }

    /**
     * @api
     *
     * This API makes a SIM card reachable on the public internet by mapping a random public IP to the SIM card. <br/><br/>
     *  The API will trigger an asynchronous operation called a SIM Card Action. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developersdev.telnyx.com/docs/api/v2/wireless/SIM-Card-Actions#ListSIMCardActions) API. <br/><br/>
     *  Setting a Public IP to a SIM Card incurs a charge and will only succeed if the account has sufficient funds.
     *
     * @param string $regionCode The code of the region where the public IP should be assigned. A list of available regions can be found at the regions endpoint
     *
     * @throws APIException
     */
    public function setPublicIP(
        string $id,
        $regionCode = omit,
        ?RequestOptions $requestOptions = null
    ): ActionSetPublicIPResponse {
        $params = ['regionCode' => $regionCode];

        return $this->setPublicIPRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function setPublicIPRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionSetPublicIPResponse {
        [$parsed, $options] = ActionSetPublicIPParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['sim_cards/%1$s/actions/set_public_ip', $id],
            query: $parsed,
            options: $options,
            convert: ActionSetPublicIPResponse::class,
        );
    }

    /**
     * @api
     *
     * The SIM card will be able to connect to the network once the process to set it to standby has been completed, thus making it possible to consume data.<br/>
     * To set a SIM card to standby, it must be associated with SIM card group.<br/>
     * The API will trigger an asynchronous operation called a SIM Card Action. Transitioning to the standby state may take a period of time. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developersdev.telnyx.com/docs/api/v2/wireless/SIM-Card-Actions#ListSIMCardActions) API.
     *
     * @throws APIException
     */
    public function setStandby(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionSetStandbyResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['sim_cards/%1$s/actions/set_standby', $id],
            options: $requestOptions,
            convert: ActionSetStandbyResponse::class,
        );
    }

    /**
     * @api
     *
     * It validates whether SIM card registration codes are valid or not.
     *
     * @param list<string> $registrationCodes
     *
     * @throws APIException
     */
    public function validateRegistrationCodes(
        $registrationCodes = omit,
        ?RequestOptions $requestOptions = null
    ): ActionValidateRegistrationCodesResponse {
        $params = ['registrationCodes' => $registrationCodes];

        return $this->validateRegistrationCodesRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function validateRegistrationCodesRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionValidateRegistrationCodesResponse {
        [$parsed, $options] = ActionValidateRegistrationCodesParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'sim_cards/actions/validate_registration_codes',
            body: (object) $parsed,
            options: $options,
            convert: ActionValidateRegistrationCodesResponse::class,
        );
    }
}
