<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\Status\Eq;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\ReleasesContract;

final class ReleasesService implements ReleasesContract
{
    /**
     * @api
     */
    public ReleasesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ReleasesRawService($client);
    }

    /**
     * @api
     *
     * Return the details of a Release request and its phone numbers.
     *
     * @param string $releaseID Identifies a Release request
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $releaseID,
        string $id,
        ?RequestOptions $requestOptions = null
    ): ReleaseGetResponse {
        $params = ['id' => $id];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($releaseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your Releases for the given external connection. These are automatically created when you change the `connection_id` of a phone number that is currently on Microsoft Teams.
     *
     * @param string $id identifies the resource
     * @param array{
     *   civicAddressID?: array{eq?: string},
     *   locationID?: array{eq?: string},
     *   phoneNumber?: array{contains?: string, eq?: string},
     *   status?: array{
     *     eq?: list<'pending_upload'|'pending'|'in_progress'|'complete'|'failed'|'expired'|'unknown'|Eq>,
     *   },
     * } $filter Filter parameter for releases (deepObject style). Supports filtering by status, civic_address_id, location_id, and phone_number with eq/contains operations.
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): ReleaseListResponse {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
