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
use Telnyx\SimCards\Actions\ActionListResponse;
use Telnyx\SimCards\Actions\ActionRemovePublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetPublicIPParams;
use Telnyx\SimCards\Actions\ActionSetPublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetStandbyResponse;
use Telnyx\SimCards\Actions\ActionValidateRegistrationCodesParams;
use Telnyx\SimCards\Actions\ActionValidateRegistrationCodesResponse;

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
     * @param array{
     *   filter?: array{
     *     action_type?: 'enable'|'enable_standby_sim_card'|'disable'|'set_standby'|'remove_public_ip'|'set_public_ip',
     *     bulk_sim_card_action_id?: string,
     *     sim_card_id?: string,
     *     status?: 'in-progress'|'completed'|'failed',
     *   },
     *   page?: array{number?: int, size?: int},
     * }|ActionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ActionListParams $params,
        ?RequestOptions $requestOptions = null
    ): ActionListResponse {
        [$parsed, $options] = ActionListParams::parseRequest(
            $params,
            $requestOptions,
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
     * For each SIM Card a SIM Card Action will be generated. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api/wireless/list-sim-card-actions) API.
     *
     * @param array{sim_card_ids: list<string>}|ActionBulkSetPublicIPsParams $params
     *
     * @throws APIException
     */
    public function bulkSetPublicIPs(
        array|ActionBulkSetPublicIPsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionBulkSetPublicIPsResponse {
        [$parsed, $options] = ActionBulkSetPublicIPsParams::parseRequest(
            $params,
            $requestOptions,
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
     * The API will trigger an asynchronous operation called a SIM Card Action. Transitioning to the disabled state may take a period of time. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api/wireless/list-sim-card-actions) API.
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
     * The API will trigger an asynchronous operation called a SIM Card Action. Transitioning to the enabled state may take a period of time. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api/wireless/list-sim-card-actions) API.
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
     *  The API will trigger an asynchronous operation called a SIM Card Action. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api/wireless/list-sim-card-actions) API.
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
     *  The API will trigger an asynchronous operation called a SIM Card Action. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api/wireless/list-sim-card-actions) API. <br/><br/>
     *  Setting a Public IP to a SIM Card incurs a charge and will only succeed if the account has sufficient funds.
     *
     * @param array{region_code?: string}|ActionSetPublicIPParams $params
     *
     * @throws APIException
     */
    public function setPublicIP(
        string $id,
        array|ActionSetPublicIPParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionSetPublicIPResponse {
        [$parsed, $options] = ActionSetPublicIPParams::parseRequest(
            $params,
            $requestOptions,
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
     * The API will trigger an asynchronous operation called a SIM Card Action. Transitioning to the standby state may take a period of time. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api/wireless/list-sim-card-actions) API.
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
     * @param array{
     *   registration_codes?: list<string>
     * }|ActionValidateRegistrationCodesParams $params
     *
     * @throws APIException
     */
    public function validateRegistrationCodes(
        array|ActionValidateRegistrationCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionValidateRegistrationCodesResponse {
        [$parsed, $options] = ActionValidateRegistrationCodesParams::parseRequest(
            $params,
            $requestOptions,
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
