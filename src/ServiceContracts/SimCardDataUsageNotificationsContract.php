<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotification;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationDeleteResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationGetResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationListParams;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationNewResponse;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateParams;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateResponse;

interface SimCardDataUsageNotificationsContract
{
    /**
     * @api
     *
     * @param array<mixed>|SimCardDataUsageNotificationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SimCardDataUsageNotificationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardDataUsageNotificationNewResponse;

    /**
     * @api
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
     * @param array<mixed>|SimCardDataUsageNotificationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $simCardDataUsageNotificationID,
        array|SimCardDataUsageNotificationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardDataUsageNotificationUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|SimCardDataUsageNotificationListParams $params
     *
     * @return DefaultFlatPagination<SimCardDataUsageNotification>
     *
     * @throws APIException
     */
    public function list(
        array|SimCardDataUsageNotificationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardDataUsageNotificationDeleteResponse;
}
