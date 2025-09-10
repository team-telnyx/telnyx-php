<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RequestOptions;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams\Threshold;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationDeleteResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationGetResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationListResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationNewResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateParams\Threshold as Threshold1;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateResponse;

use const Telnyx\Core\OMIT as omit;

interface SimCardDataUsageNotificationsContract
{
    /**
     * @api
     *
     * @param string $simCardID the identification UUID of the related SIM card resource
     * @param Threshold $threshold data usage threshold that will trigger the notification
     */
    public function create(
        $simCardID,
        $threshold,
        ?RequestOptions $requestOptions = null
    ): SimCardDataUsageNotificationNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardDataUsageNotificationGetResponse;

    /**
     * @api
     *
     * @param string $simCardID the identification UUID of the related SIM card resource
     * @param Threshold1 $threshold data usage threshold that will trigger the notification
     */
    public function update(
        string $id,
        $simCardID = omit,
        $threshold = omit,
        ?RequestOptions $requestOptions = null,
    ): SimCardDataUsageNotificationUpdateResponse;

    /**
     * @api
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
    ): SimCardDataUsageNotificationListResponse;

    /**
     * @api
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardDataUsageNotificationDeleteResponse;
}
