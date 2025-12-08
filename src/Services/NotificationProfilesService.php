<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NotificationProfiles\NotificationProfileCreateParams;
use Telnyx\NotificationProfiles\NotificationProfileDeleteResponse;
use Telnyx\NotificationProfiles\NotificationProfileGetResponse;
use Telnyx\NotificationProfiles\NotificationProfileListParams;
use Telnyx\NotificationProfiles\NotificationProfileListResponse;
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

        /** @var BaseResponse<NotificationProfileNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'notification_profiles',
            body: (object) $parsed,
            options: $options,
            convert: NotificationProfileNewResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<NotificationProfileGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['notification_profiles/%1$s', $id],
            options: $requestOptions,
            convert: NotificationProfileGetResponse::class,
        );

        return $response->parse();
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
        string $id,
        array|NotificationProfileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationProfileUpdateResponse {
        [$parsed, $options] = NotificationProfileUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NotificationProfileUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['notification_profiles/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: NotificationProfileUpdateResponse::class,
        );

        return $response->parse();
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
     * @throws APIException
     */
    public function list(
        array|NotificationProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationProfileListResponse {
        [$parsed, $options] = NotificationProfileListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NotificationProfileListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'notification_profiles',
            query: $parsed,
            options: $options,
            convert: NotificationProfileListResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<NotificationProfileDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['notification_profiles/%1$s', $id],
            options: $requestOptions,
            convert: NotificationProfileDeleteResponse::class,
        );

        return $response->parse();
    }
}
