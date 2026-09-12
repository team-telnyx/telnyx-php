<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\NotificationProfiles\NotificationProfile;
use Telnyx\NotificationProfiles\NotificationProfileDeleteResponse;
use Telnyx\NotificationProfiles\NotificationProfileGetResponse;
use Telnyx\NotificationProfiles\NotificationProfileNewResponse;
use Telnyx\NotificationProfiles\NotificationProfileUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationProfilesContract;

/**
 * Notification settings operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NotificationProfilesService implements NotificationProfilesContract
{
    /**
     * @api
     */
    public NotificationProfilesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NotificationProfilesRawService($client);
    }

    /**
     * @api
     *
     * Creates a new notification profile, a named grouping used to organize notification settings, and returns it.
     *
     * @param string $name a human readable name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null
    ): NotificationProfileNewResponse {
        $params = array_filter(
            ['name' => $name ?? Omitted::VALUE],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the details of a single notification profile by its identifier.
     *
     * @param string $id the id of the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NotificationProfileGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the specified notification profile and returns the updated profile.
     *
     * @param string $notificationProfileID the id of the resource
     * @param string $name a human readable name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $notificationProfileID,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): NotificationProfileUpdateResponse {
        $params = array_filter(
            ['name' => $name ?? Omitted::VALUE],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($notificationProfileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your notifications profiles.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<NotificationProfile>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'pageNumber' => $pageNumber ?? Omitted::VALUE,
                'pageSize' => $pageSize ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the specified notification profile from your account.
     *
     * @param string $id the id of the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NotificationProfileDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
