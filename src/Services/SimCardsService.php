<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
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
use Telnyx\SimCards\SimCardListResponse;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsParams;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsResponse;
use Telnyx\SimCards\SimCardRetrieveParams;
use Telnyx\SimCards\SimCardUpdateParams;
use Telnyx\SimCards\SimCardUpdateResponse;
use Telnyx\SimCardStatus;

final class SimCardsService implements SimCardsContract
{
    /**
     * @api
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
     * @param array{
     *   include_pin_puk_codes?: bool, include_sim_card_group?: bool
     * }|SimCardRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|SimCardRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardGetResponse {
        [$parsed, $options] = SimCardRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SimCardGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['sim_cards/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: SimCardGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates SIM card data
     *
     * @param array{
     *   authorized_imeis?: list<string>|null,
     *   data_limit?: array{amount?: string, unit?: 'MB'|'GB'},
     *   sim_card_group_id?: string,
     *   status?: array{
     *     reason?: string,
     *     value?: 'registering'|'enabling'|'enabled'|'disabling'|'disabled'|'data_limit_exceeded'|'setting_standby'|'standby',
     *   }|SimCardStatus,
     *   tags?: list<string>,
     * }|SimCardUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|SimCardUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardUpdateResponse {
        [$parsed, $options] = SimCardUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SimCardUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['sim_cards/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: SimCardUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all SIM cards belonging to the user that match the given filters.
     *
     * @param array{
     *   filter?: array{
     *     iccid?: string,
     *     status?: list<'enabled'|'disabled'|'standby'|'data_limit_exceeded'|'unauthorized_imei'>,
     *     tags?: list<string>,
     *   },
     *   filter_sim_card_group_id_?: string,
     *   include_sim_card_group?: bool,
     *   page?: array{number?: int, size?: int},
     *   sort?: 'current_billing_period_consumed_data.amount',
     * }|SimCardListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|SimCardListParams $params,
        ?RequestOptions $requestOptions = null
    ): SimCardListResponse {
        [$parsed, $options] = SimCardListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SimCardListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'sim_cards',
            query: $parsed,
            options: $options,
            convert: SimCardListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * The SIM card will be decommissioned, removed from your account and you will stop being charged.<br />The SIM card won't be able to connect to the network after the deletion is completed, thus making it impossible to consume data.<br/>
     * Transitioning to the disabled state may take a period of time.
     * Until the transition is completed, the SIM card status will be disabling <code>disabling</code>.<br />In order to re-enable the SIM card, you will need to re-register it.
     *
     * @param array{report_lost?: bool}|SimCardDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|SimCardDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardDeleteResponse {
        [$parsed, $options] = SimCardDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SimCardDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['sim_cards/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: SimCardDeleteResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * It returns the activation code for an eSIM.<br/><br/>
     *  This API is only available for eSIMs. If the given SIM is a physical SIM card, or has already been installed, an error will be returned.
     *
     * @throws APIException
     */
    public function getActivationCode(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGetActivationCodeResponse {
        /** @var BaseResponse<SimCardGetActivationCodeResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['sim_cards/%1$s/activation_code', $id],
            options: $requestOptions,
            convert: SimCardGetActivationCodeResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * It returns the device details where a SIM card is currently being used.
     *
     * @throws APIException
     */
    public function getDeviceDetails(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGetDeviceDetailsResponse {
        /** @var BaseResponse<SimCardGetDeviceDetailsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['sim_cards/%1$s/device_details', $id],
            options: $requestOptions,
            convert: SimCardGetDeviceDetailsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * It returns the public IP requested for a SIM card.
     *
     * @throws APIException
     */
    public function getPublicIP(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGetPublicIPResponse {
        /** @var BaseResponse<SimCardGetPublicIPResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['sim_cards/%1$s/public_ip', $id],
            options: $requestOptions,
            convert: SimCardGetPublicIPResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * This API allows listing a paginated collection of Wireless Connectivity Logs associated with a SIM Card, for troubleshooting purposes.
     *
     * @param array{
     *   page_number_?: int, page_size_?: int
     * }|SimCardListWirelessConnectivityLogsParams $params
     *
     * @throws APIException
     */
    public function listWirelessConnectivityLogs(
        string $id,
        array|SimCardListWirelessConnectivityLogsParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardListWirelessConnectivityLogsResponse {
        [$parsed, $options] = SimCardListWirelessConnectivityLogsParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SimCardListWirelessConnectivityLogsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['sim_cards/%1$s/wireless_connectivity_logs', $id],
            query: $parsed,
            options: $options,
            convert: SimCardListWirelessConnectivityLogsResponse::class,
        );

        return $response->parse();
    }
}
