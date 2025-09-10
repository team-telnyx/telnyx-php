<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\NotificationProfiles\NotificationProfileCreateParams;
use Telnyx\NotificationProfiles\NotificationProfileDeleteResponse;
use Telnyx\NotificationProfiles\NotificationProfileGetResponse;
use Telnyx\NotificationProfiles\NotificationProfileListParams;
use Telnyx\NotificationProfiles\NotificationProfileListParams\Page;
use Telnyx\NotificationProfiles\NotificationProfileListResponse;
use Telnyx\NotificationProfiles\NotificationProfileNewResponse;
use Telnyx\NotificationProfiles\NotificationProfileUpdateParams;
use Telnyx\NotificationProfiles\NotificationProfileUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationProfilesContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $name a human readable name
     */
    public function create(
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileNewResponse {
        [$parsed, $options] = NotificationProfileCreateParams::parseRequest(
            ['name' => $name],
            $requestOptions
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
     * @param string $name a human readable name
     */
    public function update(
        string $id,
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileUpdateResponse {
        [$parsed, $options] = NotificationProfileUpdateParams::parseRequest(
            ['name' => $name],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['notification_profiles/%1$s', $id],
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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileListResponse {
        [$parsed, $options] = NotificationProfileListParams::parseRequest(
            ['page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'notification_profiles',
            query: $parsed,
            options: $options,
            convert: NotificationProfileListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a notification profile.
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
