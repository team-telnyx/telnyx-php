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
use Telnyx\ServiceContracts\NotificationEventConditionsContract;

final class NotificationEventConditionsService implements NotificationEventConditionsContract
{
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
     *     associated_record_type?: array{eq?: 'account'|'phone_number'|Eq},
     *     channel_type_id?: array{
     *       eq?: 'webhook'|'sms'|'email'|'voice'|NotificationEventConditionListParams\Filter\ChannelTypeID\Eq,
     *     },
     *     notification_channel?: array{eq?: string},
     *     notification_event_condition_id?: array{eq?: string},
     *     notification_profile_id?: array{eq?: string},
     *     status?: array{
     *       eq?: 'enabled'|'enable-received'|'enable-pending'|'enable-submtited'|'delete-received'|'delete-pending'|'delete-submitted'|'deleted'|NotificationEventConditionListParams\Filter\Status\Eq,
     *     },
     *   },
     *   page?: array{number?: int, size?: int},
     * }|NotificationEventConditionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NotificationEventConditionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationEventConditionListResponse {
        [$parsed, $options] = NotificationEventConditionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NotificationEventConditionListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'notification_event_conditions',
            query: $parsed,
            options: $options,
            convert: NotificationEventConditionListResponse::class,
        );

        return $response->parse();
    }
}
