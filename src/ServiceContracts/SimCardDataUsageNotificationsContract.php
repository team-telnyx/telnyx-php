<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotification;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams\Threshold\Unit;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationDeleteResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationGetResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationNewResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateResponse;

interface SimCardDataUsageNotificationsContract
{
    /**
     * @api
     *
     * @param string $simCardID the identification UUID of the related SIM card resource
     * @param array{
     *   amount?: string, unit?: 'MB'|'GB'|Unit
     * } $threshold Data usage threshold that will trigger the notification
     *
     * @throws APIException
     */
    public function create(
        string $simCardID,
        array $threshold,
        ?RequestOptions $requestOptions = null,
    ): SimCardDataUsageNotificationNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardDataUsageNotificationGetResponse;

    /**
     * @api
     *
     * @param string $simCardDataUsageNotificationID identifies the resource
     * @param string $simCardID the identification UUID of the related SIM card resource
     * @param array{
     *   amount?: string,
     *   unit?: 'MB'|'GB'|\Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateParams\Threshold\Unit,
     * } $threshold Data usage threshold that will trigger the notification
     *
     * @throws APIException
     */
    public function update(
        string $simCardDataUsageNotificationID,
        ?string $simCardID = null,
        ?array $threshold = null,
        ?RequestOptions $requestOptions = null,
    ): SimCardDataUsageNotificationUpdateResponse;

    /**
     * @api
     *
     * @param string $filterSimCardID a valid SIM card ID
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     *
     * @return DefaultFlatPagination<SimCardDataUsageNotification>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterSimCardID = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardDataUsageNotificationDeleteResponse;
}
