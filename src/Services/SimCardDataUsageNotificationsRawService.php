<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardDataUsageNotificationsRawContract;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams\Threshold\Unit;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationDeleteResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationGetResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationListParams;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationListResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationNewResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateParams;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateResponse;

final class SimCardDataUsageNotificationsRawService implements SimCardDataUsageNotificationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new SIM card data usage notification.
     *
     * @param array{
     *   simCardID: string, threshold: array{amount?: string, unit?: 'MB'|'GB'|Unit}
     * }|SimCardDataUsageNotificationCreateParams $params
     *
     * @return BaseResponse<SimCardDataUsageNotificationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SimCardDataUsageNotificationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SimCardDataUsageNotificationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'sim_card_data_usage_notifications',
            body: (object) $parsed,
            options: $options,
            convert: SimCardDataUsageNotificationNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a single SIM Card Data Usage Notification.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<SimCardDataUsageNotificationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['sim_card_data_usage_notifications/%1$s', $id],
            options: $requestOptions,
            convert: SimCardDataUsageNotificationGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates information for a SIM Card Data Usage Notification.
     *
     * @param string $id identifies the resource
     * @param array{
     *   simCardID?: string,
     *   threshold?: array{
     *     amount?: string,
     *     unit?: 'MB'|'GB'|SimCardDataUsageNotificationUpdateParams\Threshold\Unit,
     *   },
     * }|SimCardDataUsageNotificationUpdateParams $params
     *
     * @return BaseResponse<SimCardDataUsageNotificationUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|SimCardDataUsageNotificationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SimCardDataUsageNotificationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['sim_card_data_usage_notifications/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: SimCardDataUsageNotificationUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists a paginated collection of SIM card data usage notifications. It enables exploring the collection using specific filters.
     *
     * @param array{
     *   filterSimCardID?: string, pageNumber?: int, pageSize?: int
     * }|SimCardDataUsageNotificationListParams $params
     *
     * @return BaseResponse<SimCardDataUsageNotificationListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|SimCardDataUsageNotificationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SimCardDataUsageNotificationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'sim_card_data_usage_notifications',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterSimCardID' => 'filter[sim_card_id]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: SimCardDataUsageNotificationListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete the SIM Card Data Usage Notification.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<SimCardDataUsageNotificationDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['sim_card_data_usage_notifications/%1$s', $id],
            options: $requestOptions,
            convert: SimCardDataUsageNotificationDeleteResponse::class,
        );
    }
}
