<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter\AssociatedRecordType\Eq;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationEventConditionsRawContract;

final class NotificationEventConditionsRawService implements NotificationEventConditionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a list of your notifications events conditions.
     *
     * @param array{
     *   filter?: array{
     *     associatedRecordType?: array{eq?: 'account'|'phone_number'|Eq},
     *     channelTypeID?: array{
     *       eq?: 'webhook'|'sms'|'email'|'voice'|NotificationEventConditionListParams\Filter\ChannelTypeID\Eq,
     *     },
     *     notificationChannel?: array{eq?: string},
     *     notificationEventConditionID?: array{eq?: string},
     *     notificationProfileID?: array{eq?: string},
     *     status?: array{
     *       eq?: 'enabled'|'enable-received'|'enable-pending'|'enable-submtited'|'delete-received'|'delete-pending'|'delete-submitted'|'deleted'|NotificationEventConditionListParams\Filter\Status\Eq,
     *     },
     *   },
     *   page?: array{number?: int, size?: int},
     * }|NotificationEventConditionListParams $params
     *
     * @return BaseResponse<NotificationEventConditionListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationEventConditionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NotificationEventConditionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'notification_event_conditions',
            query: $parsed,
            options: $options,
            convert: NotificationEventConditionListResponse::class,
        );
    }
}
