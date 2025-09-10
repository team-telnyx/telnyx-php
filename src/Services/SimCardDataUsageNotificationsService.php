<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardDataUsageNotificationsContract;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams\Threshold;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationDeleteResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationGetResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationListParams;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationListResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationNewResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateParams;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateParams\Threshold as Threshold1;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateResponse;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $simCardID the identification UUID of the related SIM card resource
     * @param Threshold $threshold data usage threshold that will trigger the notification
     */
    public function create(
        $simCardID,
        $threshold,
        ?RequestOptions $requestOptions = null
    ): SimCardDataUsageNotificationNewResponse {
        [
            $parsed, $options,
        ] = SimCardDataUsageNotificationCreateParams::parseRequest(
            ['simCardID' => $simCardID, 'threshold' => $threshold],
            $requestOptions
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
     * @param string $simCardID the identification UUID of the related SIM card resource
     * @param Threshold1 $threshold data usage threshold that will trigger the notification
     */
    public function update(
        string $id,
        $simCardID = omit,
        $threshold = omit,
        ?RequestOptions $requestOptions = null,
    ): SimCardDataUsageNotificationUpdateResponse {
        [
            $parsed, $options,
        ] = SimCardDataUsageNotificationUpdateParams::parseRequest(
            ['simCardID' => $simCardID, 'threshold' => $threshold],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param string $filterSimCardID a valid SIM card ID
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     */
    public function list(
        $filterSimCardID = omit,
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): SimCardDataUsageNotificationListResponse {
        [$parsed, $options] = SimCardDataUsageNotificationListParams::parseRequest(
            [
                'filterSimCardID' => $filterSimCardID,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'sim_card_data_usage_notifications',
            query: $parsed,
            options: $options,
            convert: SimCardDataUsageNotificationListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete the SIM Card Data Usage Notification.
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
