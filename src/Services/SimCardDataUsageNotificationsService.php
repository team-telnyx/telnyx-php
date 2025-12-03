<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardDataUsageNotificationsContract;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotification;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationDeleteResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationGetResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationListParams;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationNewResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateParams;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateResponse;

final class SimCardDataUsageNotificationsService implements SimCardDataUsageNotificationsContract
{
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
     *   sim_card_id: string, threshold: array{amount?: string, unit?: 'MB'|'GB'}
     * }|SimCardDataUsageNotificationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SimCardDataUsageNotificationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardDataUsageNotificationNewResponse {
        [$parsed, $options] = SimCardDataUsageNotificationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardDataUsageNotificationGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param array{
     *   sim_card_id?: string, threshold?: array{amount?: string, unit?: 'MB'|'GB'}
     * }|SimCardDataUsageNotificationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $simCardDataUsageNotificationID,
        array|SimCardDataUsageNotificationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardDataUsageNotificationUpdateResponse {
        [$parsed, $options] = SimCardDataUsageNotificationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'sim_card_data_usage_notifications/%1$s',
                $simCardDataUsageNotificationID,
            ],
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
     *   filter_sim_card_id_?: string, page_number_?: int, page_size_?: int
     * }|SimCardDataUsageNotificationListParams $params
     *
     * @return DefaultFlatPagination<SimCardDataUsageNotification>
     *
     * @throws APIException
     */
    public function list(
        array|SimCardDataUsageNotificationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination {
        [$parsed, $options] = SimCardDataUsageNotificationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'sim_card_data_usage_notifications',
            query: $parsed,
            options: $options,
            convert: SimCardDataUsageNotification::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete the SIM Card Data Usage Notification.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardDataUsageNotificationDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['sim_card_data_usage_notifications/%1$s', $id],
            options: $requestOptions,
            convert: SimCardDataUsageNotificationDeleteResponse::class,
        );
    }
}
