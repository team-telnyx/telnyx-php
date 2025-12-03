<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams;
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
     *     associated_record_type?: array{eq?: 'account'|'phone_number'},
     *     channel_type_id?: array{eq?: 'webhook'|'sms'|'email'|'voice'},
     *     notification_channel?: array{eq?: string},
     *     notification_event_condition_id?: array{eq?: string},
     *     notification_profile_id?: array{eq?: string},
     *     status?: array{
     *       eq?: 'enabled'|'enable-received'|'enable-pending'|'enable-submtited'|'delete-received'|'delete-pending'|'delete-submitted'|'deleted',
     *     },
     *   },
     *   page?: array{number?: int, size?: int},
     * }|NotificationEventConditionListParams $params
     *
     * @return DefaultPagination<NotificationEventConditionListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationEventConditionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = NotificationEventConditionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'notification_event_conditions',
            query: $parsed,
            options: $options,
            convert: NotificationEventConditionListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
