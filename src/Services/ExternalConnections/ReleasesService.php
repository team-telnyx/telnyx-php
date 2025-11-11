<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse;
use Telnyx\ExternalConnections\Releases\ReleaseListParams;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse;
use Telnyx\ExternalConnections\Releases\ReleaseRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\ReleasesContract;

final class ReleasesService implements ReleasesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Return the details of a Release request and its phone numbers.
     *
     * @param array{id: string}|ReleaseRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $releaseID,
        array|ReleaseRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ReleaseGetResponse {
        [$parsed, $options] = ReleaseRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s/releases/%2$s', $id, $releaseID],
            options: $options,
            convert: ReleaseGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your Releases for the given external connection. These are automatically created when you change the `connection_id` of a phone number that is currently on Microsoft Teams.
     *
     * @param array{
     *   filter?: array{
     *     civic_address_id?: array{eq?: string},
     *     location_id?: array{eq?: string},
     *     phone_number?: array{contains?: string, eq?: string},
     *     status?: array{
     *       eq?: list<"pending_upload"|"pending"|"in_progress"|"complete"|"failed"|"expired"|"unknown">,
     *     },
     *   },
     *   page?: array{number?: int, size?: int},
     * }|ReleaseListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|ReleaseListParams $params,
        ?RequestOptions $requestOptions = null,
    ): ReleaseListResponse {
        [$parsed, $options] = ReleaseListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s/releases', $id],
            query: $parsed,
            options: $options,
            convert: ReleaseListResponse::class,
        );
    }
}
