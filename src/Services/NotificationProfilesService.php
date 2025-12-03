<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationProfiles\NotificationProfile;
use Telnyx\NotificationProfiles\NotificationProfileCreateParams;
use Telnyx\NotificationProfiles\NotificationProfileDeleteResponse;
use Telnyx\NotificationProfiles\NotificationProfileGetResponse;
use Telnyx\NotificationProfiles\NotificationProfileListParams;
use Telnyx\NotificationProfiles\NotificationProfileNewResponse;
use Telnyx\NotificationProfiles\NotificationProfileUpdateParams;
use Telnyx\NotificationProfiles\NotificationProfileUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationProfilesContract;

final class NotificationProfilesService implements NotificationProfilesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a notification profile.
     *
     * @param array{name?: string}|NotificationProfileCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NotificationProfileCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationProfileNewResponse {
        [$parsed, $options] = NotificationProfileCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'notification_profiles',
            body: (object) $parsed,
            options: $options,
            convert: NotificationProfileNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a notification profile.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['notification_profiles/%1$s', $id],
            options: $requestOptions,
            convert: NotificationProfileGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a notification profile.
     *
     * @param array{name?: string}|NotificationProfileUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $notificationProfileID,
        array|NotificationProfileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationProfileUpdateResponse {
        [$parsed, $options] = NotificationProfileUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['notification_profiles/%1$s', $notificationProfileID],
            body: (object) $parsed,
            options: $options,
            convert: NotificationProfileUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your notifications profiles.
     *
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|NotificationProfileListParams $params
     *
     * @return DefaultPagination<NotificationProfile>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = NotificationProfileListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'notification_profiles',
            query: $parsed,
            options: $options,
            convert: NotificationProfile::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a notification profile.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['notification_profiles/%1$s', $id],
            options: $requestOptions,
            convert: NotificationProfileDeleteResponse::class,
        );
    }
}
