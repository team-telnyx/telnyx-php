<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\ExternalConnections\Releases\ReleaseGetResponse;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Page;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ReleasesContract
{
    /**
     * @api
     *
     * @param string $id
     */
    public function retrieve(
        string $releaseID,
        $id,
        ?RequestOptions $requestOptions = null
    ): ReleaseGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Filter parameter for releases (deepObject style). Supports filtering by status, civic_address_id, location_id, and phone_number with eq/contains operations.
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        string $id,
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): ReleaseListResponse;
}
