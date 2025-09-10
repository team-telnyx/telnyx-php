<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse;
use Telnyx\ExternalConnections\Releases\ReleaseListParams;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Page;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse;
use Telnyx\ExternalConnections\Releases\ReleaseRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\ReleasesContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $id
     */
    public function retrieve(
        string $releaseID,
        $id,
        ?RequestOptions $requestOptions = null
    ): ReleaseGetResponse {
        [$parsed, $options] = ReleaseRetrieveParams::parseRequest(
            ['id' => $id],
            $requestOptions
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
     * @param Filter $filter Filter parameter for releases (deepObject style). Supports filtering by status, civic_address_id, location_id, and phone_number with eq/contains operations.
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        string $id,
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): ReleaseListResponse {
        [$parsed, $options] = ReleaseListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
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
