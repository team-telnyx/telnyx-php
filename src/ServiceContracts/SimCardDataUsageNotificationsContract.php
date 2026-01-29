<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
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
interface SimCardDataUsageNotificationsContract
{
    /**
     * @api
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
    ): SimCardDataUsageNotificationNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SimCardDataUsageNotificationGetResponse;

    /**
     * @api
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
    ): SimCardDataUsageNotificationUpdateResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SimCardDataUsageNotificationDeleteResponse;
}
