<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardsRawContract;
use Telnyx\SimCards\SimCardDeleteParams;
use Telnyx\SimCards\SimCardDeleteResponse;
use Telnyx\SimCards\SimCardGetActivationCodeResponse;
use Telnyx\SimCards\SimCardGetDeviceDetailsResponse;
use Telnyx\SimCards\SimCardGetPublicIPResponse;
use Telnyx\SimCards\SimCardGetResponse;
use Telnyx\SimCards\SimCardListParams;
use Telnyx\SimCards\SimCardListParams\Filter\Status;
use Telnyx\SimCards\SimCardListParams\Sort;
use Telnyx\SimCards\SimCardListResponse;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsParams;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsResponse;
use Telnyx\SimCards\SimCardRetrieveParams;
use Telnyx\SimCards\SimCardUpdateParams;
use Telnyx\SimCards\SimCardUpdateParams\DataLimit\Unit;
use Telnyx\SimCards\SimCardUpdateResponse;
use Telnyx\SimCardStatus;
use Telnyx\SimCardStatus\Value;

final class SimCardsRawService implements SimCardsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the details regarding a specific SIM card.
     *
     * @param string $id identifies the SIM
     * @param array{
     *   includePinPukCodes?: bool, includeSimCardGroup?: bool
     * }|SimCardRetrieveParams $params
     *
     * @return BaseResponse<SimCardGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|SimCardRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SimCardRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['sim_cards/%1$s', $id],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'includePinPukCodes' => 'include_pin_puk_codes',
                    'includeSimCardGroup' => 'include_sim_card_group',
                ],
            ),
            options: $options,
            convert: SimCardGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates SIM card data
     *
     * @param string $id identifies the SIM
     * @param array{
     *   authorizedImeis?: list<string>|null,
     *   dataLimit?: array{amount?: string, unit?: 'MB'|'GB'|Unit},
     *   simCardGroupID?: string,
     *   status?: array{
     *     reason?: string,
     *     value?: 'registering'|'enabling'|'enabled'|'disabling'|'disabled'|'data_limit_exceeded'|'setting_standby'|'standby'|Value,
     *   }|SimCardStatus,
     *   tags?: list<string>,
     * }|SimCardUpdateParams $params
     *
     * @return BaseResponse<SimCardUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|SimCardUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SimCardUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   filter?: array{
     *     iccid?: string,
     *     status?: list<'enabled'|'disabled'|'standby'|'data_limit_exceeded'|'unauthorized_imei'|Status>,
     *     tags?: list<string>,
     *   },
     *   filterSimCardGroupID?: string,
     *   includeSimCardGroup?: bool,
     *   page?: array{number?: int, size?: int},
     *   sort?: 'current_billing_period_consumed_data.amount'|Sort,
     * }|SimCardListParams $params
     *
     * @return BaseResponse<SimCardListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|SimCardListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = SimCardListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'sim_cards',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterSimCardGroupID' => 'filter[sim_card_group_id]',
                    'includeSimCardGroup' => 'include_sim_card_group',
                ],
            ),
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
     * @param string $id identifies the SIM
     * @param array{reportLost?: bool}|SimCardDeleteParams $params
     *
     * @return BaseResponse<SimCardDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|SimCardDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SimCardDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['sim_cards/%1$s', $id],
            query: Util::array_transform_keys(
                $parsed,
                ['reportLost' => 'report_lost']
            ),
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
     * @param string $id identifies the SIM
     *
     * @return BaseResponse<SimCardGetActivationCodeResponse>
     *
     * @throws APIException
     */
    public function getActivationCode(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the SIM
     *
     * @return BaseResponse<SimCardGetDeviceDetailsResponse>
     *
     * @throws APIException
     */
    public function getDeviceDetails(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the SIM
     *
     * @return BaseResponse<SimCardGetPublicIPResponse>
     *
     * @throws APIException
     */
    public function getPublicIP(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the SIM
     * @param array{
     *   pageNumber?: int, pageSize?: int
     * }|SimCardListWirelessConnectivityLogsParams $params
     *
     * @return BaseResponse<SimCardListWirelessConnectivityLogsResponse>
     *
     * @throws APIException
     */
    public function listWirelessConnectivityLogs(
        string $id,
        array|SimCardListWirelessConnectivityLogsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SimCardListWirelessConnectivityLogsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['sim_cards/%1$s/wireless_connectivity_logs', $id],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: SimCardListWirelessConnectivityLogsResponse::class,
        );
    }
}
