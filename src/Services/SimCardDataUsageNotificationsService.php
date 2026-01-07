<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardDataUsageNotificationsContract;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotification;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams\Threshold;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationDeleteResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationGetResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationNewResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateResponse;

/**
 * @phpstan-import-type ThresholdShape from \Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams\Threshold
 * @phpstan-import-type ThresholdShape from \Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateParams\Threshold as ThresholdShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SimCardDataUsageNotificationsService implements SimCardDataUsageNotificationsContract
{
    /**
     * @api
     */
    public SimCardDataUsageNotificationsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SimCardDataUsageNotificationsRawService($client);
    }

    /**
     * @api
     *
     * Creates a new SIM card data usage notification.
     *
     * @param string $simCardID the identification UUID of the related SIM card resource
     * @param Threshold|ThresholdShape $threshold data usage threshold that will trigger the notification
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $simCardID,
        Threshold|array $threshold,
        RequestOptions|array|null $requestOptions = null,
    ): SimCardDataUsageNotificationNewResponse {
        $params = Util::removeNulls(
            ['simCardID' => $simCardID, 'threshold' => $threshold]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a single SIM Card Data Usage Notification.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SimCardDataUsageNotificationGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates information for a SIM Card Data Usage Notification.
     *
     * @param string $simCardDataUsageNotificationID identifies the resource
     * @param string $simCardID the identification UUID of the related SIM card resource
     * @param \Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateParams\Threshold|ThresholdShape1 $threshold data usage threshold that will trigger the notification
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $simCardDataUsageNotificationID,
        ?string $simCardID = null,
        \Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateParams\Threshold|array|null $threshold = null,
        RequestOptions|array|null $requestOptions = null,
    ): SimCardDataUsageNotificationUpdateResponse {
        $params = Util::removeNulls(
            ['simCardID' => $simCardID, 'threshold' => $threshold]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($simCardDataUsageNotificationID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists a paginated collection of SIM card data usage notifications. It enables exploring the collection using specific filters.
     *
     * @param string $filterSimCardID a valid SIM card ID
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<SimCardDataUsageNotification>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterSimCardID = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterSimCardID' => $filterSimCardID,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete the SIM Card Data Usage Notification.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SimCardDataUsageNotificationDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
