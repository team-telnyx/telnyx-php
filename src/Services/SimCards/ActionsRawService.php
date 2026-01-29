<?php

declare(strict_types=1);

namespace Telnyx\Services\SimCards;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCards\ActionsRawContract;
use Telnyx\SimCards\Actions\ActionBulkSetPublicIPsParams;
use Telnyx\SimCards\Actions\ActionBulkSetPublicIPsResponse;
use Telnyx\SimCards\Actions\ActionDisableResponse;
use Telnyx\SimCards\Actions\ActionEnableResponse;
use Telnyx\SimCards\Actions\ActionGetResponse;
use Telnyx\SimCards\Actions\ActionListParams;
use Telnyx\SimCards\Actions\ActionListParams\Filter;
use Telnyx\SimCards\Actions\ActionListParams\Page;
use Telnyx\SimCards\Actions\ActionRemovePublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetPublicIPParams;
use Telnyx\SimCards\Actions\ActionSetPublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetStandbyResponse;
use Telnyx\SimCards\Actions\ActionValidateRegistrationCodesParams;
use Telnyx\SimCards\Actions\ActionValidateRegistrationCodesResponse;
use Telnyx\SimCards\Actions\SimCardAction;

/**
 * @phpstan-import-type FilterShape from \Telnyx\SimCards\Actions\ActionListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\SimCards\Actions\ActionListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This API fetches detailed information about a SIM card action to follow-up on an existing asynchronous operation.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     *   filter?: Filter|FilterShape, page?: Page|PageShape
     * }|ActionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<SimCardAction>>
     *
     * @throws APIException
     */
    public function list(
        array|ActionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'sim_card_actions',
            query: $parsed,
            options: $options,
            convert: SimCardAction::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * This API triggers an asynchronous operation to set a public IP for each of the specified SIM cards.<br/>
     * For each SIM Card a SIM Card Action will be generated. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api-reference/sim-card-actions/list-sim-card-actions) API.
     *
     * @param array{simCardIDs: list<string>}|ActionBulkSetPublicIPsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionBulkSetPublicIPsResponse>
     *
     * @throws APIException
     */
    public function bulkSetPublicIPs(
        array|ActionBulkSetPublicIPsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionBulkSetPublicIPsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * The API will trigger an asynchronous operation called a SIM Card Action. Transitioning to the disabled state may take a period of time. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api-reference/sim-card-actions/list-sim-card-actions) API.
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionDisableResponse>
     *
     * @throws APIException
     */
    public function disable(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * The API will trigger an asynchronous operation called a SIM Card Action. Transitioning to the enabled state may take a period of time. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api-reference/sim-card-actions/list-sim-card-actions) API.
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionEnableResponse>
     *
     * @throws APIException
     */
    public function enable(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     *  The API will trigger an asynchronous operation called a SIM Card Action. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api-reference/sim-card-actions/list-sim-card-actions) API.
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionRemovePublicIPResponse>
     *
     * @throws APIException
     */
    public function removePublicIP(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     *  The API will trigger an asynchronous operation called a SIM Card Action. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api-reference/sim-card-actions/list-sim-card-actions) API. <br/><br/>
     *  Setting a Public IP to a SIM Card incurs a charge and will only succeed if the account has sufficient funds.
     *
     * @param string $id identifies the SIM
     * @param array{regionCode?: string}|ActionSetPublicIPParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionSetPublicIPResponse>
     *
     * @throws APIException
     */
    public function setPublicIP(
        string $id,
        array|ActionSetPublicIPParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionSetPublicIPParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['sim_cards/%1$s/actions/set_public_ip', $id],
            query: Util::array_transform_keys(
                $parsed,
                ['regionCode' => 'region_code']
            ),
            options: $options,
            convert: ActionSetPublicIPResponse::class,
        );
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
     * @return BaseResponse<ActionSetStandbyResponse>
     *
     * @throws APIException
     */
    public function setStandby(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     *   registrationCodes?: list<string>
     * }|ActionValidateRegistrationCodesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionValidateRegistrationCodesResponse>
     *
     * @throws APIException
     */
    public function validateRegistrationCodes(
        array|ActionValidateRegistrationCodesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionValidateRegistrationCodesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'sim_cards/actions/validate_registration_codes',
            body: (object) $parsed,
            options: $options,
            convert: ActionValidateRegistrationCodesResponse::class,
        );
    }
}
