<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Page;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\ExternalConnections\Releases\ReleaseListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ReleasesContract
{
    /**
     * @api
     *
     * @param string $releaseID Identifies a Release request
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $releaseID,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): ReleaseGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param Filter|FilterShape $filter Filter parameter for releases (deepObject style). Supports filtering by status, civic_address_id, location_id, and phone_number with eq/contains operations.
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<ReleaseListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;
}
