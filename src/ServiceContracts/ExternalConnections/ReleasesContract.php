<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\Status\Eq;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse;
use Telnyx\RequestOptions;

interface ReleasesContract
{
    /**
     * @api
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
    ): ReleaseGetResponse;

    /**
     * @api
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
    ): ReleaseListResponse;
}
